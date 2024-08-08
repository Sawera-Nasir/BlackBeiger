<style>
    /* Custom Styles */
    .mini_cart_header {
        background-color: #f8f9fa;
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #e9ecef;
    }
    .mini_cart_header .widget-title {
        font-weight: bold;
        color: #333;
        text-align: center;
    }
    .mini_cart_wrap {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 400px;
        margin: 0 auto; /* Center the cart content */
    }
    .mini_cart_content {
        max-height: 300px;
        overflow-y: auto;
    }
    .empty {
        text-align: center;
        color: #555;
    }
    .empty i {
        font-size: 50px;
        color: #ddd;
    }
    .return-to-shop .button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .return-to-shop .button:hover {
        background-color: #0056b3;
        text-decoration: none;
        color: #fff;
    }
    .mini_cart_footer {
        border-top: 1px solid #e9ecef;
        padding-top: 20px;
        margin-top: 20px;
    }
    .total {
        font-size: 16px;
        font-weight: bold;
        text-align: center; /* Center the subtotal text */
    }
    .btn-cart, .btn-checkout {
        display: block;
        width: 80%; /* Reduce the width */
        height: 40px; /* Reduce the height */
        line-height: 40px; /* Center text vertically */
        text-align: center;
        background-color: blue;
        color: #fff;
        padding: 0; /* Remove padding */
        border-radius: 5px;
        margin: 10px auto; /* Center the buttons and add margin */
        transition: background-color 0.3s;
    }
    .btn-cart:hover, .btn-checkout:hover {
        background-color: blue;
        text-decoration: none;
        color: #fff;
    }
</style>


<!-- Rest of your cart content -->
<div class="mini_cart_header flex fl_between al_center">
    <div class="h3 widget-title tu fs__16 mg__0">Shopping cart</div>
    <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
</div>
<div class="mini_cart_wrap">
    <div class="mini_cart_content fixcl-scroll">
        <div class="fixcl-scroll-content">
            <div class="empty tc mt__40">
                <i class="las la-shopping-bag pr mb__10"></i>
                <p>Your cart is empty.</p>
                <p class="return-to-shop mb__15">
                    <a class="button button_primary tu js_add_ld" href="{{ route('frontend.index') }}">
                        <span class="truncate">Return To Shop</span>
                    </a>
                </p>
            </div>
    </div>
    <div class="mini_cart_footer js_cart_footer dn" style="">
        <div class="js_cat_dics"></div>
        <div class="total row fl_between al_center">
            <div class="col-auto"><strong>Subtotal:</strong></div>
            <div class="col-auto tr js_cat_ttprice"><div class="cart_tot_price">Rs.0.00</div></div>
        </div>
        <a href="/cart" class="button btn-cart tc mt__10 mb__10 js_add_ld" tpi-atc-registered="true">
            <span class="truncate">View cart</span>
        </a>
        <button type="submit" data-confirm="ck_lumise" name="checkout" class="button btn-checkout mt__10 mb__10 js_add_ld truncate" tpi-pao-registered="true">Check Out</button>
    </div>
</div>