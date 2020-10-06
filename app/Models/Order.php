<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['session_id','total_price'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class,'order_id','id');
    }
}
