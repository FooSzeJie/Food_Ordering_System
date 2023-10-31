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
            <tr>
                <td><input type="checkbox" id="yourCheckboxId" name="yourCheckboxName"></td>
                <td>Varian</td>
            </tr>
            <br>
            <tr>
                <td><input type="checkbox" id="yourCheckboxId" name="yourCheckboxName"></td>
                <td>Variables</td>
            </tr>
        </div>
        <div class="col inner">
            <tr>
                <td>
                    <div class="btn-group" role="group" aria-label="Quantity">
                        <button type="button" class="btn btn-secondary decrement-button custom-margin-right">-</button>
                        <span id="quantity" class="btn btn-info rounded-0">0</span>
                        <button type="button" class="btn btn-secondary increment-button custom-margin-left">+</button>
                    </div>
                </td>
            </tr>
            <br>
            <tr>
                <td>
                    <div class="btn-group" role="group" aria-label="Quantity">
                        <button type="button" class="btn btn-secondary decrement-button">-</button>
                        <span id="quantity" class="btn btn-info">0</span>
                        <button type="button" class="btn btn-secondary increment-button">+</button>
                    </div>
                </td>
            </tr>
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

<script>
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
