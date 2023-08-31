@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Cập Nhật Hình Ảnh</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{  route('update.product-image',['id' => $product_image->id])  }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <figure class="figure">
                                        <img src="{{ 'storage/' . $product_image -> image }}" class="rounded-circle avatar-xl" alt="Old Image">
                                    </figure>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tải Hình Ảnh</label>
                                            <div class="custom-file mb-3">
                                                <input type="file" accept="image/*" class="custom-file-input @error('image') is-invalid @enderror" id="image"
                                                       name="image">

                                                @error('image')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <label class="custom-file-label" for="image">Chọn file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Sản Phẩm</label>
                                            <select class="form-control @error('product_id') is-invalid @enderror" name="product_id" id="product_id">
                                                <option value="">Choose a status</option>
                                                @foreach ($products as $product)
                                                    <option value="{{$product->id}}" {{ $product_image->product->id == $product->id ? 'selected' : '' }}>{{$product->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('product_id')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
