@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title mt-5">Create Product</h3>
                            </div>
                        </div>
                    <div class="tab-content">
                        <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-lg-12 mb-3">
                                                <label >Product Name</label>
                                                <input name="name" type="text" id="simpleinput" class="form-control">

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
                                                    <option value="1">Show</option>
                                                    <option value="0">Hidden</option>
                                                </select>

                                                @error('status')
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="example-textarea" class="form-label">Description</label>
                                                <textarea rows="7" class="form-control" id="example-textarea" type="text" name="description"></textarea>

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
                                                <div class="col-lg">
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
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-lg-12 mb-3">
                                                <label>Original Price</label>
                                                <input type="number" class="form-control" name="original_price">

                                                @error('original_price')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-12 mb-3">
                                                <label>Selling Price</label>
                                                <input type="number" class="form-control" name="selling_price">

                                                @error('selling_price')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-12 mb-3">

                                                <div class="form-check form-switch mb-3">
                                                    <input class="form-check-input @error('stock') is-invalid @enderror" type="radio" name="stock" value="1" id="in-stock-radio">
                                                    <label class="form-check-label" for="in-stock-radio">In of Stock</label>
                                                </div>
                                                <div class="form-check form-switch mb-3">
                                                    <input class="form-check-input @error('stock') is-invalid @enderror" type="radio" name="stock" value="0" id="out-of-stock-radio">
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
                                                        <option value="1">Outstanding</option>
                                                        <option value="0">Normal</option>
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
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
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
@endsection
