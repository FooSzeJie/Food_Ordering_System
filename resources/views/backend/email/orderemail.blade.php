<!DOCTYPE html>
<html>
<head>
    <title>Order Successfully Email</title>
</head>
<body>
    <h2>Order Information</h2>
    <p><strong>Subject :</strong> {{ $data['subject'] }}</p>
    <p><strong>Customer Name :</strong> {{ $data['customer_name'] }}</p>
    <p><strong>Customer Email :</strong> {{ $data['customer_email'] }}</p>
    <p><strong>Order id :</strong> {{ $data['order_id'] }}</p>
    <p><strong>Tracking No:</strong> {{ $data['tracking_no'] }}</p>
    <p><strong>Order Type:</strong> {{ $data['order_type'] }}</p>

    <hr>

    <h3>Product Details</h3>

    @foreach($data['products'] as $product)
    <p><strong>Product Name :</strong> {{ $product['product_name'] }}</p>
    <p><strong>Product Quantity:</strong> {{ $product['product_quantity'] }}</p>
    <p><strong>Total Price:</strong> RM {{ $product['total_price'] }}</p>

    {{-- Handle addons and variants --}}
    <p><strong>Addons:</strong> {{ is_array($product['addons']) ? implode(', ', $product['addons']) : $product['addons'] }}</p>
    <p><strong>Variants:</strong> {{ is_array($product['variants']) ? implode(', ', $product['variants']) : $product['variants'] }}</p>

    <hr>
@endforeach


</body>
</html>
