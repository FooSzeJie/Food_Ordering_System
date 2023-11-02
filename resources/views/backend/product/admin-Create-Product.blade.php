@extends('backend.admin-layout')

@section('adminCss')
    <link rel="stylesheet" href="{{ asset('admin/css/ProductSelectBar.css') }}">
@endsection

@section('backend-section')
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
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>

                    <div class="mb-3">
                        <label for="productImage" class="form-label">Select the file Image: </label>
<<<<<<< HEAD
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" >
=======
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
>>>>>>> 68c54dfb6612a323205d23b9050c45fc195ad190
                    </div>

                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="productPrice" name="price">
                    </div>

                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Product Description: </label>
                        <input type="text" class="form-control" id="productDescription" name="description">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>

                    {{-- <div class="mb-3">
                        <label for="ProductStatus" class="form-label">Product Status: </label>

                        <select class="form-select form-select-font-weight-5" id="select-menu" name="status">
                            <option value="0">Inactive</option>
                            <option value="1" selected>Active</option>
                        </select>
                    </div> --}}

                    @if ($addons->count() > 0)
                        <div class="mb-3">
                            <label for="CategoryID" class="form-label">Add On: </label>
                            <select class="form-select form-select-font-weight-5" id="select-menu" name="categoryID">
                                @foreach ($addons as $addon)
                                    <option value="{{ $addon->id }}">{{ $addon->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <p>Haven't added any add ons yet.</p>
                    @endif

                    @if ($variants->count() > 0)
                        <div class="mb-3">
                            <label for="CategoryID" class="form-label">Variant: </label>
                            <select class="form-select form-select-font-weight-5" id="select-menu" name="categoryID">
                                @foreach ($variants as $variant)
                                    <option value="{{ $variant->id }}">{{ $variant->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <p>Haven't added any variants yet.</p>
                    @endif

                    @if ($categorys->count() > 0)
                        <div class="mb-3">
                            <label for="CategoryID" class="form-label">Category: </label>
                            <select class="form-select form-select-font-weight-5" id="select-menu" name="categoryID">
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <p>Haven't added any categories yet.</p>
                    @endif

                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
@endsection
