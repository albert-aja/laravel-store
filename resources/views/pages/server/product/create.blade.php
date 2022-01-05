@extends('layouts.admin')

@section('title')
    Admin - Create Product Page
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create Product</h2>
            <p class="dashboard-subtitle">Create New Product</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('Product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Produk</label>
                                            <input type="text" name="product_name" class="form-control mt-2 @error('product_name') is-invalid @enderror" placeholder="Nama Produk" value="{{ old('product_name') }}" required>
                                            @error('product_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label>Pemilik Produk</label>
                                            <select name="users_id" class="form-control mt-2 @error('users') is-invalid @enderror" required>
                                                <option disabled selected>--- User ---</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                @if (old('users_id') == $user->id)
                                                    selected
                                                @endif>
                                                    {{ $user->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('users')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select name="categories_id" class="form-control mt-2 @error('categories') is-invalid @enderror" required>
                                                <option disabled selected>--- Kategori ---</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                @if (old('categories_id') == $category->id)
                                                    selected
                                                @endif>
                                                    {{ $category->category }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('categories')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label>Harga Produk</label>
                                            <input type="number" name="price" class="form-control mt-2 @error('price') is-invalid @enderror" placeholder="Harga Produk" value="{{ old('price') }}" required>
                                            @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="description" id="editor" class="form-control mt-2 @error('description') is-invalid @enderror" placeholder="Deskripsi" required>{{ old('description') }}</textarea>
                                            @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-end">
                                        <a href="{{ route('Product.index') }}" class="btn btn-secondary px-5 mt-4">
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

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace("editor");
    </script>
@endpush