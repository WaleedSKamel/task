<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Models\Items;
use App\Repositories\Item\ItemRepository;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function all()
    {
        $data = $this->itemRepository->all();
        $cart = $data['cart'];
        $items = $data['item'];

        return view('shop',compact('items','cart'));
    }

    public function create()
    {
        return view('item.store');
    }

    private function showItems($items)
    {
        $content = '';
        foreach ($items as $key => $item){
            $content = $content .'  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="single-product-wrap mb-35">
                                                <div class="product-img product-img-zoom mb-15">
                                                    <a >
                                                        <img src="'.$item->imagePath.'" style="width: 270px;" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-content-wrap-2 text-center">
                                                    <h3><a href="product-details.html">'.$item->name.'</a></h3>
                                                    <div class="product-price-2">
                                                        <span>$ '.$item->price.'</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap-2 product-content-position text-center">
                                                    <h3><a >'.$item->name.'</a></h3>
                                                    <div class="product-price-2">
                                                        <span>$ '.$item->price.'</span>
                                                    </div>
                                                    <div class="pro-details-quality">
                                                        <span>Quantity:</span>
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" id="qty'.$key.'" type="number" name="qty" value="1">
                                                        </div>
                                                    </div>
                                                    <div class="pro-add-to-cart">
                                                        <button class="add_cart" data-session="'.\Session::getId() .'" data-id="'.$item->id .'" >Add To Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
        }
        return $content;
    }

    public function store(StoreItemRequest $request)
    {
        $item = $this->itemRepository->store($request);

        if ($item['status'] == true){
            return redirect()->back()->with(['success'=>$item['message']]);
        }
        return redirect()->back()->with(['error'=>$item['message']]);
    }

    public function search(Request $request)
    {
        if ($request->ajax()){
            try {
                if ($request->name){
                    $items = Items::where('name', 'like', '%' . $request->name . '%')
                        ->get();
                }
                elseif ($request->start && $request->end){
                    $items = Items::whereBetween('price', [$request->start, $request->end])
                        ->get();
                }
                else{
                    $items = Items::orderByDesc('created_at')
                        ->get();
                }
                return [
                    'my_items' => $this->showItems($items),
                    'status_code' => true
                ];
            } catch (\Exception $exception) {
                return [
                    'my_items' => $exception->getMessage(),
                    'status_code' => false
                ];
            }
        }
    }


}
