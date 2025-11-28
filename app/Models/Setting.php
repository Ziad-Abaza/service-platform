<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value_en',
        'value_ar',
        'type',
        'group',
        'label_en',
        'label_ar',
        'description_en',
        'description_ar',
        'options',
        'is_public',
        'sort_order',
        'is_protected',
    ];

    protected $appends = ['typed_value', 'file_url', 'value', 'label', 'description'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [
        'options' => 'array',
        'is_public' => 'boolean',
        'sort_order' => 'integer',
        'is_protected' => 'boolean',
    ];

    /**
     * Get setting value with type casting
     */
    public function getTypedValueAttribute()
    {
        $value = $this->value;
        return match ($this->type) {
            'boolean' => (bool) $value,
            'number' => is_numeric($value) ? (float) $value : 0,
            'json' => $value ? (is_string($value) ? json_decode($value, true) : $value) : null,
            'image', 'file' => $this->getFileUrlAttribute(),
            default => $value,
        };
    }

    /**
     * Get value based on current locale
     */
    public function getValueAttribute()
    {
        $locale = app()->getLocale();
        $valueField = "value_{$locale}";
        return $this->{$valueField};
    }

    /**
     * Get label based on current locale
     */
    public function getLabelAttribute()
    {
        $locale = app()->getLocale();
        $labelField = "label_{$locale}";
        return $this->{$labelField};
    }

    /**
     * Get description based on current locale
     */
    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $descriptionField = "description_{$locale}";
        return $this->{$descriptionField};
    }

    /**
     * @return string|null
     */
    public function getFileUrlAttribute()
    {
        if (!$this->value) return null;

        if (filter_var($this->value, FILTER_VALIDATE_URL)) {
            return $this->value;
        }

        /** @var \Illuminate\Filesystem\FilesystemAdapter $disk */
        $disk = Storage::disk('public');
        return $disk->url($this->value);
    }

    /**
     * Set value with proper type handling
     */
    public function setValueAttribute($value)
    {
        if (in_array($this->type, ['image', 'file']) && $value instanceof \Illuminate\Http\UploadedFile) {
            // Delete old file if exists
            if ($this->value && Storage::disk('public')->exists($this->value)) {
                Storage::disk('public')->delete($this->value);
            }

            $filename = 'setting_' . $this->key . '_' . time() . '.' . $value->getClientOriginalExtension();
            $path = $value->storeAs('settings', $filename, 'public');
            $this->attributes['value'] = $path;
        } elseif (in_array($this->type, ['image', 'file']) && is_string($value) && str_starts_with($value, 'http')) {
            // If it's already a URL, don't modify it
            $this->attributes['value'] = $value;
        } else {
            $this->attributes['value'] = match ($this->type) {
                'boolean' => $value ? '1' : '0',
                'json' => is_array($value) || is_object($value) ? json_encode($value) : $value,
                default => $value,
            };
        }
    }
    /**
     * Scope to get settings by group
     */
    public function scopeByGroup($query, $group)
    {
        return $query->where('group', $group)->orderBy('sort_order');
    }

    /**
     * Scope to get public settings
     */
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    /**
     * Get setting by key
     */
    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->typed_value : $default;
    }

    /**
     * Set setting value
     */
    public static function set($key, $value, $type = 'text')
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => $type]
        );
    }
}
