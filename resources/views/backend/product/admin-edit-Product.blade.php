@extends('backend.admin-layout')

@section('adminCss')
    <link rel="stylesheet" href="{{ asset('admin/css/ProductSelectBar.css') }}">
@endsection

@section('title')
<title>Edit Product</title>
@endsection

@section('backend-section')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

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
                    <label for="ProductStatus" class="form-label">Product Status: </label>

                    <select class="form-select form-select-font-weight-5" id="select-menu" name="status">
                        <option value="0">Inactive</option>
                        <option value="1" selected>Active</option>
                    </select>
                </div>

                {{-- @if ($addons->count() > 0)
                    <div class="mb-3">
                        <label for="CategoryID" class="form-label">Add On: </label>
                        <select class="form-select form-select-font-weight-5" id="select-menu" name="addonID">
                            @foreach ($addons as $addon)
                                <option value="{{ $addon->id }}">{{ $addon->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <p>Haven't added any add on yet.</p>
                @endif --}}

                @if ($addons->count() > 0)
                    <div class="mb-3">
                        <label for="addonID" class="form-label">Add On: </label>
                        <select class="form-control selectpicker" data-style="btn-primary" id="select-addon" name="addonID[]" title="Select Add Ons" multiple>
                            @foreach ($addons as $addon)
                                <option value="{{ $addon->id }}">{{ $addon->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <p>Haven't added any add on yet.</p>
                @endif

                {{-- @if ($variants->count() > 0)
                    <div class="mb-3">
                        <label for "CategoryID" class="form-label">Variant: </label>
                        <select class="form-select form-select-font-weight-5" id="select-menu" name="variantID">
                            @foreach ($variants as $variant)
                                <option value="{{ $variant->id }}">{{ $variant->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <p>Haven't added any variant yet.</p>
                @endif --}}

                @if ($variants->count() > 0)
                    <div class="mb-3">
                        <label for="variantID" class="form-label">Variant: </label>
                        <select class="form-control selectpicker" data-style="btn-primary" id="select-variant" name="variantID[]" title="Select Variant" multiple>
                            @foreach ($variants as $variant)
                                <option value="{{ $variant->id }}">{{ $variant->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <p>Haven't added any variant yet.</p>
                @endif

                @if ($categories->count() > 0)
                    <div class="mb-3">
                        <label for="CategoryID" class="form-label">Category: </label>
                        <select class="form-select form-select-font-weight-5" id="select-menu" name="categoryID">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <p>Haven't added any categories yet.</p>
                @endif

                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection
