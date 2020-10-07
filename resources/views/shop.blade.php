<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('partials.head')
</head>

<body>

<div class="main-wrapper">
    <div class="shop-area pt-120 pb-120">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="shop-topbar-wrapper">
                        <a href="{!! route('item.create') !!}">Add Item</a>
                        <div class="shop-topbar-center">
                            <div class="view-mode nav">
                                <div class="sidebar-widget ">
                                    <div class="sidebar-search" style="margin-top: 0px">
                                        <form class="sidebar-search-form">
                                            <input type="text"  id="search_by_name" placeholder="Search here...">
                                            <button>
                                                <i class="icon-magnifier"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-sorting-wrapper">
                            <div class="same-style-2 header-cart">

                            </div>
                            <div class="dropdown">

                                <input id="dropcheck" class="dropcheck" type="checkbox">
                                <label for="dropcheck" class="dropbtn icon-basket-loaded " style="font-size: 25px;">
                                    <span class="countCart"> </span>
                                </label>

                                <div id="cart" class="dropdown-content" style="width: 350px;">
                                    @if (count($cart) < 0)
                                        <span class="empty">No items in cart.</span>
                                    @endif

                                        <div class="sidebar-cart-all myCart" >

                                        </div>


                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="alert alert-success text-center alertMessage hidden">
                        <h2> Done Save Order </h2>
                    </div>
                    <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row filterItems">

                                    @include('item.items')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    @include('partials.left-site-bar')
                </div>
            </div>
        </div>
    </div>

    <!-- All JS is here
============================================ -->
</div>

@include('partials.script')
</body>

</html>
