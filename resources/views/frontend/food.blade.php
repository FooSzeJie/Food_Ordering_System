@extends('frontend.layout')
@section('frontend-section')

<link rel="stylesheet" href="{{ asset ('food_card/food_card_style.css') }}">

<style>
    #wishlist{
        color: rgb(255, 183, 0);
    }

    #wishlist:hover{
        color: red;
    }
</style>

<!--Menu-->
<div class="menu" id="Menu">
    <h1>Our<span>Menu</span></h1>

    <div class="menu_box">
        @foreach($products as $product)
        <div class="menu_card">
            <div class="menu_image">
                <img src="{{ asset ('food_image/buger.jpg') }}">
            </div>

            <div class="small_card">
                {{-- <i class="fa-solid fa-heart"></i> --}}
                <a href="#"><i class="fas fa-heart" id="wishlist"></i></a>
            </div>

            <div class="menu_info">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <h3>{{ $product->price }}</h3>
                {{-- <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div> --}}
                {{-- <a href="{{ url('/food-detail/' . $product->id) }}" class="menu_btn">Order Now</a> --}}
                <a href="{{ url('/food-detail/' . $product->id . '/1/2') }}" class="menu_btn">Order Now</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
