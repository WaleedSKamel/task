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
        $data = $request->except('image');

        if ($request->hasFile('image')){
            $path = $request->file('image')->store('items');
            $data['image'] = $path;
        }

        $item = Items::create($data);
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
