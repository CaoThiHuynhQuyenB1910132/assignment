@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Cập Nhật Sản Phẩm</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('update.product',['id' => $product->id]) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input class="form-control" type="text" name="name" value="{{$product->name}}">
                                @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mô Tả</label>
                                <textarea class="form-control" type="text" name="description">{{$product->description}}</textarea>
                                @error('description')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Trạng Thái</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option value="">Choose a status</option>
                                    <option value="1" {{ $product->status == '1' ? 'selected' : '' }}>Nổi Bật</option>
                                    <option value="0" {{ $product->status == '0' ? 'selected' : '' }}>Không Nổi Bật</option>
                                </select>

                                @error('status')
                                <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nổi Bật</label>
                                <select class="form-control @error('featured') is-invalid @enderror" name="featured">
                                    <option value="">Choose a status</option>
                                    <option value="1" {{ $product->featured == '1' ? 'selected' : '' }}>Nổi Bật</option>
                                    <option value="0" {{ $product->featured == '0' ? 'selected' : '' }}>Không Nổi Bật</option>
                                </select>

                                @error('status')
                                <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Original Price</label>
                                <input type="number" class="form-control" name="original_price" value="{{$product->original_price}}">
                                @error('original_price')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Selling Price</label>
                                <input type="number" class="form-control" name="selling_price" value="{{$product->selling_price}}">
                                @error('selling_price')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kho</label>
                                <select class="form-control @error('stock') is-invalid @enderror" name="stock">
                                    <option value="">Choose a status</option>
                                    <option value="1" {{ $product->stock == '1' ? 'selected' : '' }}>Còn Hàng</option>
                                    <option value="0" {{ $product->stock == '0' ? 'selected' : '' }}>Hết Hàng</option>
                                </select>

                                @error('stock')
                                <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Danh Mục Sản Phẩm</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{ $product->category->id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary buttonedit">Cập Nhật</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
