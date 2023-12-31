@extends('backend.admin-layout')

@section('adminCss')
    <link rel="stylesheet" href="{{ asset('admin/css/ProductSelectBar.css') }}">
@endsection

@section('title')
<title>Add Product</title>
@endsection

@section('backend-section')
<div class="container-fluid">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<style>
    /* Override the default select color */
    .selectpicker {
        background-color: white;
        color: #000; /* Text color */
        border: 1px solid #ccc; /* Border color */
    }
</style>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Product</h1>
    </div>

    <div>
        <form action="{{ route('storeProduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="table-responsive">

                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name: </label>
                    <input type="text" class="form-control" id="productName" name="name">
                </div>

                <div class="mb-3">
                    <label for="productImage" class="form-label">Select the file Image: </label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="productPrice" class="form-label">Price</label>
                    <input type="number" class="form-control" id="productPrice" name="price" step="0.01">
                </div>

                <div class="mb-3">
                    <label for="productDescription" class="form-label">Product Description: </label>
                    <input type="text" class="form-control" id="productDescription" name="description">
                </div>

                @if ($categorys->count() > 0)
                    <div class="mb-3">
                        <label for="CategoryID" class="form-label">Category: </label>
                        <select class="form-select form-select-font-weight-5" id="select-category" name="categoryID">
                            @foreach ($categorys as $category)
                                @if($category->status !== 0)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                @else
                    <p>Haven't added any categories yet.</p>
                @endif

                <div class="mb-3">
                    <label for="ProductStatus" class="form-label">Product Status: </label>
                    <select class="form-select form-select-font-weight-5" id="select-status" name="status">
                        <option value="0">Inactive</option>
                        <option value="1" selected>Active</option>
                    </select>
                </div>

                @if ($addons->count() > 0)
                    <div class="mb-3">
                        <label for="addonID" class="form-label">Add On: </label>
                        <select class="form-control selectpicker" data-style="btn-primary" id="select-addon" name="addonID[]" title="Select Add Ons" multiple>
                            @foreach ($addons as $addon)
                                @if($addon->status !== 0)
                                    <option value="{{ $addon->id }}">{{ $addon->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                @else
                    <p>Haven't added any add on yet.</p>
                @endif

                @if ($variants->count() > 0)
                    <div class="mb-3">
                        <label for="variantID" class="form-label">Variant: </label>
                        <select class="form-control selectpicker" data-style="btn-primary" id="select-variant" name="variantID[]" title="Select Variant" multiple>
                            @foreach ($variants as $variant)
                                @if($variant->status !== 0)
                                    <option value="{{ $variant->id }}">{{ $variant->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                @else
                    <p>Haven't added any variant yet.</p>
                @endif

            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection
