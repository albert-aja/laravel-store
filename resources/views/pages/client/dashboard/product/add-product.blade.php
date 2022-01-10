@extends('layouts.dashboard')

@section('title')
    Add Product Page
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Create New Product</h2>
      <p class="dashboard-subtitle">Create your own product</p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" name="product_name" class="form-control mt-2 @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" placeholder="Nama Produk" required autofocus/>
                      @error('product_name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Price</label>
                      <input type="number" name="price" class="form-control mt-2 @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Harga Produk" required/>
                      @error('price')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12 mt-3">
                    <div class="form-group">
                      <label>Kategori Produk</label>
                      <select name="categories_id" class="form-control mt-2 form-select @error('categories_id') is-invalid @enderror" required>
                        <option value="" selected disabled>--- Select Category ---</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          @if (old('categories') == $category->id)
                            selected
                          @endif>
                            {{ $category->category }}
                          </option>
                        @endforeach
                      </select>
                      @error('categories_id')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12 mt-3">
                    <div class="form-group">
                      <label class="mb-2">Description</label>
                      <textarea id="editor" name="description" cols="30" rows="10" required>{{ old('description') }}</textarea>
                      @error('description')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12 mt-3">
                    <div class="form-group">
                      <label>Thumbnails</label>
                      <input type="file" name="photo[]" class="form-control mt-2 @error('photo') is-invalid @enderror" multiple/>
                      @error('photo')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                      <p class="text-muted mt-1">
                        Anda dapat memilih lebih dari 1 foto
                      </p>
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col">
                      <button class="btn btn-success w-100" type="submit">
                        Create Product
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
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