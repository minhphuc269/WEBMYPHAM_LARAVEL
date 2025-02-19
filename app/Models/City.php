<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table='city';
    
    public function districts()
    {
        return $this->hasMany(District::class, 'matp', 'matp');
    }
}
