@foreach ($variants as $variant)
    <!-- Modal content for each Variant -->
    <div class="modal fade" id="varianteditModal{{ $variant->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal header and form -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Variant Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ url('/admin/updateVariant/' . $variant->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Variant Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ $variant->name }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price" step="0.01"
                                value="{{ $variant->price }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Variant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
