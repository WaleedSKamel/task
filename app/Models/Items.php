<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';

    protected $fillable = ['name','image','price'];

    protected $appends = ['imagePath'];


    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getImagePathAttribute()
    {
        return asset('storage/'.$this->image);
    }
}
