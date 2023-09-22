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
                                <div class="col-lg-6 mb-3">
                                    <label >Product Name</label>
                                    <input name="name" type="text" id="simpleinput" class="form-control">

                                    @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label>Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="">Choose a status</option>
                                        <option value="1">Nổi Bật</option>
                                        <option value="0">Không Nổi Bật</option>
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

                                <div class="col-lg-6 mb-3">
                                    <label>Featured</label>
                                    <select class="form-control @error('featured') is-invalid @enderror" name="featured">
                                        <option value="">Choose a status</option>
                                        <option value="1">Nổi Bật</option>
                                        <option value="0">Không Nổi Bật</option>
                                    </select>

                                    @error('featured')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-3">
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

                                <div class="col-lg-6 mb-3">
                                    <label>Original Price</label>
                                    <input type="number" class="form-control" name="original_price">

                                    @error('original_price')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label>Selling Price</label>
                                    <input type="number" class="form-control" name="selling_price">

                                    @error('selling_price')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label>Stock</label>
                                    <select class="form-control @error('stock') is-invalid @enderror" name="stock">
                                        <option value="">Choose a status</option>
                                        <option value="1">Còn Hàng</option>
                                        <option value="0">Hết Hàng</option>
                                    </select>

                                    @error('stock')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-3">
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

                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
