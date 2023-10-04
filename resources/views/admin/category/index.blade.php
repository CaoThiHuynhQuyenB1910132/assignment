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
                                        <li class="breadcrumb-item active">Categories</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Categories</h4>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <a href="{{ route('create.category') }}" class="btn btn-danger mb-2">
                                    <i class="mdi mdi-plus-circle me-2"></i> Add Categories
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
                                                <th>Category Name</th>
                                                <th>Featured</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($categories as $key => $category)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $category->name }}</td>

                                                    <td>
                                                        <span class="badge badge-{{ $category->featured == 1 ? 'danger-lighten' : 'primary-lighten' }}">{{ $category->featured === 1 ? 'Nổi bât' : 'Bình thường' }}</span>
                                                    </td>

                                                    <td class="table-action">
                                                        <a href="{{ route('edit.category', ['id' => $category->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="{{ route('delete.category', ['id' => $category->id]) }}" class="action-icon" onclick="return confirm('Are you sure?')"> <i class="mdi mdi-delete"></i></a>
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
        </div>
    </div>
@endsection
