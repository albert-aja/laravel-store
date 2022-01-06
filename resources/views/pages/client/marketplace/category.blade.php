@extends('layouts.app')

@section('title')
    Store Category Page
@endsection

@section('content')
    <div class="page-content page-home">
      <section class="store-trend-categories mt-4">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Categories</h5>
            </div>
          </div>
          <div class="row">
            @forelse ($categories as $category)
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $loop->iteration }}00">
              <div class="component-categories d-block">
                <div class="categories-image">
                  <img src="{{ Storage::url($category->photo) }}" alt="{{ $category->category }}" class="card-img-top product-image" class="w-100"/>
                </div>
                <p class="categories-text">{{ $category->category }}</p>
                <a href="{{ route('category-detail', $category->slug) }}" class="stretched-link"></a>
              </div>
            </div>
            @empty
              <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">No Categories Found</div>
            @endforelse
          </div>
        </div>
      </section>
      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Products</h5>
            </div>
          </div>
            <div class="row">
              @forelse ($products as $product)
              <div class="col-6 col-md-4 col-lg-3 product-thumbnail" data-aos="fade-up" data-aos-delay="{{ $loop->iteration }}00"">
                <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                  <div class="card-img">
                    <img class="card-img-top product-image" alt="{{ $product->product_name }}" 
                      src="{{ ($product->galleries->count()) ? Storage::url($product->galleries->first()->photo) : Storage::url('product-placeholder.png') }}"/>
                  </div>
                  <div class="card-body">
                    <div class="card-title product-desc">{{ $product->product_name }}</div>
                    <div class="card-text product-price">{{ convertRupiah($product->price) }}</div>
                  </div>
                </a>
              </div>
              @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">No Products Found</div>
              @endforelse
            </div>
            <div class="row col-12 mt-4">
              {{ $products->links() }}
            </div>
        </div>
      </section>
    </div>
@endsection