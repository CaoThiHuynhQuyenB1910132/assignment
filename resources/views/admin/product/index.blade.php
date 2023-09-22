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
                                        <li class="breadcrumb-item active">Products</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Products</h4>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <a href="{{ route('create.product') }}" class="btn btn-danger mb-2">
                                    <i class="mdi mdi-plus-circle me-2"></i> Add Products
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="datatable table table-stripped table table-hover table-center mb-0">

                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Status</th>
                                                <th>Featured</th>
                                                <th>Original Price</th>
                                                <th>Selling Price</th>
                                                <th>Stock</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($products as $key => $product)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td class="sorting_1">
                                                        @if($product->productImages->count())
                                                            <img src="{{ asset('storage/' . $product->productImages[0]->image) }}"
                                                                 alt="{{ $product->name }}" title="{{ $product->name }}"
                                                                 class="rounded me-3"
                                                                 height="48">
                                                        @endif
                                                        <p class="m-0 d-inline-block align-middle font-16">
                                                            <a href="{{ route('edit.product', ['id' => $product->id]) }}" class="text-body">{{ $product->name }}</a>
                                                        </p>
                                                    </td>

                                                    <td>
                                                        <span class="badge badge-{{ $product->status == 1 ? 'success-lighten' : 'danger-lighten' }}">{{ $product->status === 1 ? 'Nổi Bật' : 'Không Nổi Bật' }}</span>
                                                    </td>

                                                    <td>
                                                        <span class="badge badge-{{ $product->featured == 1 ? 'success-lighten' : 'primary-lighten' }}">{{ $product->featured === 1 ? 'Nổi bât' : 'Bình thường' }}</span>
                                                    </td>

                                                    <td>{{ $product->original_price }}</td>
                                                    <td>{{ $product->selling_price }}</td>

                                                    <td>
                                                        <span class="badge badge-{{ $product->stock == 1 ? 'success-lighten' : 'danger-lighten' }}">{{ $product->stock === 1 ? 'Còn hàng' : 'Hết hàng' }}</span>
                                                    </td>

                                                    <td class="table-action">
                                                        <a href="{{ route('edit.product', ['id' => $product->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="{{ route('delete.product', ['id' => $product->id]) }}" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                        {{ $products->links() }}
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
