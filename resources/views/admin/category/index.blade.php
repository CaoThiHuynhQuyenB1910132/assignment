@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
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
                                    <div class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                        <form method="GET" action="{{ route('category') }}" class="col-auto">
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
                                                <th>Category Name</th>
                                                <th>Featured</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @if ($categories->count()>0)
                                            @foreach($categories as $key => $category)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        <img class="img-fluid avatar-sm" src="{{ 'storage/' . $category->image }}">
                                                            {{ $category->name }}
                                                    </td>
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
                                            @else
                                                <tr>
                                                    <th class="text-center" colspan="4">No categories have been added yet!</th>
                                                </tr>
                                            @endif
                                        </table>
                                        <div class="pt-3">{{ $categories->links() }}</div>
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
