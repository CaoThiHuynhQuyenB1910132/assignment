@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title mt-5">Create User</h3>
                        </div>
                        <div class="tab-content">
                            <form action="{{ route('store.user') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-lg-12 mb-3">
                                                    <label>User Name</label>
                                                    <input class="form-control" type="text" name="name">
                                                    @error('name')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <label>Gender</label>
                                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender" required>
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
                                                <div class="col-lg-12 mb-3">
                                                    <label>Phone Number</label>
                                                    <input class="form-control @error('phone') is-invalid @enderror" type="number" name="phone" id="phone" required>

                                                    @error('phone')
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-lg-12 mb-3">
                                                    <label>Email</label>
                                                    <input class="form-control" type="email" name="email" required>
                                                    @error('email')
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <label>Password</label>
                                                    <input class="form-control" type="password" name="password" id="password">

                                                    <p id="showHidePassword" style="cursor:pointer;">Show password</p>
                                                    @error('password')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <label>Role</label>
                                                    <select class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" required>
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
