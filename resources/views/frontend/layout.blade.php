<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUC Food Website</title>
    {{-- Home Page CSS --}}
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Toastr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    {{-- Toastr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>
<body>
    {{-- Navbar --}}
    <section id="Home">
        <nav>
            <div class="logo">
                <img src="{{ asset('home/image/logo.png') }}">
            </div>

            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/food')}}">Menu</a></li>
                {{-- <li><a href="{{ url('/')}}">Gallary</a></li> --}}
                {{-- <li><a href="{{ url('/')}}">Review</a></li> --}}
                {{-- <li><a href="{{ url('/')}}">Order</a></li> --}}

                @auth
                    @php
                        $id = Auth::user()->id;
                    @endphp

                    <a class="gallary_btn" href="{{ url('/logout') }}"><button type="button" class="btn btn-danger">Logout</button></a>

                @endauth

                @guest
                    <a class="btn" href="{{ url('/loginpage') }}"><button type="button" class="btn btn-success">Login</button></a>
                @endguest

            </ul>

            <div class="icon">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-heart"></i>
                <i class="fa-solid fa-cart-shopping"></i>
            </div>

        </nav>

        {{-- <div class="main">

            <div class="men_text">
                <h1>Get Fresh<span>Food</span><br>in a Easy Way</h1>
            </div>

            <div class="main_image">
                <img src="{{ asset('home/image/main_img.png') }}">
            </div>

        </div>

        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse reiciendis quaerat nobis
            deleniti amet non inventore. Reprehenderit recusandae voluptatibus minus tenetur itaque numquam
            cum quos dolorem maxime. Quas, quaerat nisi. Lorem ipsum dolor sit, amet consectetur adipisicing
            elit. Cumque facilis, quaerat cupiditate nulla quibusdam quo sunt esse tempore inventore vel
            voluptate, amet laudantium adipisci veniam nihil quam molestiae omnis mollitia.
        </p>

        <div class="main_btn">
            <a href="#">Order Now</a>
            <i class="fa-solid fa-angle-right"></i>
        </div> --}}

    </section>

    @yield('frontend-section')

    <!--Footer-->
    <footer>
        <div class="footer_main">

            <div class="footer_tag">
                <h2>Location</h2>
                <p>Sri Lanka</p>
                <p>USA</p>
                <p>India</p>
                <p>Japan</p>
                <p>Italy</p>
            </div>

            <div class="footer_tag">
                <h2>Quick Link</h2>
                <p>Home</p>
                <p>About</p>
                <p>Menu</p>
                <p>Gallary</p>
                <p>Order</p>
            </div>

            <div class="footer_tag">
                <h2>Contact</h2>
                <p>+94 12 3456 789</p>
                <p>+94 25 5568456</p>
                <p>johndeo123@gmail.com</p>
                <p>foodshop123@gmail.com</p>
            </div>

            <div class="footer_tag">
                <h2>Our Service</h2>
                <p>Fast Delivery</p>
                <p>Easy Payments</p>
                <p>24 x 7 Service</p>
            </div>

            <div class="footer_tag">
                <h2>Follows</h2>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>

        </div>

        <p class="end">Design by<span><i class="fa-solid fa-face-grin"></i> WT Master Code</span></p>

    </footer>

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

</body>
</html>
