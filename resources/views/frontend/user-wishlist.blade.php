@extends('frontend.user-layout')
@section('frontend-section')

<link rel="stylesheet" href="{{ asset ('food_card/food_card_style.css') }}">

{{-- Toastr CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<!--Menu-->
<div class="table-responsive">
    <div class="menu" id="Menu">
        <h1>My<span>Wishlist</span></h1>

        <div class="menu_box">
            @foreach($wishlistItems as $wishlistItem)

            <div class="menu_card">
                <div class="menu_image">
                    <img src="{{ asset('images/' . $wishlistItem->product_image) }}">
                </div>

                <div class="menu_info">
                    <h2>{{ $wishlistItem->product_name }}</h2>
                    <p>{{ $wishlistItem->product_description }}</p>
                    <h3>RM - {{ $wishlistItem->product_price }}</h3>

                    <center><a onclick="return confirm('Are you sure to delete this Wishlist ({{ $wishlistItem->product_name }}) ?')" href="{{ url('/deletewishlist/' . $wishlistItem->id )}}" class="btn btn-danger">Delete Wishlist</a></center>
                </div>
            </div>
            @endforeach
        </div>
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
