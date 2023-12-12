@extends('frontend.user-layout')
@section('frontend-section')

{{-- Paginate CSS --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<style>
    #button-view{
        background: rgb(250, 133, 0);
    }
</style>

<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4">My Orders</h4>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Order ID</th>
                                <th>Tracking No</th>
                                <th>User Name</th>
                                <th>Order Date</th>
                                <th>Order Type</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                @if ($orders !== 0 && count($orders) > 0)
                                    @foreach($orders as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->user_name }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $item->order_type }}</td>
                                        <td>{{ $item->payment_status }}</td>
                                        <td><a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm" id="button-view">View</a></td>
                                    </tr>
                                    @endforeach
                                @else{
                                    <tr>
                                        <td colspan="7">No Orders Available</td>
                                    </tr>
                                }
                                @endif
                            </tbody>
                        </table>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
