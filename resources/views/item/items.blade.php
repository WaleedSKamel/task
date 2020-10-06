
@foreach($items as $key => $item)
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="single-product-wrap mb-35">
        <div class="product-img product-img-zoom mb-15">
            <a>
                <img src="{!! $item->imagePath !!}" style="width: 270px;" alt="">
            </a>
        </div>
        <div class="product-content-wrap-2 text-center">
            <h3><a href="product-details.html">{!! $item->name !!}</a></h3>
            <div class="product-price-2">
                <span>$ {!! $item->price !!}</span>
            </div>
        </div>
        <div class="product-content-wrap-2 product-content-position text-center">
            <h3><a >{!! $item->name !!}</a></h3>
            <div class="product-price-2">
                <span>$ {!! $item->price !!}</span>
            </div>
            <div class="pro-details-quality">
                <span>Qty:</span>
                <div class="cart-plus-minus">
                    <input class="cart-plus-minus-box" min="1" id="qty{!! $key !!}"  type="number" name="qty" value="1">
                </div>
            </div>
            <div class="pro-add-to-cart">
                <button  class="add_cart" data-session="{!! Session::getId() !!}" data-id="{!! $item->id !!}" >Add To Cart</button>
            </div>
        </div>
    </div>
</div>
@endforeach



