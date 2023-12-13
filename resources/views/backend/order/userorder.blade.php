@extends('backend.admin-layout')
@section('backend-section')

{{-- Paginate CSS --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

{{-- <style>
    #button-view{
        background: rgb(250, 133, 0);
    }
</style> --}}

<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4">My Orders</h4>
                    <hr>

                    <form action="{{ route('mutlipledeleteorder') }}" method="post" id="deleteMultipleForm">
                        @csrf

                        <div class="table-responsive">

                            {{-- Delete All Selected User Orders --}}
                            <button type="submit" class="btn btn-danger m-1" id="deleteAllSelectedRecord">Delete All Selected User Orders</button>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th><input type="checkbox" name="" id="select_all_ids" onclick="checkAll(this)"></th>
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
                                        @foreach($orders as $useritem)
                                        <tr>
                                            <td><input type="checkbox" name="ids" class="checkbox_ids" id="" value="{{ $useritem->id }}"></td>
                                            <td>{{ $useritem->id }}</td>
                                            <td>{{ $useritem->tracking_no }}</td>
                                            <td>{{ $useritem->user_name }}</td>
                                            <td>{{ $useritem->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $useritem->order_type }}</td>
                                            <td>{{ $useritem->payment_status }}</td>
                                            <td><a href="{{ url('vieworder/'.$useritem->id) }}" class="btn btn-primary btn-sm" id="button-view">View</a></td>
                                        </tr>
                                        @endforeach
                                    @else{
                                        <tr>
                                            <td colspan="7">No User Orders Available</td>
                                        </tr>
                                    }
                                    @endif
                                </tbody>
                            </table>
                            <div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- New Delete Selected All User Contact --}}
<script>
    // Function to check/uncheck all checkboxes
    function checkAll(checkbox) {
        const checkboxes = document.getElementsByClassName('checkbox_ids');
        for (const cb of checkboxes) {
            cb.checked = checkbox.checked;
        }
    }

    document.getElementById('deleteAllSelectedRecord').addEventListener('click', function() {
        const checkboxes = document.getElementsByClassName('checkbox_ids');
        const selectedIds = [];

        for (const checkbox of checkboxes) {
            if (checkbox.checked) {
                selectedIds.push(parseInt(checkbox.value));
            }
        }

        if (selectedIds.length === 0) {
            alert('Please select at least one restaurant to delete.');
        } else {
            const form = document.getElementById('deleteMultipleForm');
            const idsInput = document.createElement('input');
            idsInput.type = 'hidden';
            idsInput.name = 'ids';
            idsInput.value = JSON.stringify(selectedIds);
            form.appendChild(idsInput);

            form.submit();
        }
    });
</script>

@endsection
