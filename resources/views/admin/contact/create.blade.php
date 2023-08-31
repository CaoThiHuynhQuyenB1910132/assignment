@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Tạo Liên Hệ</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('store.contact') }}" method="POST">
                        @csrf

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tên Liên Hệ</label>
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
                                <label>Email</label>
                                <input class="form-control" type="email" name="email">
                                @error('email')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tin Nhắn</label>
                                <textarea class="form-control" type="text" name="message"></textarea>
                                @error('message')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Số Điện Thoại</label>
                                <input class="form-control" type="number" name="phone">
                                @error('phone')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary buttonedit">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
