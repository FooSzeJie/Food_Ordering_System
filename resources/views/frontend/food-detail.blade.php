@extends('frontend.layout')
@section('frontend-section')

    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> --}}

    {{-- <style>
    .top5 {
        margin-top: 50px;
    }

    .row {
        border: 1px solid;
    }

    .row + .row {
        border-top:0 ;
    }
</style> --}}

    <style>
        .top5 {
            margin-top: 50px;
        }

        /* .row {
                    border: 1px solid;
                } */

        #abc {
            border: 1px solid;
        }

        .row+.row {
            border-top: 0;
        }

        .flx {
            display: flex;
        }

        .inner {
            background: aliceblue;
            border-right: 1px solid blue;
            padding: 10px 15px;
        }

        .inner1 {
            /* background: aliceblue; */
            border-right: 1px solid blue;
            padding: 10px 15px;
        }

        .inner-end {
            background: aliceblue;
            padding: 10px 15px;
        }
    </style>

    <style>
        .product-detail {
            display: flex;
        }

        .menu_image {
            flex: 0 0 50%;
            /* Set the image to take up half of the container */
            position: relative;
        }

        .product-image {
            width: 100%;
            /* Make the image fill the container */
            height: 100%;
            /* Make the image fill the container */
            object-fit: cover;
            /* Maintain aspect ratio and cover the container */
        }

        .product-info {
            flex: 0 0 50%;
            /* Set the product info to take up half of the container */
            padding: 0 20px;
            /* Add some padding for better spacing */
        }

        .no-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            /* Placeholder background color */
            color: #555;
            /* Placeholder text color */
        }
    </style>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .product-detail {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgb(0, 255, 234);
        }

        .product-image {
            max-width: 50%;
            height: auto;
            border-radius: 8px;
            margin-right: 20px;
            /* Add some spacing between image and product info */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* background-color: rgb(0, 255, 234); */
        }

        .product-info {
            flex-grow: 1;
            /* Allow the product info to grow and take remaining space */
        }

        h1,
        h2,
        h3 {
            color: #333;
        }

        p {
            color: #666;
        }

        .price {
            color: #e44d26;
            font-size: 24px;
            font-weight: bold;
        }

        /* .btn {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #e44d26;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 4px;
                    transition: background-color 0.3s ease;
                }

                .btn:hover {
                    background-color: #333;
                } */
    </style>

    <br><br><br><br><br><br>

    <div class="container">

        <form action="{{ url('/AddToCart') }}" method="post">
            @csrf

            <input type="hidden" name="product_id" value="{{ $fooddetails->id }}">
            <input type="hidden" name="product_image" value="{{ $fooddetails->image }}">
            <input type="hidden" name="product_name" value="{{ $fooddetails->name }}">
            <input type="hidden" name="product_description" value="{{ $fooddetails->description }}">

            <!-- Add this input field to your form -->
            <input type="hidden" name="total_price" id="total_price" value="">

            <!-- Addon and variant fields -->
            <input type="hidden" name="selected_variant" id="selected_variant" value="">
            <input type="hidden" name="selected_addons" id="selected_addons" value="">

            <div class="product-detail">
                {{-- <img name="product_image" value="{{ $fooddetails->image}}" class="product-image" src="{{ asset('images/' . $fooddetails->image) }}" alt="Product Image"> --}}

                <div class="menu_image">
                    @if ($fooddetails->image)
                        <img name="product_image" class="product-image" src="{{ asset('images/' . $fooddetails->image) }}"
                            alt="Product Image">
                    @else
                        <div class="no-image-overlay">No Image</div>
                    @endif
                </div>

                <div class="product-info">
                    <h1>Product Name - {{ $fooddetails->name }}</h1>
                    <p>Product Description - {{ $fooddetails->description }}</p>
                    <p class="price">RM - {{ $fooddetails->price }}</p>

                    <div class="row mt-2">
                        <div class="col-md-3">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:130px">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center"
                                    value="1">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                    </div>

                    {{-- <div>
                    <a href="#" class="btn">Add to Cart</a>
                </div> --}}
                </div>
            </div>
            {{-- @endforeach --}}

            <div class="row" id="abc">
                <div class="col inner">
                    <tr>
                        <td>Variables</td>
                    </tr>
                </div>
                <div class="col inner">
                    <tr>
                        <td>Add On</td>
                    </tr>
                </div>
            </div>
            <div class="row" id="abc">
                <div class="col inner">
                    @if (!empty($variants))
                        @foreach ($variants as $variant)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="variant" value="{{ $variant->id }}"
                                    data-price="{{ $variant->price }}" data-name="{{ $variant->name }}">
                                <label class="form-check-label" for="variant{{ $variant->id }}">
                                    {{ $variant->name }} - RM{{ $variant->price }}
                                </label>
                            </div>
                        @endforeach
                        <br>
                    @else
                        <p>No variants available.</p>
                    @endif
                    <br>
                </div>

                <div class="col inner">
                    <tr>
                        <td>
                            <div class="row" style="ml-50px">
                                @if (!empty($addons))
                                    @foreach ($addons as $addon)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="addons[]"
                                                value="{{ $addon->id }}" id="addon{{ $addon->id }}"
                                                data-price="{{ $addon->price }}" data-name="{{ $addon->name }}">
                                            <label class="form-check-label" for="addon{{ $addon->id }}">
                                                {{ $addon->name }} - RM{{ $addon->price }}
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No addons available.</p>
                                @endif
                                {{-- <div class="col" style="mr-50px">
                                <div class="input-group text-center" style="width:130px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" id="quantity" name="quantity" class="form-control qty-input text-center p-2" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div> --}}
                            </div>
                        </td>
                    </tr>
                    <br>
                    {{-- <tr>
                    <td>
                        <div class="btn-group" role="group" aria-label="Quantity">
                            <button type="button" class="btn btn-secondary decrement-button">-</button>
                            <span id="quantity" class="btn btn-info">0</span>
                            <button type="button" class="btn btn-secondary increment-button">+</button>
                        </div>
                    </td>
                </tr> --}}
                </div>
            </div>
            <div class="row" id="abc">
                <div class="col" id="totalSection" name="total_price" value="">
                    <h3>Total:</h3>
                </div>
                <div class="col inner1"></div>
                <div class="col-6 inner">
                    {{-- <div class="col inner">
                        <button type="submit" onclick="addToCart()" class="btn btn-primary">Add To Cart</button>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Add To Cart</button>
                </div>
            </div>
        </form>
    </div>

    {{-- <script>
    // JavaScript代码用于处理增加和减少按钮的功能
    let quantity = 0;
    const quantityElement = document.getElementById("quantity");

    document.querySelector(".decrement-button").addEventListener("click", () => {
        if (quantity > 0) {
            quantity--;
            quantityElement.textContent = quantity;
        }
    });

    document.querySelector(".increment-button").addEventListener("click", () => {
        quantity++;
        quantityElement.textContent = quantity;
    });
</script> --}}

    {{-- JQuery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Add event listeners to variants and addons
            document.querySelectorAll('input[name="variant"]').forEach(function (variant) {
                variant.addEventListener('change', updateSelectedVariant);
            });

            document.querySelectorAll('input[name="addons[]"]').forEach(function (addon) {
                addon.addEventListener('change', updateSelectedAddons);
            });

            // Functions to update selected_variant and selected_addons
            function updateSelectedVariant() {
                const selectedVariant = document.querySelector('input[name="variant"]:checked');
                document.querySelector('#selected_variant').value = selectedVariant ? selectedVariant.value : '';
            }

            function updateSelectedAddons() {
                const selectedAddons = Array.from(document.querySelectorAll('input[name="addons[]"]:checked')).map(addon => addon.value);
                document.querySelector('#selected_addons').value = JSON.stringify(selectedAddons);
            }
        });
    </script> --}}

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Add event listeners to variants and addons
            document.querySelectorAll('input[name="variant"]').forEach(function (variant) {
                variant.addEventListener('change', updateSelectedVariant);
            });

            document.querySelectorAll('input[name="addons[]"]').forEach(function (addon) {
                addon.addEventListener('change', updateSelectedAddons);
            });

            // Functions to update selected_variant and selected_addons
            function updateSelectedVariant() {
                const selectedVariant = document.querySelector('input[name="variant"]:checked');
                document.querySelector('#selected_variant').value = selectedVariant ? selectedVariant.dataset.name : '';
            }

            function updateSelectedAddons() {
                const selectedAddons = Array.from(document.querySelectorAll('input[name="addons[]"]:checked')).map(addon => addon.dataset.name);
                document.querySelector('#selected_addons').value = JSON.stringify(selectedAddons);
            }
        });
    </script> --}}

    {{-- Get Variant and AddOn Name --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Add event listeners to variants and addons
            document.querySelectorAll('input[name="variant"]').forEach(function(variant) {
                variant.addEventListener('change', updateSelectedVariant);
            });

            document.querySelectorAll('input[name="addons[]"]').forEach(function(addon) {
                addon.addEventListener('change', updateSelectedAddons);
            });

            // Functions to update selected_variant and selected_addons
            function updateSelectedVariant() {
                const selectedVariant = document.querySelector('input[name="variant"]:checked');
                document.querySelector('#selected_variant').value = selectedVariant ? selectedVariant.dataset.name :
                    '';
            }

            function updateSelectedAddons() {
                const selectedAddons = Array.from(document.querySelectorAll('input[name="addons[]"]:checked')).map(
                    addon => addon.dataset.name);
                document.querySelector('#selected_addons').value = JSON.stringify(selectedAddons);
            }
        });
    </script>

    {{-- Incremnet and Decrement Ajax --}}
    <script>
        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();

                var inc_value = $('.qty-input').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;

                // console.log(inc_value);
                // console.log(value);
                // console.log('aa',value);

                if (value < 10) {

                    value++;
                    $('.qty-input').val(value);
                }
            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();

                var dec_value = $('.qty-input').val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;

                if (value > 1) {

                    value--;
                    $('.qty-input').val(value);
                }
            });

        });
    </script>

    {{-- Count JS --}}
    <script>
        $(document).ready(function() {
            // Function to update the total based on selected options
            function updateTotal() {

                // Get the quantity value
                var quantity = parseInt($(".qty-input").val());

                // Get the product price
                var productPrice = parseFloat("{{ $fooddetails->price }}") || 0;

                // Get the selected variant price
                var variantPrice = parseFloat($("input[name='variant']:checked").data('price')) || 0;

                // Get the selected addons prices
                var addonsPrices = 0;
                $("input[name='addons[]']:checked").each(function() {
                    addonsPrices += parseFloat($(this).data('price')) || 0;
                });
                // var addonsPrices = 0;
                // $("input[name='addons[]']:checked").each(function() {
                //     addonsPrices += parseFloat($(this).data('price')) || 0;
                // });

                // Debugging output
                console.log("Quantity: " + quantity);
                console.log("Product Price: " + productPrice);
                console.log("Variant Price: " + variantPrice);
                console.log("Addons Prices: " + addonsPrices);

                // Calculate the total
                var total = (quantity * productPrice) + variantPrice + addonsPrices;

                // Update the total section
                // $("#totalSection").html("<h3>Total: RM " + total.toFixed(2) + "</h3>");

                // 更新显示
                $("#totalSection h3").html("Total: RM " + total.toFixed(2));

                // 将总价格放在value属性中
                $("#totalSection").attr("value", "Total: RM " + total.toFixed(2));

                // Put total_price on text
                $("#total_price").val(total.toFixed(2));

            }

            // Attach onchange event to the quantity input
            $(".qty-input").on("change", function() {
                updateTotal();
            });

            // Attach click events to variant and addon inputs
            // $("input[name='variant'], input[name='addon']").on("click", function () {
            //     updateTotal();
            // });
            $("input[name='variant'], input[name='addons[]']").on("click", function() {
                updateTotal();
            });

            // Attach click events to increment and decrement buttons
            $(".increment-btn, .decrement-btn").on("click", function() {
                updateTotal();
            });
        });
    </script>

@endsection

{{-- Design Coloum UI --}}
{{-- <div class="container top5">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="row">
                <div class="col-md-3 col-xs-3 inner">
                   <div><b>Type</b></div>
                </div>
                <div class="col-md-3 col-xs-3 inner">
                   <div class=""><b>SMS</b></div>
                </div>
                <div class="col-md-3 col-xs-3 inner">
                   <div class=""><b>Email</b></div>
                </div>
                <div class="col-md-3 col-xs-3 inner-end">
                    <div class=""><b>Business Unit</b></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="row border-between">
                <div class="col-md-3 col-xs-3 inner">
                    <span>Another tesing text</span>
                </div>
                <div class="col-md-3 col-xs-3 inner">
                    <span> test</span>
                </div>
                <div class="col-md-3 col-xs-3 inner">
                    <span>Random text</span>
                </div>
                <div class="col-md-3 col-xs-3 inner-end">
                    <span>Random text</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container top5">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="row">
        <div class="flx">


          <div class="col-md-3 col-xs-3 inner">
            <div><b>Type</b></div>
          </div>
          <div class="col-md-3 col-xs-3 inner">
            <div class=""><b>SMS</b></div>
          </div>
          <div class="col-md-3 col-xs-3 inner">
            <div class=""><b>Email</b></div>
          </div>
          <div class="col-md-3 col-xs-3 inner-end">
            <div class=""><b>Business Unit</b></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-xs-12">
      <div class="row border-between">
        <div class="flx">
          <div class="col-md-3 col-xs-3 inner">
            <span>Another tesing text</span>
            <div>1</div>
            <div>2</div>
          </div>
          <div class="col-md-3 col-xs-3 inner">
            <span> test</span>
          </div>
          <div class="col-md-3 col-xs-3 inner">
            <span>Random text</span>
          </div>
          <div class="col-md-3 col-xs-3 inner-end">
            <span>Random text</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}
