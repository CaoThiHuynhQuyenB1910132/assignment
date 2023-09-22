@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title mt-5">Update Category</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('update.category',['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-lg-6 mb-3">
                                                <label>Category Name</label>
                                                <input class="form-control" type="text" name="name"  value="{{ $category->name }}">

                                                @error('name')
                                                <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label>Featured</label>
                                                <select class="form-control @error('featured') is-invalid @enderror" name="featured">
                                                    <option value="">Choose a status</option>
                                                    <option value="1" {{ $category->featured == '1' ? 'selected' : '' }}>Nổi Bật</option>
                                                    <option value="0" {{ $category->featured == '0' ? 'selected' : '' }}>Không Nổi Bật</option>
                                                </select>

                                                @error('featured')
                                                <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-center">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
