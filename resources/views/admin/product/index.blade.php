@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Tất cả sản phẩm</h4>
                            <a href="{{ route('create.product') }}" class="btn btn-primary float-right view button ">Thêm sản phẩm</a>
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
                                        <th>Tên Sản Phẩm</th>
                                        <th>Mô Tả</th>
                                        <th>Trạng Thái</th>
                                        <th>Nổi Bật</th>
                                        <th>Giá Gốc</th>
                                        <th>Giá Giảm</th>
                                        <th>Stock</th>
                                        <th>Danh Mục</th>
                                        <th class="text-right">Công Cụ</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>

                                            <td>{{ $product->name }}</td>

                                            <td>{{ $product->description }}</td>

                                            @if($product->status === 1)
                                                <td><span class="badge badge-success">Hiển thị</span></td>
                                            @else
                                                <td><span span class="badge badge-danger">Không hiển thị</span></td>
                                            @endif

                                            @if($product->featured === 1)
                                                <td><span class="badge badge-success">Nổi bật</span></td>
                                            @else
                                                <td><span span class="badge badge-danger">Không nổi bật</span></td>
                                            @endif

                                            <td>{{ $product->original_price }}</td>
                                            <td>{{ $product->selling_price }}</td>

                                            @if($product->stock === 1)
                                                <td><span class="badge badge-success">in-stock</span></td>
                                            @else
                                                <td><span span class="badge badge-danger">out-stock</span></td>
                                            @endif

                                            <td>{{ $product->category->name }}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ route('edit.product', ['id' => $product->id]) }}">
                                                            <i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="{{ route('delete.product', ['id' => $product->id]) }}" onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash-alt m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>

                                {{--                                {{ $services->links() }}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
