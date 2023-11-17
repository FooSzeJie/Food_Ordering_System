@extends('frontend.layout')
@section('frontend-section')
{{-- Toastr CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

{{-- Cart CSS --}}
<style>
    * {
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
        -webkit-text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
        text-shadow: rgba(0, 0, 0, .01) 0 0 1px
    }

    body {
        font-family: 'Rubik', sans-serif;
        font-size: 14px;
        font-weight: 400;
        background: #E0E0E0;
        color: #000000
    }

    ul {
        list-style: none;
        margin-bottom: 0px
    }

    .button {
        display: inline-block;
        background: #0e8ce4;
        border-radius: 5px;
        height: 48px;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease
    }

    .button a {
        display: block;
        font-size: 18px;
        font-weight: 400;
        line-height: 48px;
        color: #FFFFFF;
        padding-left: 35px;
        padding-right: 35px
    }

    .button:hover {
        opacity: 0.8
    }

    .cart_section {
        width: 100%;
        padding-top: 93px;
        padding-bottom: 111px
    }

    .cart_title {
        font-size: 30px;
        font-weight: 500
    }

    .cart_items {
        margin-top: 8px
    }

    .cart_list {
        border: solid 1px #e8e8e8;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        background-color: #fff
    }

    .cart_item {
        width: 100%;
        padding: 15px;
        padding-right: 46px
    }

    .cart_item_image {
        width: 133px;
        height: 133px;
        float: left
    }

    .cart_item_image img {
        max-width: 100%
    }

    .cart_item_info {
        width: calc(100% - 133px);
        float: left;
        padding-top: 18px
    }

    .cart_item_name {
        margin-left: 7.53%
    }

    .cart_item_title {
        font-size: 14px;
        font-weight: 400;
        color: rgba(0, 0, 0, 0.5)
    }

    .cart_item_text {
        font-size: 18px;
        margin-top: 35px
    }

    .cart_item_text span {
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin-right: 11px;
        -webkit-transform: translateY(4px);
        -moz-transform: translateY(4px);
        -ms-transform: translateY(4px);
        -o-transform: translateY(4px);
        transform: translateY(4px)
    }

    .cart_item_price {
        text-align: right
    }

    .cart_item_total {
        text-align: right
    }

    .order_total {
        width: 100%;
        height: 60px;
        margin-top: 30px;
        border: solid 1px #e8e8e8;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        padding-right: 46px;
        padding-left: 15px;
        background-color: #fff
    }

    .order_total_title {
        display: inline-block;
        font-size: 14px;
        color: rgba(0, 0, 0, 0.5);
        line-height: 60px
    }

    .order_total_amount {
        display: inline-block;
        font-size: 18px;
        font-weight: 500;
        margin-left: 26px;
        line-height: 60px
    }

    .cart_buttons {
        margin-top: 60px;
        text-align: right
    }

    .cart_button_clear {
        display: inline-block;
        border: none;
        font-size: 18px;
        font-weight: 400;
        line-height: 48px;
        color: rgba(0, 0, 0, 0.5);
        background: #FFFFFF;
        border: solid 1px #b2b2b2;
        padding-left: 35px;
        padding-right: 35px;
        outline: none;
        cursor: pointer;
        margin-right: 26px
    }

    .cart_button_clear:hover {
        border-color: #0e8ce4;
        color: #0e8ce4
    }

    .cart_button_checkout {
        display: inline-block;
        border: none;
        font-size: 18px;
        font-weight: 400;
        line-height: 48px;
        color: #FFFFFF;
        padding-left: 35px;
        padding-right: 35px;
        outline: none;
        cursor: pointer;
        vertical-align: top
    }

</style>

{{-- Pill CSS --}}
<style>
    /* Custom CSS for tabs */
    .custom-tabs {
        display: flex;
        list-style: none; /* Remove list bullet points */
        padding: 0;
    }

    .custom-tab {
        cursor: pointer;
        padding: 10px 20px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
    }

    .custom-tab.active {
        background-color: #007BFF;
        color: #fff;
    }

    .custom-tab-content {
        display: none;
        padding: 20px;
        border: 1px solid #ccc;
    }

    .custom-tab-content.active {
        display: block;
    }
</style>

{{-- Cart --}}
{{-- <div class="cart_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">My Shopping Cart<small></small></div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach($cartItems as $cartItem)
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{ asset('images/' . $cartItem->image) }}" alt="">
                                </div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{ $cartItem->product_name }}</div>
                                    </div>
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Description</div>
                                        <div class="cart_item_text">{{ $cartItem->product_description }}</div>
                                    </div>
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantity</div>
                                        <div class="cart_item_text">{{ $cartItem->product_quantity }}</div>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Total Price</div>
                                        <div class="cart_item_text">{{ $cartItem->total_price }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Action</div>
                                        <center><a onclick="return confirm('Are you sure to delete this Product {{ $cartItem->product_name }}?')"
                                                    href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></center>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">Rm{{ $totalAmount }}</div>
                        </div>
                    </div>
                    <div class="cart_buttons">
                        <a href="{{ url('/food') }}"><button type="button" class="button cart_button_clear">Continue Order</button></a>
                        <a href=""><button type="button" class="button cart_button_checkout">Payment</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="row">

    <div class="col-md-12">

        {{-- <ul class="nav nav-tabs custom-tabs">
            <li class="custom-tab active" data-tab="booking">Booking</li>
            <li class="custom-tab" data-tab="payment">Payment</li>
        </ul> --}}

        <form action="" method="POST">
            <div class="cart_section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="cart_container">
                                <div class="cart_title">My Shopping Cart<small></small></div>
                                <div class="cart_items">
                                    
                                    <ul class="nav nav-tabs custom-tabs">
                                        <li class="custom-tab active" data-tab="booking">Booking</li>
                                        <li class="custom-tab" data-tab="payment">Payment</li>
                                    </ul>

                                    {{-- Cart --}}
                                    <div class="custom-tab-content active" data-tab="booking">
                                        <ul class="cart_list">
                                            @foreach($cartItems as $cartItem)
                                            <li class="cart_item clearfix">
                                                <div class="cart_item_image"><img src="{{ asset('images/' . $cartItem->image) }}" alt=""></div>
                                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                    <div class="cart_item_name cart_info_col">
                                                        <div class="cart_item_title">Name</div>
                                                        <div class="cart_item_text">{{ $cartItem->product_name }}</div>
                                                    </div>
                                                    <div class="cart_item_color cart_info_col">
                                                        <div class="cart_item_title">Description</div>
                                                        <div class="cart_item_text">{{ $cartItem->product_description }}</div>
                                                    </div>
                                                    <div class="cart_item_quantity cart_info_col">
                                                        <div class="cart_item_title">Quantity</div>
                                                        <div class="cart_item_text">{{ $cartItem->product_quantity }}</div>
                                                    </div>
                                                    <div class="cart_item_price cart_info_col">
                                                        <div class="cart_item_title">Total Price</div>
                                                        <div class="cart_item_text">{{ $cartItem->total_price }}</div>
                                                    </div>
                                                    <div class="cart_item_total cart_info_col">
                                                        <div class="cart_item_title">Action</div>
                                                        {{-- <div class="cart_item_text">{{ $cartItem->total_price }}</div> --}}
                                                        <center><a onclick="return confirm('Are you sure to delete this Product {{ $cartItem->product_name }}?')"
                                                                    href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></center>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="order_total">
                                            <div class="order_total_content text-md-right">
                                                <div class="order_total_title">Order Total:</div>
                                                <div class="order_total_amount">Rm{{ $totalAmount }}</div>
                                            </div>
                                        </div>
                                        <div class="cart_buttons">
                                            <a href="{{ url('/food') }}"><button type="button" class="button cart_button_clear">Continue Order</button></a>
                                            <a href=""><button type="button" class="button cart_button_checkout" id="payment">Continue</button></a>
                                        </div>
                                    </div>

                                    {{-- Select Take Away or Take In --}}
                                    <div class="container-payment custom-tab-content " data-tab="payment">

                                        <div class="row justify-content-center">

                                            <Center><h4>Select Take Away or Take In</h4></Center><br>

                                            <input type="text" name="selected_option" value="take_in">
                                            <input type="text" name="selected_option" value="take_out">

                                            <div class="col-md-3">
                                                <input type="hidden" name="selected_option" value="take_in">
                                                <img src="{{ asset('home/img/menu-1.jpg') }}" style="margin-left: 60px; cursor: pointer;" onclick="selectOption('take_in');" alt="">
                                            </div>

                                            <div class="col-md-1" style="border-right: 1px solid #000;"></div>

                                            <div class="col-md-4">
                                                <input type="hidden" name="selected_option" value="take_out">
                                                <img src="{{ asset('home/img/menu-2.jpg') }}" style="margin-left: 150px; cursor: pointer;" onclick="selectOption('take_out');" alt="">
                                            </div>

                                            <div class="order_total">
                                                <div class="order_total_content text-md-right">
                                                    <div class="order_total_title">Order Total:</div>
                                                    <div class="order_total_amount">Rm{{ $totalAmount }}</div>
                                                </div>
                                            </div>
                                            <div class="cart_buttons">
                                                <a href="{{ url('/food') }}"><button type="button" class="button cart_button_clear">Continue Order</button></a>
                                                <button type="submit" class="button cart_button_checkout">Payment</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- <div class="order_total">
                                    <div class="order_total_content text-md-right">
                                        <div class="order_total_title">Order Total:</div>
                                        <div class="order_total_amount">Rm{{ $totalAmount }}</div>
                                    </div>
                                </div> --}}
                                {{-- <div class="cart_buttons">
                                    <a href="{{ url('/food') }}"><button type="button" class="button cart_button_clear">Continue Order</button></a>
                                    <a href=""><button type="button" class="button cart_button_checkout">Payment</button></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

{{-- Toastr JS --}}
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>

    @if(Session::has('success'))
        Toastify({ text: "{{ Session::get('success') }}", duration: 10000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
        }).showToast();

    @elseif (Session::has('fail'))
        Toastify({ text: "{{ Session::get('fail') }}", duration: 10000,
                style: { background: "linear-gradient(to right, #b90000, #c99396)" }
        }).showToast();
    @endif

    @if(Session::has('error'))
        Toastify({ text: "{{ Session::get('error') }}", duration: 10000,
            style: { background: "linear-gradient(to right, #b90000, #c99396)" }
        }).showToast();
    @endif

    @if($errors->any())
        @foreach ($errors->all() as $error)
            Toastify({ text: "{{ $error }}", duration: 10000,
                style: { background: "linear-gradient(to right, #b90000, #c99396)" }
            }).showToast();
        @endforeach
    @endif

</script>

<!-- Include jQuery from the CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Pill JS --}}
<script>
    // JavaScript to handle tab switching
    $(document).ready(function() {
        $('.custom-tab').click(function() {
            console.log('aaa');
            var tab = $(this).data('tab');
            $('.custom-tab').removeClass('active');
            $('.custom-tab[data-tab="' + tab + '"]').toggleClass('active');
            $('.custom-tab-content').removeClass('active');
            $('.custom-tab-content[data-tab="' + tab + '"]').toggleClass('active');
        });
        $('#payment').click(function(e){
            e.preventDefault();
            $('.custom-tab').removeClass('active');
            $('.custom-tab[data-tab="payment"]').toggleClass('active');
            $('.custom-tab-content').removeClass('active');
            $('.custom-tab-content[data-tab="payment"]').toggleClass('active');
        })
    });
</script>

{{-- Select Take Away or Take In --}}
<script>
    function selectOption(option) {
        // Update the hidden input value
        $("input[name='selected_option']").val(option);
    }
</script>

@endsection
