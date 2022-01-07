@extends('layouts.app')

@section('title')
    Store Product Detail Page
@endsection

@section('content')

    <div class="page-content page-details">
      <section
        class="store-breadcrumb"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Product Details</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-gallery" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <img
                  :src="photo[activePhoto].url"
                  :key="photo[activePhoto].id"
                  class="w-100 main-image"
                />
              </transition>
            </div>
            <div class="col-lg-2">
              <div class="row">
                <div
                  class="col-3 col-lg-12 mt-lg-0 mt-2"
                  v-for="(photo, index) in photo"
                  :key="photo.id"
                  data-aos="zoom-in"
                  data-aos-delay="100"
                >
                  <a href="#" @click="changeActive(index)">
                    <img
                      :src="photo.url"
                      class="w-100 thumbnail-image"
                      :class="{active:index == activePhoto}"
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="store-detail-container" data-aos="fade-up">
        <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <h1>{{ $product->product_name }}</h1>
                <div class="owner">By {{ $product->user->store_name }}</div>
                <div class="price">{{ convertRupiah($product->price) }}</div>
              </div>
              <div class="col-lg-2" data-aos="zoom-in">
                @auth
                <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <button class="btn btn-success px-4 text-white btn-block mb-3">Add to Cart</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-3">Sign In to Add</a>
                @endauth
              </div>
            </div>
          </div>
        </section>

        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                {!! $product->description !!}
              </div>
            </div>
          </div>
        </section>

        <section class="store-review">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mb-2">
                <h5>Customer Review (3)</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-8">
                <ul class="list-unstyled">
                  <li class="d-flex">
                    <div class="flex-shrink-0 review-profile">
                      <img
                        src="/images/icons-testimonial-1.png"
                        alt=""
                        class="me-3 rounded-circle"
                      />
                    </div>
                    <div class="flex-grow-1 ms-3 review">
                      <h5 class="mt-2 mb-1">Hazza Rizky</h5>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Maxime consequatur tempore, ipsam perferendis fuga qui
                      repellat necessitatibus praesentium in commodi.
                    </div>
                  </li>
                  <li class="d-flex">
                    <div class="flex-shrink-0 review-profile">
                      <img
                        src="/images/icons-testimonial-2.png"
                        alt=""
                        class="me-3 rounded-circle"
                      />
                    </div>
                    <div class="flex-grow-1 ms-3 review">
                      <h5 class="mt-2 mb-1">Budi Dibu</h5>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Maxime consequatur tempore, ipsam perferendis fuga qui
                      repellat necessitatibus praesentium in commodi.
                    </div>
                  </li>
                  <li class="d-flex">
                    <div class="flex-shrink-0 review-profile">
                      <img
                        src="/images/icons-testimonial-3.png"
                        alt=""
                        class="me-3 rounded-circle"
                      />
                    </div>
                    <div class="flex-grow-1 ms-3 review">
                      <h5 class="mt-2 mb-1">Andi Sandi</h5>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Maxime consequatur tempore, ipsam perferendis fuga qui
                      repellat necessitatibus praesentium in commodi.
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      let Gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photo: [
            @foreach ($product->galleries as $photo)
            {
              id: {{ $photo->id }},
              url: "{{ Storage::url($photo->photo) }}",
            },
            @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush