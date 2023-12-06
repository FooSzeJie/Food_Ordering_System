@extends('backend.admin-layout')
@section('backend-section')

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

    <!-- Optional theme -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> --}}

    <!-- Latest compiled and minified JavaScript -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

    {{-- Add On Area --}}
    {{-- add new Add On --}}
    @include('backend.component.add-on.addAddOnModal')

    {{-- edit new Variant --}}
    @include('backend.component.add-on.editAddOnModal')

    {{-- Import Variant --}}
    @include('backend.component.add-on.importAddOnModal')

    {{-- show all Variant --}}
    <div class="container">

        {{-- <div id="map" style="height: 400px;"></div><br> --}}

        <div class="row">
            <div class="col-12">

                <h3>Add On</h3>

                {{-- Search Resort Function --}}
                {{-- <form action="{{ route('HotelSearch') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-white small m-2" name="name" placeholder="Search for Name" aria-label="Search" aria-describedby="basic-addon2">
                        <input type="text" class="form-control bg-white small m-2" name="country" placeholder="Search for Country" aria-label="Search" aria-describedby="basic-addon2">
                        <input type="text" class="form-control bg-white small m-2" name="state" placeholder="Search for State" aria-label="Search" aria-describedby="basic-addon2">
                        <input type="text" class="form-control bg-white small m-2" name="address" placeholder="Search for Address" aria-label="Search" aria-describedby="basic-addon2">
                        <input type="text" class="form-control bg-white small m-2" name="type" placeholder="Search for Type" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary pb-2"><i class="fas fa-search fa-sm"></i></button>
                        </div>
                    </div>
                </form> --}}

                <div class="data_table">

                    @if (\Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    @if (\Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <!-- Button to delete all selected items -->
                    <form action="{{ route('mutlipledeleteaddon') }}" method="post" id="deleteMultipleForm">
                        @csrf
                        <!-- Your table code here -->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                {{-- Button to delete all selected items --}}
                                <button type="submit" class="btn btn-danger m-1" id="deleteAllSelectedRecord">Delete All
                                    Selected Add On</button>
                                {{-- Add Variant --}}
                                <button type="button" class="btn btn-info m-1" data-toggle="modal"
                                    data-target="#addonModal">Add On Modal</button>
                                <!-- Import Variant Model -->
                                <button type="button" class="btn btn-primary m-1" data-toggle="modal"
                                    data-target="#importAddOnModal">Import Add On</button>
                                {{-- Export Variant --}}
                                <a href=""><button type="button" class="btn btn-primary m-1">Export Add
                                        On</button></a>
                                {{-- Variant Excel Template --}}
                                <a href=""><button type="button" class="btn btn-dark m-1">Add On Excel
                                        Template</button></a>

                                <thead class="table-dark">
                                    <tr>
                                        <th><input type="checkbox" name="" id="select_all_ids"
                                                onclick="checkAll(this)"></th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($addons !== 0 && count($addons) > 0)
                                        @foreach ($addons as $addon)
                                            <tr>
                                                <td><input type="checkbox" name="ids" class="checkbox_ids"
                                                        id="" value="{{ $addon->id }}"></td>
                                                <td>{{ $addon->id }}</td>
                                                <td>{{ $addon->name }}</td>
                                                <td>RM&nbsp;{{ $addon->price }}</td>
                                                <td>
                                                    @if ($addon->status == 0)
                                                        <a href="{{ url('changeaddon-status/' . $addon->id) }}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to change this status to close?')">InActive</a>
                                                    @else
                                                        <a href="{{ url('changeaddon-status/' . $addon->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            onclick="return confirm('Are you sure you want to change this status to open?')">Active</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#addoneditModal{{ $addon->id }}"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete this data?')"
                                                        href="{{ url('admin/deleteAddOn/' . $addon->id) . '/delete' }}"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9">No Variant Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <!-- Pagination links -->
                    {{ $addons->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- New Delete Selected All Table --}}
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

    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- Preview Function --}}
    <script type="text/javascript" src="{{ asset('admin/js/add-on/readAddOnExcel.js') }}"></script>

    <!-- Include SheetJS from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

@endsection
