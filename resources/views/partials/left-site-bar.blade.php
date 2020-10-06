<div class="sidebar-wrapper sidebar-wrapper-mrg-right">
    <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
        <h4 class="sidebar-widget-title">Categories </h4>
        <div class="shop-catigory">
            <ul>
                <li><a href="shop.html">T-Shirt</a></li>
                <li><a href="shop.html">Shoes</a></li>
                <li><a href="shop.html">Clothing </a></li>
                <li><a href="shop.html">Women </a></li>
                <li><a href="shop.html">Baby Boy </a></li>
                <li><a href="shop.html">Accessories </a></li>
            </ul>
        </div>
    </div>
    <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
        <h4 class="sidebar-widget-title">Brand </h4>
        <div class="shop-catigory">
            <ul>
                <li><a href="shop.html">T-Shirt</a></li>
                <li><a href="shop.html">Shoes</a></li>
                <li><a href="shop.html">Clothing </a></li>
                <li><a href="shop.html">Women </a></li>
                <li><a href="shop.html">Baby Boy </a></li>
                <li><a href="shop.html">Accessories </a></li>
            </ul>
        </div>
    </div>

    {{--<div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
        <h4 class="sidebar-widget-title">Price Filter </h4>
        <div class="price-filter">
            <span>Range:  $100.00 - 1.300.00 </span>
            <div id="slider-range"></div>
            <div class="price-slider-amount">
                <div class="label-input">
                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                </div>
                <button type="button">Filter</button>
            </div>
        </div>


    </div>--}}
    <p>
        <label for="amount">Price range:</label>
        <input type="text" id="amount_start" name="start_price" >
        <input type="text" id="amount_end" name="end_price">
    </p>

    <div id="slider-range"></div>
    <br>
    <button class="btn btn-info" onclick="searchByPrice()">Filter</button>
</div>
