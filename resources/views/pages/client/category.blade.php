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
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="100ms"
            >
              <div class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="/images/categories-gadgets.svg"
                    class="card-img-top product-image"
                    alt="..."
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Gadgets</p>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="200ms"
            >
              <div class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="/images/categories-furniture.svg"
                    class="card-img-top product-image"
                    alt="..."
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Furniture</p>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="300ms"
            >
              <div class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="/images/categories-makeup.svg"
                    class="card-img-top product-image"
                    alt="..."
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Make Up</p>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="400ms"
            >
              <div class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="/images/categories-sneaker.svg"
                    class="card-img-top product-image"
                    alt="..."
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Sneaker</p>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="500ms"
            >
              <div class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="/images/categories-tools.svg"
                    class="card-img-top product-image"
                    alt="..."
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Tools</p>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="600ms"
            >
              <div class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="/images/categories-baby.svg"
                    class="card-img-top product-image"
                    alt="..."
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Baby</p>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>
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
            <div
              class="col-6 col-md-4 col-lg-3 card product-thumbnail"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card-img">
                  <img
                    class="card-img-top product-image"
                    src="/images/products-apple-watch.jpg"
                    alt=""
                  />
                </div>
                <div class="card-body">
                  <div class="card-title product-desc">Apple Watch 4</div>
                  <div class="card-text product-price">$990</div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3 card product-thumbnail"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card-img">
                  <img
                    class="card-img-top product-image"
                    src="/images/products-black-edition-nike.jpg"
                    alt=""
                  />
                </div>
                <div class="card-body">
                  <div class="card-title product-desc">Black Edition Nike</div>
                  <div class="card-text product-price">$11,790</div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3 card product-thumbnail"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card-img">
                  <img
                    class="card-img-top product-image"
                    src="/images/products-bubuk-maketti.jpg"
                    alt=""
                  />
                </div>
                <div class="card-body">
                  <div class="card-title product-desc">Bubuk Maketti</div>
                  <div class="card-text product-price">$490</div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3 card product-thumbnail"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card-img">
                  <img
                    class="card-img-top product-image"
                    src="/images/products-mavic-kawe.jpg"
                    alt=""
                  />
                </div>
                <div class="card-body">
                  <div class="card-title product-desc">Mavic Kawe</div>
                  <div class="card-text product-price">$840</div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3 card product-thumbnail"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card-img">
                  <img
                    class="card-img-top product-image"
                    src="/images/products-monkey-toys.jpg"
                    alt=""
                  />
                </div>
                <div class="card-body">
                  <div class="card-title product-desc">Monkey Toys</div>
                  <div class="card-text product-price">$90</div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3 card product-thumbnail"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card-img">
                  <img
                    class="card-img-top product-image"
                    src="/images/products-orange-bogotta.jpg"
                    alt=""
                  />
                </div>
                <div class="card-body">
                  <div class="card-title product-desc">Orange Bogotta</div>
                  <div class="card-text product-price">$1,090</div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3 card product-thumbnail"
              data-aos="fade-up"
              data-aos-delay="700"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card-img">
                  <img
                    class="card-img-top product-image"
                    src="/images/products-sofa-ternyaman.jpg"
                    alt=""
                  />
                </div>
                <div class="card-body">
                  <div class="card-title product-desc">Sofa Ternyaman</div>
                  <div class="card-text product-price">$1,890</div>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3 card product-thumbnail"
              data-aos="fade-up"
              data-aos-delay="800"
            >
              <a href="/details.html" class="component-products d-block">
                <div class="card-img">
                  <img
                    class="card-img-top product-image"
                    src="/images/products-tatakan-gelas.jpg"
                    alt=""
                  />
                </div>
                <div class="card-body">
                  <div class="card-title product-desc">Tatakan Gelas</div>
                  <div class="card-text product-price">$890</div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection