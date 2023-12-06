@extends('backend.admin-layout')

@section('title')
    <title>Admin Category</title>
@endsection

@section('backend-section')

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    {{-- Create Category Modal --}}
    @include('backend.component.category.createCategoryModal')

    {{-- Edit Category Modal --}}
    @include('backend.component.category.editCategoryModal')

    {{-- Import Category Modal --}}
    @include('backend.component.category.importCategoryModal')

    {{-- show all Category --}}
    <div class="container">

        {{-- <div id="map" style="height: 400px;"></div><br> --}}

        <div class="row">
            <div class="col-12">

                <h3>Category</h3>

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

                    {{-- Session --}}
                    @include('backend.component.session')

                    <!-- Button to delete all selected items -->
                    <form action="{{ route('mutlipledeletecategory') }}" method="post" id="deleteMultipleForm">
                        @csrf
                        <!-- Your table code here -->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                {{-- Button to delete all selected items --}}
                                <button type="submit" class="btn btn-danger m-1" id="deleteAllSelectedRecord">Delete All
                                    Selected Category</button>
                                {{-- Add Resort --}}
                                <button type="button" class="btn btn-info m-1" data-toggle="modal"
                                    data-target="#categoryModal">Add Category</button>
                                <!-- Import Hotel Model -->
                                <button type="button" class="btn btn-primary m-1" data-toggle="modal"
                                    data-target="#importCategoryModal">Import Category</button>
                                {{-- Export Resort --}}
                                <a href="{{ asset('excel/categoryTemplate.xlsx') }}" class="btn btn-primary m-1">Export
                                        Category</a>
                                {{-- Hotel Excel Template --}}
                                <a href=""><button type="button" class="btn btn-dark m-1">Category Excel
                                        Template</button></a>

                                <thead class="table-dark">
                                    <tr>
                                        <th><input type="checkbox" name="" id="select_all_ids"
                                                onclick="checkAll(this)"></th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($categories !== 0 && count($categories) > 0)
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td><input type="checkbox" name="ids" class="checkbox_ids"
                                                        id="" value="{{ $category->id }}"></td>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    @if ($category->status == 0)
                                                        <a href="{{ url('changecategory-status/' . $category->id) }}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to change this status to close?')">InActive</a>
                                                    @else
                                                        <a href="{{ url('changecategory-status/' . $category->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            onclick="return confirm('Are you sure you want to change this status to open?')">Active</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- <a href="{{ url('viewHotel/' . $hotel->id) . '/view' }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> --}}
                                                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#categoryeditModal{{ $category->id }}"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete this data?')"
                                                        href="{{ url('admin/deleteCategory/' . $category->id) . '/delete' }}"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9">No Category Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <!-- Pagination links -->
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- New Delete Selected All Table --}}
    <script src="{{ asset('admin/js/category/deleteSelectedCategory.js') }}"></script>

    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- Read Excel File Data JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

    {{-- Read Category Excel File Data --}}
    <script src="{{ asset('admin\js\category\readCategoryExcel.js') }}"></script>

@endsection
