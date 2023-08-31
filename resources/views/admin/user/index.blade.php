@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Người Dùng</h4> <a href="{{ route('create.user') }}" class="btn btn-primary float-right veiwbutton">Thêm Người Dùng</a> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form>
                        <div class="row formtype">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Staff ID</label>
                                    <input class="form-control" type="text" value="BKG-0001"> </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Staff Name</label>
                                    <input class="form-control" type="text" value="BKG-0001"> </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" id="sel1" name="sellist1">
                                        <option>Select</option>
                                        <option>Staff</option>
                                        <option>Manager</option>
                                        <option>Receptionalist</option>
                                        <option>Accountant</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Search</label> <a href="#" class="btn btn-success btn-block mt-0 search_button"> Search </a> </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped table table-hover table-center mb-0">

                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ Tên</th>
                                        <th>Giới Tính</th>
                                        <th>Trạng Thái</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Email</th>
                                        <th>Quyền</th>
                                        <th class="text-right">Hành Động</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->gender }}</td>
                                            @if($user->status === 1)
                                                <td><span class="badge badge-success">Hiển thị</span></td>
                                            @else
                                                <td><span span class="badge badge-danger">Không hiển thị</span></td>
                                            @endif
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            @if($user->is_admin === 1)
                                                <td><span class="badge badge-purple">Quản trị viên</span></td>
                                            @else
                                                <td><span span class="badge badge-secondary">Người dùng</span></td>
                                            @endif
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="{{route('edit.user', ['id' => $user->id])}}" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{route('edit.user', ['id' => $user->id])}}">
                                                            <i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="{{route('delete.user', ['id' => $user->id])}}" >
                                                            <i class="fas fa-trash-alt m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
