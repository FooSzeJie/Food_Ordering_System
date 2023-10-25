@extends('frontend.layout')
@section('frontend-section')

{{-- Toastr CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

{{-- <h1>Home</h1>
<a href="{{ url('/logout')}}">Logout</a> --}}

<section id="Home">
    <div class="main">
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
    </div>
</section>

{{-- <!--About-->
<div class="about" id="About">
    <div class="about_main">

        <div class="image">
            <img src="{{ asset('home/image/Food-Plate.png') }}">
        </div>

        <div class="about_text">
            <h1><span>About</span>Us</h1>
            <h3>Why Choose us?</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, est. Doloremque
                sapiente veritatis laboriosam corrupti optio et maxime. Ad, amet explicabo eaque labore
                cupiditate quasi nostrum nemo recusandae id quibusdam? Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Doloremque ab, dolores pariatur cum exercitationem, illo nisi
                veritatis vitae ea deleniti fugiat quisquam tempora, accusantium corrupti excepturi optio.
                Inventore, cupiditate recusandae.
            </p>
        </div>

    </div>

    <a href="#" class="about_btn">Order Now</a>

</div> --}}

{{-- <!--Menu-->
<div class="menu" id="Menu">
    <h1>Our<span>Menu</span></h1>

    <div class="menu_box">
        <div class="menu_card">

            <div class="menu_image">
                <img src="{{ asset('home/image/buger.jpg') }}">
            </div>

            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="menu_info">
                <h2>Buger</h2>
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
                <img src="{{ asset('home/image/pasta.jpg') }}">
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
                <img src="{{ asset('home/image/lasagna.webp') }}">
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
                <img src="{{ asset('home/image/chocolate_Drink.jpg') }}">
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
                <img src="{{ asset('home/image/pizza.jpg') }}">
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
                <img src="{{ asset('home/image/Hot_dog.jpg') }}">
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
                <img src="{{ asset('home/image/juse.jpg') }}">
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
                <img src="{{ asset('home/image/biryani.webp') }}">
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
                <img src="{{ asset('home/image/chocolate.jpg') }}">
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
                <img src="{{ asset('home/image/ice_cream.jpg') }}">
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
                <img src="{{ asset('home/image/Spanchi.jpg') }}">
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
                <img src="{{ asset('home/image/sandwich.jpg') }}">
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

</div> --}}

<!--Gallary-->
<div class="gallary" id="Gallary">
    <h1>Our<span>Gallary</span></h1>

    <div class="gallary_image_box">
        <div class="gallary_image">
            <img src="{{ asset('home/image/gallary_1.jpg') }}">

            <h3>Food</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam
            </p>
            <a href="#" class="gallary_btn">Order Now</a>
        </div>

        <div class="gallary_image">
            <img src="{{ asset('home/image/gallary_2.jpg') }}">

            <h3>Food</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam
            </p>
            <a href="#" class="gallary_btn">Order Now</a>
        </div>

        <div class="gallary_image">
            <img src="{{ asset('home/image/gallary_3.jpg') }}">

            <h3>Food</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam
            </p>
            <a href="#" class="gallary_btn">Order Now</a>
        </div>

        <div class="gallary_image">
            <img src="{{ asset('home/image/gallary_4.jpg') }}">

            <h3>Food</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam
            </p>
            <a href="#" class="gallary_btn">Order Now</a>
        </div>

        <div class="gallary_image">
            <img src="{{ asset('home/image/gallary_5.jpg') }}">

            <h3>Food</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam
            </p>
            <a href="#" class="gallary_btn">Order Now</a>
        </div>

        <div class="gallary_image">
            <img src="{{ asset('home/image/gallary_6.jpg') }}">

            <h3>Food</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam
            </p>
            <a href="#" class="gallary_btn">Order Now</a>
        </div>

    </div>

</div>

<!--Review-->
<div class="review" id="Review">
    <h1>Customer<span>Review</span></h1>

    <div class="review_box">
        <div class="review_card">

            <div class="review_profile">
                <img src="{{ asset('home/image/review_1.png') }}">
            </div>

            <div class="review_text">
                <h2 class="name">John Deo</h2>

                <div class="review_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>

                <div class="review_social">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus quam facere
                    blanditiis in fugiat tempore necessitatibus aliquid. Id adipisci, rem corrupti
                    asperiores distinctio delectus quae quia tenetur totam laboriosam quam. Lorem ipsum,
                    dolor sit amet consectetur adipisicing elit. Dolores soluta ullam ipsa voluptates
                    repudiandae dignissimos deleniti mollitia eum. Laudantium placeat velit nemo illo
                    pariatur. Fuga aperiam impedit illo atque repellendus!
                </p>

            </div>

        </div>

        <div class="review_card">

            <div class="review_profile">
                <img src="{{ asset('home/image/review_2.png') }}">
            </div>

            <div class="review_text">
                <h2 class="name">John Deo</h2>

                <div class="review_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>

                <div class="review_social">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus quam facere
                    blanditiis in fugiat tempore necessitatibus aliquid. Id adipisci, rem corrupti
                    asperiores distinctio delectus quae quia tenetur totam laboriosam quam. Lorem ipsum,
                    dolor sit amet consectetur adipisicing elit. Dolores soluta ullam ipsa voluptates
                    repudiandae dignissimos deleniti mollitia eum. Laudantium placeat velit nemo illo
                    pariatur. Fuga aperiam impedit illo atque repellendus!
                </p>

            </div>

        </div>

        <div class="review_card">

            <div class="review_profile">
                <img src="{{ asset('home/image/review_3.png') }}">
            </div>

            <div class="review_text">
                <h2 class="name">John Deo</h2>

                <div class="review_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>

                <div class="review_social">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus quam facere
                    blanditiis in fugiat tempore necessitatibus aliquid. Id adipisci, rem corrupti
                    asperiores distinctio delectus quae quia tenetur totam laboriosam quam. Lorem ipsum,
                    dolor sit amet consectetur adipisicing elit. Dolores soluta ullam ipsa voluptates
                    repudiandae dignissimos deleniti mollitia eum. Laudantium placeat velit nemo illo
                    pariatur. Fuga aperiam impedit illo atque repellendus!
                </p>

            </div>

        </div>

        <div class="review_card">

            <div class="review_profile">
                <img src="{{ asset('home/image/review_4.png') }}">
            </div>

            <div class="review_text">
                <h2 class="name">John Deo</h2>

                <div class="review_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>

                <div class="review_social">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus quam facere
                    blanditiis in fugiat tempore necessitatibus aliquid. Id adipisci, rem corrupti
                    asperiores distinctio delectus quae quia tenetur totam laboriosam quam. Lorem ipsum,
                    dolor sit amet consectetur adipisicing elit. Dolores soluta ullam ipsa voluptates
                    repudiandae dignissimos deleniti mollitia eum. Laudantium placeat velit nemo illo
                    pariatur. Fuga aperiam impedit illo atque repellendus!
                </p>

            </div>

        </div>

    </div>

</div>

{{-- <!--Order-->
<div class="order" id="Order">
    <h1><span>Order</span>Now</h1>

    <div class="order_main">

        <div class="order_image">
            <img src="{{ asset('home/image/order_image.png') }}">
        </div>

        <form action="#">

            <div class="input">
                <p>Name</p>
                <input type="text" placeholder="you name">
            </div>

            <div class="input">
                <p>Email</p>
                <input type="email" placeholder="you email">
            </div>

            <div class="input">
                <p>Number</p>
                <input placeholder="you number">
            </div>

            <div class="input">
                <p>How Much</p>
                <input type="number" placeholder="how many order">
            </div>

            <div class="input">
                <p>You Order</p>
                <input placeholder="food name">
            </div>

            <div class="input">
                <p>Address</p>
                <input placeholder="you Address">
            </div>

            <a href="#" class="order_btn">Order Now</a>

        </form>

    </div>

</div> --}}

<!--Team-->
<div class="team">
    <h1>Our<span>Team</span></h1>

    <div class="team_box">
        <div class="profile">
            <img src="{{ asset('home/image/chef1.png') }}">

            <div class="info">
                <h2 class="name">Chef</h2>
                <p class="bio">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                <div class="team_icon">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>

            </div>

        </div>

        <div class="profile">
            <img src="{{ asset('home/image/chef2.png') }}">

            <div class="info">
                <h2 class="name">Chef</h2>
                <p class="bio">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                <div class="team_icon">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>

            </div>

        </div>

        <div class="profile">
            <img src="{{ asset('home/image/chef3.jpg') }}">

            <div class="info">
                <h2 class="name">Chef</h2>
                <p class="bio">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                <div class="team_icon">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>

            </div>

        </div>

        <div class="profile">
            <img src="{{ asset('home/image/chef4.jpg') }}">

            <div class="info">
                <h2 class="name">Chef</h2>
                <p class="bio">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                <div class="team_icon">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
