@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                        <li class="breadcrumb-item active">Users</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Users</h4>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <a href="{{ route('create.user') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Users</a>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User Name</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th style="width: 75px;">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ( $users as $key => $user )
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $user->name }}</td>

                                                    <td>
                                                        <span class="badge badge-{{ $user->gender == 1 ? 'success-lighten' : 'danger-lighten' }}">{{ $user->gender == 1 ? 'Woman' : 'Man' }}</span>
                                                    </td>

                                                    <td>
                                                        <span class="badge badge-{{ $user->status == 1 ? 'success-lighten' : 'danger-lighten' }}">{{ $user->status == 1 ? 'Active' : 'Block' }}</span>
                                                    </td>

                                                    <td>{{ $user->phone }}</td>

                                                    <td>{{ $user->email }}</td>

                                                    @if( $user->is_admin === 1 )
                                                        <td><span class="badge badge-info-lighten">Admin</span></td>
                                                    @else
                                                        <td><span class="badge badge-success-lighten">User</span></td>
                                                    @endif

                                                    <td class="">
                                                        <a href="{{ route('edit.user', ['id' => $user->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="{{ route('delete.user', ['id' => $user->id]) }}" class="action-icon" onclick="return confirm('Are you sure?')"> <i class="mdi mdi-delete"></i></a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
