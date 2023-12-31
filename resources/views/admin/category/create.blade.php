@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title mt-5">Add Category</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-lg-12 mb-3">
                                            <label>Category Name</label>
                                            <input class="form-control" type="text" name="name">

                                            @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label>Featured</label>
                                            <select class="form-control @error('featured') is-invalid @enderror" name="featured">
                                                <option value="">Choose a status</option>
                                                <option value="1">Featured</option>
                                                <option value="0">Normal</option>
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Add An Image</label>
                                                <div class="custom-file mb-3">
                                                    <input type="file" accept="image/*" class="custom-file-input @error('image') is-invalid @enderror" id="image"
                                                           name="image">

                                                    @error('image')
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                    <label class="custom-file-label" for="image">Choose A File</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
