@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Hình Ảnh Sản Phẩm</h4>
                            <a href="{{ route('create.product-image') }}" class="btn btn-primary float-right view button ">Thêm Hình Ảnh</a>
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
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($product_images as $product_image)
                                        <tr>
                                            <td>{{ $product_image->id }}</td>
                                            <td><img class="img-fluid avatar-sm" src="{{ 'storage/' . $product_image->image }}"></td>
                                            <td>{{ $product_image->product->name}}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ route('edit.product-image', ['id' => $product_image->id]) }}">
                                                            <i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="{{ route('delete.product-image', ['id' => $product_image->id]) }}" onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash-alt m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>

                                {{ $product_images->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
