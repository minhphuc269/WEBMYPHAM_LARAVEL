<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table='orderdetail';

    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); 
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_code'); // Giả sử bạn có trường order_id trong orderdetail
    }
}
