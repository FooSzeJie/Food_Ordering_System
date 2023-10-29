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
        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/buger.jpg') }}">
            </div>

            <div class="small_card">
                {{-- <i class="fa-solid fa-heart"></i> --}}
                <a href="#"><i class="fas fa-heart" id="wishlist"></i></a>
            </div>

            <div class="menu_info">
                <h2>Buger</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates</p>
                <h3>$20.00</h3>
                {{-- <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div> --}}
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/pasta.jpg') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>pasta</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                </p>
                <h3>$20.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/lasagna.webp') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>lasagna</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                </p>
                <h3>$20.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/chocolate_Drink.jpg') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>Drink</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                </p>
                <h3>$20.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/pizza.jpg') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>pizza</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                </p>
                <h3>$20.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/Hot_dog.jpg') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>Hot Dog</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                </p>
                <h3>$20.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/juse.jpg') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>Juse</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                </p>
                <h3>$20.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/biryani.webp') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>Biryani</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                </p>
                <h3>$20.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/chocolate.jpg') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>Chocolate</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                </p>
                <h3>$20.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/ice_cream.jpg') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>Ice Cream</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                </p>
                <h3>$20.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/Spanchi.jpg') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>Spanchi</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                </p>
                <h3>$20.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset ('food_image/sandwich.jpg') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>Sandwich</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum assumenda voluptates
                </p>
                <h3>$20.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#" class="menu_btn">Order Now</a>
            </div>

        </div>

    </div>

</div>

@endsection
