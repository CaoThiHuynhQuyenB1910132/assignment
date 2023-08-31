@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Liên Hệ</h4>
                            <a href="{{ route ('create.contact') }}" class="btn btn-primary float-right view button ">Thêm Liên Hệ</a>
                        </div>
                    </div>
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
                                        <th>Tên Liên Hệ</th>
                                        <th>Email</th>
                                        <th>Tin Nhắn</th>
                                        <th>Số Điện Thoại</th>
                                        <th class="text-right">Công Cụ</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->id }}</td>
                                            <td>{{ $contact->name}}</td>
                                            <td>{{ $contact->email}}</td>
                                            <td>{{ $contact->message}}</td>
                                            <td>{{ $contact->phone}}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ route('edit.contact', ['id' => $contact->id]) }}">
                                                            <i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="{{ route('delete.contact', ['id' => $contact->id]) }}" onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash-alt m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>

                                {{ $contacts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
