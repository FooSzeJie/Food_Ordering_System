@extends('backend.admin-layout')

@section('adminCss')
    <link rel="stylesheet" href="{{ asset('admin/css/ProductSelectBar.css') }}">
@endsection

@section('backend-section')
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
    </div>

    {{-- @foreach($products as $product)
        <div>
            <form action="{{ url('admin/updateProduct/' . $product->id) }}" method="post">
                @csrf

                <div class="table-responsive">

                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name: </label>
                        <input type="text" class="form-control" id="productName" name="productName" value="{{ $product->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="productPrice" name="productPrice" value="{{ $product->price }}">
                    </div>

                    <div class="mb-3">
                        <label for="productImage" class="form-label">Select the file Image: </label>
                        <input class="form-control" type="file" id="productImage" name="productImage" value="{{ $product->image }}">
                    </div>

                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Product Description: </label>
                        <input type="text" class="form-control" id="productDescription" name="productDescription" value="{{ $product->description }}">
                    </div>

                    <div class="mb-3">
                        <label for="CategoryID" class="form-label">Category: </label>
                        <select class="form-select form-select-font-weight-5" id="select-menu" name="categoryID">
                            @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    @endforeach --}}

    <div>
        <form action="{{ route('updateProduct', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="table-responsive">
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="productName" name="name" value="{{ $product->name }}">
                </div>

                <div class="mb-3">
                    <label for="productImage" class="form-label">Select the file Image:</label>
                    <input class="form-control" type="file" id="productImage" name="image">
                </div>

                <div class="mb-3">
                    <label for="productPrice" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="productPrice" name="price" value="{{ $product->price }}">
                </div>

                <div class="mb-3">
                    <label for="productDescription" class="form-label">Product Description:</label>
                    <input type="text" class="form-control" id="productDescription" name="description" value="{{ $product->description }}">
                </div>

                <div class="mb-3">
                    <label for="CategoryID" class="form-label">Category:</label>
                    <select class="form-select form-select-font-weight-5" id="select-menu" name="categoryID">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->categoryID ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>

@endsection
