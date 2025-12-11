<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ComparisonService extends Pivot
{
    protected $table = 'comparison_services';
    
    protected $fillable = [
        'comparison_id',
        'service_id',
        'comparison_data',
    ];

    protected $casts = [
        'comparison_data' => 'array',
    ];
    
    public $incrementing = true;
    public $timestamps = true;

    /**
     * Relation to service comparison
     */
    public function comparison()
    {
        return $this->belongsTo(ServiceComparison::class, 'comparison_id');
    }

    /**
     * Relation to service
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Get a specific comparison data value
     */
    public function getComparisonDataValue($key, $default = null)
    {
        return data_get($this->comparison_data, $key, $default);
    }

    /**
     * Set a specific comparison data value
     */
    public function setComparisonDataValue($key, $value)
    {
        $data = $this->comparison_data ?? [];
        data_set($data, $key, $value);
        $this->comparison_data = $data;
        $this->save();
    }

    /**
     * Check if comparison data has a specific key
     */
    public function hasComparisonDataKey($key)
    {
        return data_get($this->comparison_data, $key) !== null;
    }

    /**
     * Get all comparison data keys
     */
    public function getComparisonDataKeys()
    {
        return array_keys($this->comparison_data ?? []);
    }
}
