@extends('layouts.admin')

@section('title')
    Admin - Create Category Page
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create Category</h2>
            <p class="dashboard-subtitle">Create New Category</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('Category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Kategori</label>
                                            <input type="text" name="category" class="form-control mt-2 @error('category') is-invalid @enderror" placeholder="Nama Kategori" value="{{ old('category') }}" required>
                                            @error('category')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="photo" class="form-control mt-2 @error('photo') is-invalid @enderror" required>
                                            @error('photo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-end">
                                        <a href="{{ route('Category.index') }}" class="btn btn-secondary px-5 mt-4">
                                            Back
                                        </a>
                                        <button type="submit" class="btn btn-success px-5 mt-4">
                                            Create
                                        </button>
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