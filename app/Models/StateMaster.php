<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateMaster extends Model
{
    use HasFactory;
    
    public function cities()
    {
        return $this->hasMany(CityMaster::class, 'state_id');
    }
}
