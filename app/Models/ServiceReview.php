<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_id',
        'parent_id',
        'name',
        'email',
        'rating',
        'comment',
        'avatar_url',
        'status',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    /**
     * Relation to service
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Relation to user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation to parent review (for replies)
     */
    public function parent()
    {
        return $this->belongsTo(ServiceReview::class, 'parent_id');
    }

    /**
     * Relation to child reviews (replies)
     */
    public function replies()
    {
        return $this->hasMany(ServiceReview::class, 'parent_id');
    }

    /**
     * Scope approved reviews
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope pending reviews
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope rejected reviews
     */
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    /**
     * Scope by rating
     */
    public function scopeRating($query, $rating)
    {
        return $query->where('rating', $rating);
    }

    /**
     * Check if review is approved
     */
    public function isApproved()
    {
        return $this->status === 'approved';
    }

    /**
     * Check if review is pending
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }

    /**
     * Check if review is rejected
     */
    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    /**
     * Approve the review
     */
    public function approve()
    {
        $this->status = 'approved';
        $this->save();
    }

    /**
     * Reject the review
     */
    public function reject()
    {
        $this->status = 'rejected';
        $this->save();
    }
}
