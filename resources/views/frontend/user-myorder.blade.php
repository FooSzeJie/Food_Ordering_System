@extends('frontend.user-layout')
@section('frontend-section')

<link rel="stylesheet" href="{{ asset ('food_card/food_card_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('myorder/styles.css') }}">

{{-- Toastr CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

{{-- My Order --}}
<div class="wrapper">
	<div class="invoice_wrapper">
		<div class="header">
			<div class="logo_invoice_wrap">
				<div class="logo_sec">
					<img src="{{ asset ('myorder/codingboss.png') }}" alt="code logo">
					<div class="title_wrap">
						<p class="title bold">Suc Food Ordering</p>
						<p class="sub_title">Food Invoice</p>
					</div>
				</div>
				<div class="invoice_sec">
					<p class="invoice bold">INVOICE</p>
					<p class="invoice_no">
						<span class="bold">Invoice</span>
						<span>#3488</span>
					</p>
					<p class="date">
						<span class="bold">Date</span>
						<span>08/Jan/2022</span>
					</p>
				</div>
			</div>
            @foreach($myorders as $myorder)
                <div class="bill_total_wrap">
                    <div class="bill_sec">
                        <p>Bill To</p>
                        <p class="bold name">{{ $myorder->user_name }}</p>
                        {{-- <span>
                        123 walls street, Townhall<br/>
                        +111 222345667
                        </span> --}}
                    </div>
                    <div class="total_wrap">
                        <p>Total Amount</p>
                        <p class="bold price">{{ $myorder->totalAmount }}</p>
                    </div>
                </div>
            @endforeach
		</div>
        @foreach($myorders as $myorder)
		<div class="body">
			<div class="main_table">
				<div class="table_header">
					<div class="row">
						<div class="col col_no">NO.</div>
						<div class="col col_des">Food Name</div>
                        <div class="col col_des">Food Description</div>
						<div class="col col_price">Price</div>
						<div class="col col_qty">Quantity</div>
						{{-- <div class="col col_total">TOTAL</div> --}}
					</div>
				</div>
				<div class="table_body">
					<div class="row">
						<div class="col col_no">
							<p>{{ $myorder->id }}</p>
						</div>
						<div class="col col_des">
							<p class="bold">{{ $myorder->product_name }}</p>
						</div>
                        <div class="col col_price">
							<p>{{ $myorder->product_description }}</p>
						</div>
						<div class="col col_price">
							<p>{{ $myorder->product_price }}</p>
						</div>
						<div class="col col_qty">
							<p>{{ $myorder->product_quantity }}</p>
						</div>
						{{-- <div class="col col_total">
							<p>$700.00</p>
						</div> --}}
					</div>
					{{-- <div class="row">
						<div class="col col_no">
							<p>02</p>
						</div>
						<div class="col col_des">
							<p class="bold">Web Development</p>
							<p>Lorem ipsum dolor sit.</p>
						</div>
						<div class="col col_price">
							<p>$350</p>
						</div>
						<div class="col col_qty">
							<p>2</p>
						</div>
						<div class="col col_total">
							<p>$700.00</p>
						</div>
					</div>
					<div class="row">
						<div class="col col_no">
							<p>03</p>
						</div>
						<div class="col col_des">
							<p class="bold">GitHub</p>
							<p>Lorem ipsum dolor sit.</p>
						</div>
						<div class="col col_price">
							<p>$120</p>
						</div>
						<div class="col col_qty">
							<p>1</p>
						</div>
						<div class="col col_total">
							<p>$700.00</p>
						</div>
					</div>
					<div class="row">
						<div class="col col_no">
							<p>04</p>
						</div>
						<div class="col col_des">
							<p class="bold">Backend Design</p>
							<p>Lorem ipsum dolor sit.</p>
						</div>
						<div class="col col_price">
							<p>$350</p>
						</div>
						<div class="col col_qty">
							<p>2</p>
						</div>
						<div class="col col_total">
							<p>$700.00</p>
						</div>
					</div>
					<div class="row">
						<div class="col col_no">
							<p>05</p>
						</div>
						<div class="col col_des">
							<p class="bold">Backend Development</p>
							<p>Lorem ipsum dolor sit.</p>
						</div>
						<div class="col col_price">
							<p>$150</p>
						</div>
						<div class="col col_qty">
							<p>1</p>
						</div>
						<div class="col col_total">
							<p>$700.00</p>
						</div>
					</div> --}}
				</div>
			</div>
			<div class="paymethod_grandtotal_wrap">
				<div class="paymethod_sec">
					<p class="bold">Payment Method</p>
					<p>Visa, master Card and We accept Cheque</p>
				</div>
				<div class="grandtotal_sec">
			        {{-- <p class="bold">
			            <span>SUB TOTAL</span>
			            <span>RM{{ $myorder->totalAmount }}</span>
			        </p>
			        <p>
			            <span>Tax Vat 18%</span>
			            <span>$200</span>
			        </p>
			        <p>
			            <span>Discount 10%</span>
			            <span>-$700</span>
			        </p> --}}
			       	<p class="bold">
			            <span>SUB TOTAL</span>
			            <span>RM{{ $myorder->totalAmount }}</span>
			        </p>
				</div>
			</div>
		</div>
        @endforeach
        {{-- Footer --}}
		<div class="footer">
			<p>Thank you and Best Wishes</p>
			<div class="terms">
		        <p class="tc bold">Terms & Coditions</p>
		        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit non praesentium doloribus. Quaerat vero iure itaque odio numquam, debitis illo quasi consequuntur velit, explicabo esse nesciunt error aliquid quis eius!</p>
		    </div>
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
