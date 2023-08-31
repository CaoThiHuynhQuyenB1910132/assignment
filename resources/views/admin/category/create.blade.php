@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Thêm Danh Mục</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tên Danh Mục</label>
                                            <input class="form-control" type="text" name="name">

                                                @error('name')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Thêm Hình Ảnh</label>
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
                                            <label>Nổi Bật</label>
                                            <select class="form-control @error('featured') is-invalid @enderror" name="featured">
                                                <option value="">Choose a status</option>
                                                <option value="1">Nổi Bật</option>
                                                <option value="2">Không Nổi Bật</option>
                                            </select>

                                            @error('featured')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
