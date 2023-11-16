@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title mt-5">Edit Product:
                            </h3>
                            <h4 class="page-title">Product: {{ $product->name }}</h4>
                            <h4 class="page-title">
                                <a href="{{ route('product') }}" class="btn text-muted d-none d-sm-inline-block btn-link">
                                    <i class="mdi mdi-arrow-left"></i> Back to Product </a>
                            </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('update.product',['id' => $product->id] )}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-lg-12 mb-3">
                                                    <label >Product Name</label>
                                                    <input name="name" type="text" id="simpleinput" class="form-control" value="{{ $product->name }}">

                                                    @error('name')
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <label>Status</label>
                                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                                        <option value="">Choose a status</option>
                                                        <option value="1" {{ $product->status == '1' ? 'selected' : '' }}>Show</option>
                                                        <option value="0" {{ $product->status == '0' ? 'selected' : '' }}>Hidden</option>
                                                    </select>

                                                    @error('status')
                                                    <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <label for="example-textarea" class="form-label">Description</label>
                                                    <textarea rows="7" class="form-control" id="example-textarea" type="text" name="description">{{ $product->description }}</textarea>

                                                    @error('description')
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>Images</label>
                                                        <input
                                                            type="file"
                                                            accept="image/*"
                                                            class="form-control"
                                                            multiple
                                                            name="images[]">

                                                        @error('images.*')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            @foreach($product->productImages as $image)
                                                                <div class="col-md-4">
                                                                    <a href="{{ route('delete-image', ['id' => $image->id]) }}">
                                                                        <span class="uil-times"></span>
                                                                    </a>
                                                                    <div>
                                                                        <img class="avatar-xl .rounded-circle" src="{{ asset('storage/' . $image->image) }}">
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        @if(! $product->productImages->count())
                                                            Not have images
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-lg-12 mb-3">
                                                    <label>Original Price</label>
                                                    <input type="number" class="form-control" name="original_price" value="{{ $product->original_price }}">

                                                    @error('original_price')
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-12 mb-3">
                                                    <label>Selling Price</label>
                                                    <input type="number" class="form-control" name="selling_price" value="{{ $product->selling_price }}">

                                                    @error('selling_price')
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input @error('stock') is-invalid @enderror" type="radio" name="stock" value="1" id="in-stock-radio" {{ $product->stock == '1' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="in-stock-radio">In of Stock</label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input @error('stock') is-invalid @enderror" type="radio" name="stock" value="0" id="out-of-stock-radio" {{ $product->stock == '0' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="out-of-stock-radio">Out of Stock</label>
                                                    </div>

                                                    @error('stock')
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-lg-12 mb-3">
                                                    <div class="col-lg-12 mb-3">
                                                        <label>Featured</label>
                                                        <select class="form-control @error('featured') is-invalid @enderror" name="featured">
                                                            <option value="">Choose a status</option>
                                                            <option value="1" {{ $product->featured == '1' ? 'selected' : '' }}>Outstanding</option>
                                                            <option value="0" {{ $product->featured == '0' ? 'selected' : '' }}>Normal</option>
                                                        </select>

                                                        @error('featured')
                                                        <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <label>Category</label>
                                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                                            <option value="">Choose a status</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}" {{ $product->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @error('category_id')
                                                        <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
