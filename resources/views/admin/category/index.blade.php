@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Danh Mục Sản Phẩm</h4>
                            <a href="{{ route('create.category') }}" class="btn btn-primary float-right view button ">Thêm Danh Mục</a>
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
                                        <th>Tên Danh Mục</th>
                                        <th>Hình Ảnh</th>
                                        <th>Nổi Bật</th>
                                        <th class="text-right">Công Cụ</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td><img class="img-fluid avatar-sm" src="{{ 'storage/' . $category->image }}"></td>

                                            @if($category->featured === 1)
                                                <td><span class="badge badge-success">Nổi bật</span></td>
                                            @else
                                                <td><span class="badge badge-danger">Không nổi bật</span></td>
                                            @endif

                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{route('edit.category', ['id' => $category->id])}}">
                                                            <i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="{{route('delete.category', ['id' => $category->id])}}" onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash-alt m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
