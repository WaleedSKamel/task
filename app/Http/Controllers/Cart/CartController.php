<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCartRequest;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Items;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {

    }

    private function dataHtml($my_cart)
    {
        $content = '';
        $sum = 0 ;

        if (count($my_cart) > 0){
            foreach ($my_cart as $key => $cart){
                $sum += $cart->qty * $cart->price;
                $content = $content.'
                                        <ul>
                                            <li class="single-product-cart" style="display: inline-flex">
                                                    <div class="cart-img">

                                                        <a ><img src="'.$cart->item->imagePath.'" style="width: 98px;"alt=""></a>
                                                    </div>
                                                    <div class="cart-title">
                                                        <h5><a>'.$cart->item->name.'</a></h5>
                                                        <span style="margin-left: 15px;"> '.$cart->qty.' ×  $'.$cart->price.' = $ '.$cart->qty * $cart->price.'</span>
                                                    </div>
                                                    <div class="cart-delete">
                                                        <a class="remove_cart" data-id="'.$cart->id.'">×</a>
                                                    </div>
                                                </li>
                                     </ul>';
            }
        }
        else
        {
            return $content = '<span class="empty">No items in cart.</span>';
        }

        $header = '<div class="sidebar-cart-all">  <div class="cart-content"> <h3>Shopping Cart</h3>';

        $footer = '<div class="cart-total">
                               <h4 style="padding-left: 15px;">Subtotal: <span>$ '.$sum.' </span></h4>
                                 </div>
                                   <div class="cart-checkout-btn">
                                       <a class="no-mrg btn-hover cart-btn-style storeOrder" >checkout</a>
                                         </div>
                                          </div>
                                            </div>';
        return $header.$content.$footer;
    }

    public function addCart(AddCartRequest $request)
    {

        if ($request->ajax()){
            try {

                $data = $request->all();
                $item = Items::find($request->item_id);
                $data['price'] = $item->price;

                $cart = Cart::where('item_id','=',$request->item_id)
                    ->where('session_id','=',$request->session_id)
                    ->first();
                if (empty($cart)){
                    Cart::create($data);
                }
                else
                {
                    $cart->update([
                        'qty' => $request->qty
                    ]);
                }

                $carts = Cart::with('item')
                    ->where('session_id','=',\Session::getId())
                    ->orderByDesc('created_at')
                    ->get();


                return [
                    'my_cart' => $this->dataHtml($carts),
                    'count_cart'=>count($carts),
                    'status_code' => true
                ];

            } catch (\Exception $exception) {
                return [
                    'my_cart' => $exception->getMessage(),
                    'count_cart'=>0,
                    'status_code' => true,
                ];
            }


        }
    }

    public function removeCart(Request $request)
    {
        try {
            if ($request->ajax()){
                $cart = Cart::find($request->cart_id);
                if ($cart->delete()){

                    $carts = Cart::with('item')
                        ->where('session_id','=',\Session::getId())
                        ->orderByDesc('created_at')
                        ->get();

                    return [
                        'my_cart' => $this->dataHtml($carts),
                        'count_cart'=>count($carts),
                        'status_code' => true
                    ];
                }
            }
        } catch (\Exception $exception) {
            return [
              'my_cart' => $exception->getMessage(),
                'count_cart'=>0,
              'status_code' => 520
            ];
        }
    }

    public function getCart()
    {
        try {
            $carts = Cart::with('item')
                ->where('session_id','=',\Session::getId())
                ->orderByDesc('created_at')
                ->get();

            return [
                'my_cart' => $this->dataHtml($carts),
                'count_cart'=>count($carts),
                'status_code' => true
            ];
        } catch (\Exception $exception) {
            return [
                'my_cart' => $exception->getMessage(),
                'count_cart'=>0,
                'status_code' => 520
            ];
        }

    }

    public function storeOrder()
    {
        try {
            $cart = Cart::with('item')
                ->where('session_id','=',\Session::getId())
            ->orderByDesc('created_at')->get();

            $sum = 0;
            foreach ($cart as $values){
                $sum += $values->qty * $values->item->price;

            }
            $order = Order::create([
                'session_id' => \Session::getId(),
                'total_price' => $sum,
            ]);

            foreach ($cart as $value){

                $order->orderDetails()->create([
                    'item_id' =>  $value->item_id,
                    'item_name' =>  $value->item->name,
                    'item_price' =>  $value->item->price,
                    'price' =>  $value->price,
                    'qty' =>  $value->qty,
                ]);
            }
            $data = Cart::with('item')
                ->where('session_id','=',\Session::getId());
            $data->delete();
            return [
                'my_cart' => $this->dataHtml($data->get()),
                'count_cart'=>count($data->get()),
                'status_code' => true
            ];

        } catch (\Exception $exception) {
            return [
                'my_cart' => $exception->getMessage(),
                'count_cart'=>0,
                'status_code' => 520
            ];
        }
    }
}
