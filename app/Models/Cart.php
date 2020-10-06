<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable =['session_id','item_id','price','qty'];

    public function item()
    {
        return $this->belongsTo(Items::class,'item_id','id');
    }

}
