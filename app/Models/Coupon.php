<?php
namespace App\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon'; // Đảm bảo tên bảng khớp với cơ sở dữ liệu

    protected $fillable = [
        'name',
        'code',
        'description',
        'qty',
        'condition_coupon',
        'pricesale',
        'image',
        'created_by',
        'status',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
