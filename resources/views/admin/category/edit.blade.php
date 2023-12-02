@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title mt-5">Update Category</h3>
                            <h4 class="page-title">Category: {{ $category->name }}</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('update.category',['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-lg-12 mb-3">
                                                    <label>Category Name</label>
                                                    <input class="mb-3 form-control" type="text" name="name"  value="{{ $category->name }}">

                                                    @error('name')
                                                    <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <label>Featured</label>
                                                    <select class="mb-3 form-control @error('featured') is-invalid @enderror" name="featured">
                                                        <option value="">Choose a status</option>
                                                        <option value="1" {{ $category->featured == '1' ? 'selected' : '' }}>Featured</option>
                                                        <option value="0" {{ $category->featured == '0' ? 'selected' : '' }}>Normal</option>
                                                    </select>

                                                    @error('featured')
                                                    <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-8 mb-4">
                                                        <div class="form-group">
                                                            <label>Image Category</label>
                                                            <div class="custom-file mb-4">
                                                                <input type="file" accept="image/*" class="mb-3 custom-file-input @error('image') is-invalid @enderror" id="image"
                                                                       name="image">

                                                                @error('image')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <img class="avatar-xl .rounded-circle" src="{{ asset('storage/' . $category->image) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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
