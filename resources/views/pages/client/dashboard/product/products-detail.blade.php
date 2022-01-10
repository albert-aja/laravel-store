@extends('layouts.dashboard')

@section('title')
    Product Details Page
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">{{ $product->product_name }}</h2>
      <p class="dashboard-subtitle">Product Details</p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('productUpdate', $product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="users_id" value={{ Auth::user()->id }}>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" placeholder="Nama Produk" value="{{ old('product_name', $product->product_name) }}" required autofocus/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Price</label>
                      <input type="number" name="price" class="form-control @error('product_name') is-invalid @enderror" placeholder="Harga Produk" value="{{ old('price', $product->price) }}" required/>
                    </div>
                  </div>
                  <div class="col-md-12 mt-3">
                    <div class="form-group">
                      <label>Kategori</label>
                      <select name="categories_id" class="form-control form-select mt-2 @error('categories') is-invalid @enderror" required>
                        <option value="" selected disabled>--- Select Category ---</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          @if (old('categories_id', $product->category->id) == $category->id)
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
                      <label>Deskripsi</label>
                        <textarea name="description" id="editor" class="form-control mt-2 @error('description') is-invalid @enderror" placeholder="Deskripsi" required>{!! old('description', $product->description) !!}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col">
                      <button class="btn btn-success w-100" type="submit">
                        Update Product
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                @foreach ($product->galleries as $photo)
                <div class="col-md-4 sticky-top">
                  <div class="gallery-container">
                    <img src="{{ Storage::url($photo->photo) }}" alt="{{ $product->product_name }}" class="w-100"/>
                    <a href="{{ route('delete-product-image', $photo->id) }}" class="delete-gallery">
                      <img src="/images/icon-delete.svg"/>
                    </a>
                  </div>
                </div>
                @endforeach
                <div class="col-12">
                  <form action="{{ route('upload-product-image') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <input type="hidden" name="products_id" value="{{ $product->id }}">
                    <input type="file" id="file" name="photo" class="d-none" onchange="form.submit()"/>
                    <button type="button" class="btn btn-secondary w-100 mt-3" onclick="fileUpload()">
                      Add Photo
                    </button>
                  </form>
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

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
      function fileUpload() {
        document.getElementById("file").click();
      }
    </script>
    <script>
      CKEDITOR.replace("editor");
    </script>
@endpush