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
                    <form action="{{ route('store.user') }}" method="POST">
                        @csrf

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="row">

                                        <div class="col-lg-6 mb-3">
                                            <label>User Name</label>
                                            <input class="form-control" type="text" name="name">
                                            @error('name')
                                            <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label>Gender</label>
                                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                                <option value="">Choose a status</option>
                                                <option value="1">Woman</option>
                                                <option value="0">Man</option>
                                            </select>
                                            @error('gender')
                                            <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label>Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                                <option value="">Choose a status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Block</option>
                                            </select>

                                            @error('status')
                                            <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label>Phone Number</label>
                                            <input class="form-control @error('phone') is-invalid @enderror" type="number" name="phone" id="phone">

                                            @error('phone')
                                            <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email">
                                            @error('email')
                                            <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="password" id="password">

                                            <p id="showHidePassword" style="cursor:pointer;">Show password</p>
                                            @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label>Role</label>
                                            <select class="form-control" @error('is_admin') is-invalid @enderror" name="is_admin">
                                            <option value="">Choose a status</option>
                                            <option value="1">Admin</option>
                                            <option value="0">User</option>
                                            </select>
                                            @error('is_admin')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
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
