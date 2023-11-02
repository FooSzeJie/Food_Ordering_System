@extends('backend.admin-layout')
@section('backend-section')

{{-- Paginate bootstrap example --}}
<!-- Latest compiled and minified CSS -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

<!-- Optional theme -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> --}}

<!-- Latest compiled and minified JavaScript -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

    {{-- show all Products --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Products</h3>
                <div class="data_table">

                    {{-- Session --}}
                    @include('backend.component.session')

                    <!-- Button to delete all selected items -->
                    <form action="{{ url('mutlipledeleteproduct/delete') }}" method="post" id="deleteMultipleForm">
                        @csrf
                        <!-- Your table code here -->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">

                                {{-- Button to delete all selected items --}}
                                <button type="submit" class="btn btn-danger m-1" id="deleteAllSelectedRecord">Delete All
                                    Selected Products</button>

                                {{-- Add Product --}}
                                <a href="{{ url('/admin/Product/Create') }}"><button type="button"
                                        class="btn btn-primary">Add Product</button></a>

                                <!-- Import Product -->
                                <button type="button" class="btn btn-info m-1" data-toggle="modal"
                                    data-target="#hotelexcelModal">Import Product</button>

                                {{-- Export Resort --}}
                                {{-- <a href="{{ url('export-hotel') }}"><button type="button" class="btn btn-primary m-1">Export Hotel</button></a> --}}

                                {{-- Products Excel Template --}}
                                <a href=""><button type="button" class="btn btn-dark m-1">Product Excel
                                        Template</button></a>

                                <thead class="table-dark">
                                    <tr>
                                        <th><input type="checkbox" name="" id="select_all_ids"
                                                onclick="checkAll(this)"></th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        {{-- <th>Variant</th>
                                        <th>Add Ons</th> --}}
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products !== 0 && count($products) > 0)
                                        @foreach ($products as $product)
                                            <tr>
                                                <td><input type="checkbox" name="ids" class="checkbox_ids"
                                                        id="" value="{{ $product->id }}"></td>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td><img width="80" src="{{ asset('images/' . $product->image) }}"
                                                        alt="Image" /></td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->description }}</td>
                                                {{-- <td>{{ $product->variant }}</td>
                                                <td>{{ $product->addOns }}</td> --}}
                                                <td>{{ $product->category->name ?? 'No Category' }}</td>
                                                <td>
                                                    @if ($product->status == 1)
                                                        <a href="{{ url('changeproduct-status/' . $product->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            onclick="return confirm('Are you sure you want to change this status to Inactive?')">Acitve</a>
                                                    @else
                                                        <a href="{{ url('changeproduct-status/' . $product->id) }}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to change this status to Acitve?')">Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/editProduct/' . $product->id) . '/edit' }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete this data?')"
                                                        href="{{ url('admin/deleteProduct/' . $product->id) . '/delete' }}"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9">No Product Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </form>

                    <!-- Pagination links -->
                    <div class="row">{{ $products->links() }}</div>

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
@endsection