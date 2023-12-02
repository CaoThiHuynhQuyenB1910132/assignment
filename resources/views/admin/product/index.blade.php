@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
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
                                    <div class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                        <form method="GET" action="{{ route('product') }}" class="col-auto">
                                            @csrf
                                            <label for="searchInput" class="visually-hidden">Search</label>
                                            <input type="search" class="form-control" name="searchInput" id="searchInput" placeholder="Search...">
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-stripped table table-hover table-center mb-0 mt-3">
                                            <thead class="table-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Status</th>
                                                <th>Featured</th>
                                                <th>Selling Price</th>
                                                <th>Stock</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($products as $key => $product)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        @if($product->productImages->count())
                                                            <img src="{{ asset('storage/' . $product->productImages[0]->image) }}"
                                                                 alt="{{ $product->name }}" title="{{ $product->name }}"
                                                                 class="rounded me-3"
                                                                 height="48">
                                                        @endif
                                                        <p class="m-0 d-inline-block">
                                                            <a href="{{ route('edit.product', ['id' => $product->id]) }}" class="text-body">{{ $product->name }}</a>
                                                        </p>
                                                    </td>

                                                    <td>
                                                        <span class="badge badge-{{ $product->status == 1 ? 'success-lighten' : 'danger-lighten' }}">{{ $product->status == 1 ? 'Show' : 'Hidden' }}</span>
                                                    </td>

                                                    <td>
                                                        <span class="badge badge-{{ $product->featured == 1 ? 'success-lighten' : 'primary-lighten' }}">{{ $product->featured == 1 ? 'Featured' : 'Normal' }}</span>
                                                    </td>

                                                    <td>{{ $product->selling_price }}</td>

                                                    <td>
                                                        <span class="badge badge-{{ $product->stock == 1 ? 'success-lighten' : 'danger-lighten' }}">{{ $product->stock == 1 ? 'In Stock' : 'Out Stock' }}</span>
                                                    </td>

                                                    <td class="table-action">
                                                        <a href="{{ route('edit.product', ['id' => $product->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="{{ route('delete.product', ['id' => $product->id]) }}" class="action-icon" onclick="return confirm('Are you sure?')"> <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                            @if(!$products->count()>0)
                                                <tr>
                                                    <th class="text-center" colspan="7">Product not found!</th>
                                                </tr>
                                            @endif
                                        </table>
                                        <div class="pt-3">{{ $products->links() }}</div>
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
