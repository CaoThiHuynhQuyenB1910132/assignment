@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
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
                                    <div class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                        <form method="GET" action="{{ route('user') }}" class="col-auto">
                                            @csrf
                                            <label for="searchInput" class="visually-hidden">Search</label>
                                            <input type="search" class="form-control" name="searchInput" id="searchInput" placeholder="Search...">
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="datatable table table-stripped table table-hover table-center mb-0 mt-3">
                                            <thead class="table-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>User Name</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th style="width: 75px;">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ( $users as $user )
                                                <tr>
                                                    <td>{{ $user->id }}</td>

                                                    <td>
                                                        <img src="{{ asset('storage/'.$user->avatar) }}"
                                                             class="rounded me-3" height="48">
                                                        {{ $user->name }}
                                                    </td>

                                                    <td>
                                                        <span class="badge badge-{{ $user->gender == 1 ? 'success-lighten' : 'danger-lighten' }}">{{ $user->gender == 1 ? 'Woman' : 'Man' }}</span>
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
                                            @if(!$users->count()>0)
                                                <tr>
                                                    <th class="text-center" colspan="7">User not found!</th>
                                                </tr>
                                            @endif
                                        </table>
                                        <div class="pt-3">{{ $users->links() }}</div>
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
