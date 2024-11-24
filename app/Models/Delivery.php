<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'delivery';

    // Thêm thuộc tính fillable
    protected $fillable = [
        'id_city',
        'id_district',
        'id_town',
        'feeship',
        'created_by', 
        'updated_by', 
        'created_at', 
        'updated_at', 

    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'id_city', 'matp');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'id_district', 'maqh');
    }

    public function town()
    {
        return $this->belongsTo(Town::class, 'id_town', 'xaid');
    }
}
