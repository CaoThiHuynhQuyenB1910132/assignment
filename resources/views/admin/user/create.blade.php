@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add User</h3> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('store.user') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Họ Tên</label>
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
                                    <label>Giới Tính</label>
                                    <select class="form-control" @error('gender') is-invalid @enderror" name="gender">
                                        <option value="">Choose a status</option>
                                        <option value="man">Man</option>
                                        <option value="woman">Woman</option>
                                    </select>
                                    @error('gender')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nổi Bật</label>
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
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password" id="password">

                                    <p id="showHidePassword" style="cursor:pointer;">Show password</p>
                                    @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Là Quản Trị Viên ?</label>
                                    <select class="form-control" @error('is_admin') is-invalid @enderror" name="is_admin">
                                        <option value="">Choose a status</option>
                                        <option value="1">Phải</option>
                                        <option value="0">Không</option>
                                    </select>
                                    @error('is_admin')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary buttonedit ml-2">Thêm Người Dùng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const password = document.getElementById('password')
        const showHidePwd = document.getElementById('showHidePassword')

        showHidePwd.onclick = () => {
            showHidePassword()
        }

        const showHidePassword = () => {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            showHidePwd.textContent = (type === 'password') ? 'Show password' : 'Hide password';
        }
    </script>
@endsection
