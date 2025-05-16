<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonStaff extends Model
{
    use HasFactory;
    protected $fillable = [
        'salon_uid',
        'staff_uid',
        'role_uid',
        'profile_pic',
        'name',
        'email',
        'mobile',
        'gender',
        'skills',
        'experience_yrs',
        'designation',
        'commission_rate',
        'salary',
        'age',
        'bank_details',
        'personal_documents',
        'status',
        'updated_at',
    ];

    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class, 'salon_uid', 'salon_uid');
    }
}
