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

    .row + .row {
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
    /* .custom-margin-right {
        margin-right: 5px;
    }
    .custom-margin-left {
        margin-left: 50px;
    } */
</style>

<br><br><br><br><br><br>

<div class="container">
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
            @if(!empty($variants))
                @foreach($variants as $variant)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="variant" value="{{ $variant->id }}" id="variant{{ $variant->id }}">
                    <label class="form-check-label" for="variant{{ $variant->id }}">
                        {{ $variant->name }} - ${{ $variant->price }}
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
                        @if(!empty($addons))
                            @foreach($addons as $addon)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $addon->id }}" id="addon{{ $addon->id }}">
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
        <div class="col"></div>
        <div class="col inner1"></div>
        <div class="col-6 inner">
            <button class="btn btn-primary">Add To Cart</button>
        </div>
    </div>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
{{-- Incremnet and Decrement Ajax --}}
<script>
    $(document).ready(function() {
        $('.increment-btn').click(function (e) {
            e.preventDefault();

            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;

            // console.log(inc_value);
            // console.log(value);
            // console.log('aa',value);

            if(value < 10){

                value++;
                $('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();

            var dec_value = $('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;

            if(value > 1){

                value--;
                $('.qty-input').val(value);
            }
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
