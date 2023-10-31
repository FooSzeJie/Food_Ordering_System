@extends('backend.admin-layout')
@section('backend-section')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>
        </div>

        <div class="row">
            <div class="container">
                <div class="row justify-content-end ">
                    <div class="ml-1 p-2">
                        {{-- @can('createCategory') --}}
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoryModal"
                                data-bs-whatever="@mdo">Add Category</button>
                        {{-- @endcan --}}
                    </div>

                    <div class="ml-1 p-2">
                        <button class="btn btn-primary">Import Category</button>
                    </div>

                    <div class="ml-1 p-2">
                        <button class="btn btn-warning">Export Category</button>
                    </div>

                    <div class="ml-1 p-2">
                        <button class="btn btn-danger">Delete Category</button>
                    </div>
                </div>
            </div>

        </div>

        @include('backend.component.categoryModal')

    </div>

    <script src="{{ asset('admin/js/categoryModal.js') }}"></script>
@endsection
