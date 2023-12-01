@extends('backend.admin-layout')
@section('backend-section')

{{-- show all User Contact --}}
<div class="container">

    {{-- <div id="map" style="height: 400px;"></div><br> --}}

    <div class="row">
        <div class="col-12">
            <div class="data_table">

                @if (\Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif

                @if (\Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                <!-- Button to delete all selected items -->
                <form action="{{ route('mutlipledeleteContact') }}" method="post" id="deleteMultipleForm">
                    @csrf
                    <!-- Your table code here -->
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            {{-- Button to delete all selected items --}}
                            <button type="submit" class="btn btn-danger m-1" id="deleteAllSelectedRecord">Delete All
                                Selected User Contact</button>
                            {{-- Add Resort --}}
                            {{-- <button type="button" class="btn btn-info m-1" data-toggle="modal"
                                data-target="#roomModal">Add Room</button> --}}
                            {{-- Export Resort --}}
                            {{-- <a href="{{ url('export-room') }}"><button type="button" class="btn btn-primary m-1">Export
                                    Room</button></a> --}}
                            <thead class="table-dark">
                                <tr>
                                    <th><input type="checkbox" name="" id="select_all_ids" onclick="checkAll(this)"></th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>User Phone Number</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    {{-- <th>ACTIONS</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if ($contacts !== null && $contacts->count() > 0)
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td><input type="checkbox" name="ids" class="checkbox_ids" id="" value="{{ $contact->id }}"></td>
                                            {{-- <td>{{ $contact->id }}</td> --}}
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>{{ $contact->message }}</td>
                                            {{-- <td>
                                                <!-- <a href="" class="btn btn-info btn-sm"><i class="las la-eye"></i></a> -->
                                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#roomeditModal{{ $room->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Are you sure to delete this data?')"
                                                    href="{{ url('deleteRoom/' . $room->id) . '/delete' }}"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9">No User Contact Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </form>

                <!-- Pagination links -->
                {{ $contacts->links() }}
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
