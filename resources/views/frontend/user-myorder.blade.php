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
						<span>: {{ $orders->tracking_no }}</span>
					</p>
					<p class="date">
						<span class="bold">Date :</span>
						<span>{{ $orders->created_at->format('d-m-Y') }}</span>
					</p>
                    <p class="date">
                        <span class="bold">Time :</span>
                        <span>{{ $orders->created_at->format('h:i:s A') }}</span>
                    </p>
				</div>
			</div>
                <div class="bill_total_wrap">

                    <div class="bill_sec">
                        <p>Bill To</p>
                        <p class="bold name">Name: {{ $orders->user_name }}</p>
                    </div>
                    {{-- <div class="total_wrap">
                        <p>Total Amount</p>
                        @foreach($orders->orderItems as $orderItem)
                        <p class="bold price">{{ $orderItem->totalAmount }}</p>
                        @endforeach
                    </div> --}}
			       	{{-- <p class="bold">
                        @foreach($orders->orderItems as $orderItem)
			            <span>SUB TOTAL</span>
			            <span>RM{{ $orderItem->totalAmount }}</span>
                        @endforeach
			        </p> --}}

                </div>
		</div>

		<div class="body">
			<div class="main_table">
				<div class="table_header">
					<div class="row">
						<div class="col col_no">NO.</div>
						<div class="col col_des">Food Name</div>
                        <div class="col col_des">Food Image</div>
						<div class="col col_price">Price</div>
						<div class="col col_qty">Quantity</div>
						{{-- <div class="col col_total">TOTAL</div> --}}
					</div>
				</div>
				@foreach($orders->orderItems as $orderItem)
					<div class="table_body">
						<div class="row">
							<div class="col col_no">
								<p>{{ $orderItem->id }}</p>
							</div>
							<div class="col col_des">
								<p class="bold">{{ $orderItem->product_name }}</p>
							</div>
							<div class="col col_price">
								{{-- <p>{{ $orderItem->product_image }}</p> --}}
                                <img width="80" src="{{ asset('images/' . $orderItem->product_image) }}" style="mr-20px" alt="Image" />
							</div>
							<div class="col col_price">
								<p id="totalPrice">{{ $orderItem->total_price }}</p>
							</div>
							<div class="col col_qty">
								<p>{{ $orderItem->product_quantity }}</p>
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
				@endforeach
			</div>
			<div class="paymethod_grandtotal_wrap">
				<div class="paymethod_sec">
					<p class="bold">Payment Method</p>
					<p>Visa, master Card and We accept Cheque</p>
				</div>
				<div class="grandtotal_sec">
			        <p class="bold">
			            <span>SUB TOTAL</span>
			            <span>RM{{ $totalSum }}</span>
			        </p>
			        <p>
			            <span>Tax</span>
			            <span>-</span>
			        </p>
			        <p>
			            <span>Discount</span>
			            <span>-</span>
			        </p>
					{{-- @foreach($orders->orderItems as $orderItem) --}}
			       	<p class="bold">
			            <span>Final SUB TOTAL</span>
			            <span id="totalAmount">RM{{ $totalSum }}</span>
			        </p>
					{{-- @endforeach --}}
				</div>
			</div>
		</div>
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

<!-- 引入 jQuery（如果使用） -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

{{-- <script>
    // 使用 JavaScript 计算总和并更新显示
    $(document).ready(function() {
        // 获取原始的总和值
        var totalSum = parseFloat($('#totalPrice').text());

        // 更新显示在<span>中
        $('#totalAmount').text('RM' + totalSum.toFixed(2));
    });
</script> --}}

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
