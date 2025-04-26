<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'salon_uid',
        'category',
        'salon_type',
        'full_address',
        'contact_number',
        'salon_email',
        'staff_count',
        'estabished_year',
        'website_url',
        'salon_logo',
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
}
