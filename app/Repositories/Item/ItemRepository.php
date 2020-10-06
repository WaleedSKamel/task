<?php


namespace App\Repositories\Item;


use App\Models\Cart;
use App\Models\Items;

class ItemRepository
{
    public function all()
    {
        $item = Items::orderByDesc('created_at')->get();

        $carts = Cart::with('item')
            ->where('session_id','=',\Session::getId())
            ->orderByDesc('created_at')
            ->get();
        return [
            'item' =>$item,
            'cart' => $carts
        ];
    }

    public function store($request)
    {
        $item = Items::create($request->all());
        if ($item){
            return [
              'message' => 'Done save item',
              'status' => true
            ];
        }
        return [
            'message' => 'Please try again',
            'status' => false
        ];
    }
}
