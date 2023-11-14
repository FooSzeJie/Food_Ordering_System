@extends('frontend.layout')
@section('frontend-section')

<link rel="stylesheet" href="{{ asset ('food_card/food_card_style.css') }}">

{{-- Toastr CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

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

            {{-- <div class="small_card">
                <a href="{{ route('user.AddToWishlist', ['id' => $product->id]) }}"><i class="fas fa-heart" id="wishlist"></i></a>
            </div> --}}

            <!-- Your Blade view code -->
            <div class="small_card">
                <form action="{{ route('user.AddToWishlist') }}" method="POST">
                    @csrf
                    @method('POST')

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                    <input type="hidden" name="product_description" value="{{ $product->description }}">
                    <input type="hidden" name="product_price" value="{{ $product->price }}">

                    <button type="submit"><i class="fas fa-heart" id="wishlist"></i></button>
                </form>
            </div>

            <div class="menu_info">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <h3>RM - {{ $product->price }}</h3>
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

@endsection
