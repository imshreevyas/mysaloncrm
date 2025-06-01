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
        'salon_logo',
        'salon_banner',
        'salon_type',
        'contact_number',
        'business_email',
        'full_address',
        'state',
        'city',
        'pincode',
        'staff_count',
        'website_url',
        'operating_days',
        'opening_hour',
        'closing_hour',
        'social_media_links',
        'updated_at',
    ];

    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class, 'salon_uid', 'salon_uid');
    }

    public function getCompletionPercentageAttribute()
    {
        $totalFields = 16; // Total number of fields to consider
        $filledFields = 0;

        if ($this->salon_name) $filledFields++;
        if ($this->salon_logo) $filledFields++;
        if ($this->salon_banner) $filledFields++;
        if ($this->salon_type) $filledFields++;
        if ($this->full_address) $filledFields++;
        if ($this->state) $filledFields++;
        if ($this->city) $filledFields++;
        if ($this->pincode) $filledFields++;
        if ($this->contact_number) $filledFields++;
        if ($this->business_email) $filledFields++;
        if ($this->staff_count !== 0) $filledFields++;
        if ($this->website_url) $filledFields++;
        if ($this->operating_days) $filledFields++;
        if ($this->opening_hour) $filledFields++;
        if ($this->closing_hour) $filledFields++;
        if ($this->social_media_links) $filledFields++;
        // cancellation_policy and operating_days excluded

        return ($totalFields > 0) ? round(($filledFields / $totalFields) * 100) : 0;
    }

    public function state_master()
    {
        return $this->belongsTo(StateMaster::class, 'state', 'id');
    }

    public function city_master()
    {
        return $this->belongsTo(CityMaster::class, 'city', 'id');
    }
}
