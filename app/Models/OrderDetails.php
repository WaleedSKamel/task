<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';

    protected $fillable =['order_id','item_id','item_name','item_price','price','qty'];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function item()
    {
        return $this->belongsTo(Items::class,'item_id','id');
    }
}
