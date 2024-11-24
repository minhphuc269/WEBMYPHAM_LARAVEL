<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'district';
    
    public function towns()
    {
        return $this->hasMany(Town::class, 'maqh', 'maqh');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'matp', 'matp');
    }
}
