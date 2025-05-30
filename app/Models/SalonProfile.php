<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'salon_uid',
        'salon_name',
        'category',
        'salon_type',
        'full_address',
        'state',
        'city',
        'pincode',
        'contact_number',
        'business_email',
        'staff_count',
        'estabished_year',
        'website_url',
        'salon_logo',
        'salon_banner',
        'operating_hours',
        'operating_days',
        'social_media_links',
        'cancellation_policy',
        'updated_at',
    ];

    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class, 'salon_uid', 'salon_uid');
    }

    public function getCompletionPercentageAttribute()
    {
        $totalFields = 14; // Total number of fields to consider
        $filledFields = 0;

        if ($this->salon_uid) $filledFields++;
        if ($this->salon_name) $filledFields++;
        if ($this->salon_logo) $filledFields++;
        if ($this->salon_type !== null) $filledFields++;
        if ($this->full_address) $filledFields++;
        if ($this->state) $filledFields++;
        if ($this->city) $filledFields++;
        if ($this->pincode) $filledFields++;
        if ($this->contact_number) $filledFields++;
        if ($this->business_email) $filledFields++;
        if ($this->staff_count !== null) $filledFields++;
        if ($this->established_year) $filledFields++;
        if ($this->website_url) $filledFields++;
        if ($this->operating_hours) $filledFields++;
        if ($this->social_media_links) $filledFields++;
        // cancellation_policy and operating_days excluded

        return ($totalFields > 0) ? round(($filledFields / $totalFields) * 100) : 0;
    }
}
