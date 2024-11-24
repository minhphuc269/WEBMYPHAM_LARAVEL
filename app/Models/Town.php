<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;
    protected $table = 'town';
    public function district()
    {
        return $this->belongsTo(District::class, 'maqh', 'maqh');
    }
}
