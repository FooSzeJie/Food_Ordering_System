@extends('backend.admin-layout')
@section('backend-section')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
        </div>

        <div class="row">
            <div class="container">
                <div class="row justify-content-end ">
                    <div class="ml-1 p-2">
                        {{-- @can('createCategory') --}}
                        <a href="{{ url('/admin/Product/Create') }}" class="btn btn-success">Add Product</a>
                        {{-- @endcan --}}
                    </div>

                    <div class="ml-1 p-2">
                        <button class="btn btn-primary">Import Product</button>
                    </div>

                    <div class="ml-1 p-2">
                        <button class="btn btn-warning">Export Product</button>
                    </div>

                    <div class="ml-1 p-2">
                        <button class="btn btn-danger">Delete Product</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="table-responsive mt-2">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
