@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Profile</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-5 col-lg-10">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar-container">
                                        @if($user->avatar === '')
                                            <img src="admin1/assets/images/users/avatar-1.jpg" class="avatar rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        @else
                                            <img src="{{ asset('storage/'.$user->avatar) }}" alt="{{ $user->name }}"
                                                 class="avatar rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        @endif
                                    </div>
                                    <h4 class="mb-0 mt-2">{{ $user->name }}</h4>
                                    <p class="text-muted font-14">Admin</p>

                                    <div class="text-start mt-3">

                                        <p class="text-muted mb-2 font-13">
                                            <strong>Full Name :</strong> <span class="ms-2">{{ $user->name }}</span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Gender :</strong><span class="ms-2">{{ $user->gender == 1 ? 'Woman' : 'Man' }}</span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{ $user->phone }}</span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">{{ $user->email }}</span></p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-lg-10">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                        <li class="nav-item">
                                            <a href="#info" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                                Info
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                                Settings
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="info">
                                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                            <form action="{{ route('update.profile',['id' => $user->id] )}}" method="POST" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf

                                                <div class="row">

                                                    <div class="row">
                                                        <div class="col-lg-6 mb-3">
                                                            <div class="mb-3">
                                                                <label >Full Name</label>
                                                                <input type="text" class="form-control" name="name"  placeholder="Enter Full name" value="{{ $user->name }}" >

                                                                @error('name')
                                                                <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 mb-3">
                                                            <label>Avatar</label>
                                                            <input
                                                                type="file"
                                                                class="form-control"
                                                                multiple
                                                                name="avatar">

                                                            @error('avatar.*')
                                                            <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6 mb-3">
                                                            <label>Gender</label>
                                                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                                                <option value="">Choose a status</option>
                                                                <option value="1" {{ $user->gender == '1' ? 'selected' : '' }}>Woman</option>
                                                                <option value="0" {{ $user->gender == '0' ? 'selected' : '' }}>Man</option>
                                                            </select>
                                                            @error('gender')
                                                            <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-lg-6 mb-3">
                                                            <label>Phone Number</label>
                                                            <input class="form-control @error('phone') is-invalid @enderror" type="number" name="phone" value="{{ $user->phone }}">

                                                            @error('phone')
                                                            <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="aboutme">
                                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Change to password</h5>
                                            <form action="{{ route('update.password',['id' => $user->id] )}}" method="POST">
                                                @method('PUT')
                                                @csrf

                                                <div class="row">

                                                    <div class="row">
                                                        <div class="col-lg-6 mb-3">
                                                            <div class="mb-3">
                                                                <label >Old Password</label>
                                                                <input type="password" name="password_old" id="password_old" class="form-control"  >
                                                                @error('password_old')
                                                                <span class="text-danger" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                </span>
                                                                @enderror
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 mb-3">
                                                            <label>New Password</label>
                                                            <input type="password" name="password" id="password" class="form-control"  >

                                                            @error('password_old')
                                                            <span class="text-danger" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-lg-12 mb-3">
                                                            <label>Confirm New Password</label>
                                                            <input type="password" name="new_password_confirmation"  id="password" class="form-control"  >

                                                            @error('new_password_confirmation')
                                                            <span class="text-danger" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                                            @enderror
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
                </div>
            </div>
        </div>
    </div>
@endsection


