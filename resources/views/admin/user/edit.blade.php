@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <h3 class="page-title mt-5">Edit User</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('update.user',['id' => $user->id] )}}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-6 mb-3">
                                                <label>User Name</label>
                                                <input class="form-control" type="text" name="name" value="{{ $user->name }}">
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
                                                    <option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ $user->status == '0' ? 'selected' : '' }}>Block</option>
                                                </select>

                                                @error('status')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label>Role</label>
                                                <select class="form-control @error('is_admin') is-invalid @enderror" name="is_admin">
                                                    <option value="">Choose a status</option>
                                                    <option value="1" {{ $user->is_admin == '1' ? 'selected' : '' }}>Admin</option>
                                                    <option value="0" {{ $user->is_admin == '0' ? 'selected' : '' }}>User</option>
                                                </select>
                                                @error('is_admin')
                                                <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

