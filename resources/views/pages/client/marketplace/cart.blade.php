@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <div class="page-content page-cart">
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
                  <li class="breadcrumb-item active">Cart</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart">
              <thead>
                <tr>
                  <td>Image</td>
                  <td>Name &amp; Seller</td>
                  <td>Price</td>
                  <td>Menu</td>
                </tr>
              </thead>
              <tbody>
              @if (count($carts))
                @php $total_price = 0 @endphp
                @foreach ($carts as $cart)
                <tr>
                  <td style="width: 20%">
                    <img
                      src="{{ ($cart->product->galleries->count()) ? Storage::url($cart->product->galleries->first()->photo) : Storage::url('product-placeholder.png') }}"
                      alt="{{ $cart->product->product_name }}"
                      class="cart-image"
                    />
                  </td>
                  <td style="width: 35%">
                    <div class="product-title">{{ $cart->product->product_name }}</div>
                    <div class="product-subtitle">by {{ $cart->user->store_name }}</div>
                  </td>
                  <td style="width: 35%">
                    <div class="product-title">{{ convertRupiah($cart->product->price) }}</div>
                    <div class="product-subtitle">IDR</div>
                  </td>
                  <td style="width: 20%">
                    <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                      <button type="submit" class="btn btn-remove-cart">
                        Remove
                      </button>
                    </form>
                  </td>
                </tr>
                @php $total_price += $cart->product->price @endphp
                @endforeach
                @else
                <tr>
                  <td>
                    <h2>Cart Empty</h2>
                  </td>
                </tr>
                @endif
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Shipping Details</h2>
            </div>
          </div>
          <form action="{{ route('checkout') }}" method="POST" id="formWithLocation">
          @csrf
            <input type="hidden" name="total_price" value="{{ $total_price }}">
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_one">Address 1</label>
                  <input type="text" name="address_one" class="form-control mt-2" id="address_one"/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_two">Address 2</label>
                  <input type="text" name="address_two" class="form-control mt-2" id="address_two"/>
                </div>
              </div>
              <div class="col-md-4 mt-3">
                <div class="form-group">
                  <label for="provinces_id">Province</label>
                  <select name="provinces_id" id="provinces_id" class="form-control mt-2 form-select" v-if="provinces" v-model="provinces_id">
                    <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                  </select>
                  <select v-else class="form-control mt-2 form-select"></select>
                </div>
              </div>
              <div class="col-md-4 mt-3">
                <div class="form-group">
                  <label for="regency_id">City</label>
                  <select name="regencies_id" id="regencies_id" class="form-control mt-2 form-select" v-if="regencies" v-model="regencies_id">
                    <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                  </select>
                  <select v-else class="form-control mt-2 form-select"></select>
                </div>
              </div>
              <div class="col-md-4 mt-3">
                <div class="form-group">
                  <label for="zip_code">Postal Code</label>
                  <input type="text" name="zip_code" class="form-control mt-2" id="zip_code"/>
                </div>
              </div>
              <div class="col-md-6 mt-3">
                <div class="form-group">
                  <label for="country">Country</label>
                  <input type="text"name="country" class="form-control mt-2" id="country"/>
                </div>
              </div>
              <div class="col-md-6 mt-3">
                <div class="form-group">
                  <label for="phone">Mobile</label>
                  <input type="text" name="phone" class="form-control mt-2" id="phone"/>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12">
                <hr />
              </div>
              <div class="col-12">
                <h2 class="mb-2">Payment Details</h2>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
              <div class="col-4 col-md-2">
                <div class="product-title">$0</div>
                <div class="product-subtitle">Country Tax</div>
              </div>
              <div class="col-4 col-md-3">
                <div class="product-title">$0</div>
                <div class="product-subtitle">Product Insurance</div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title">$0</div>
                <div class="product-subtitle">Ship to Jakarta</div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title text-success">{{ convertRupiah($total_price ?? 0) }}</div>
                <div class="product-subtitle">Total</div>
              </div>
              <div class="col-8 col-md-3">
                <button type="submit" class="btn btn-success mt-4 px-4 d-block">
                  Checkout Now
                </button>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      let Gallery = new Vue({
        el: "#formWithLocation",
        mounted() {
          AOS.init();
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          provinces_id: null,
          regencies_id: null,
        },
        methods: {
          getProvincesData(){
            var self = this;
            axios.get('{{ route('api-provinces') }}')
            .then(function (response) {
              self.provinces = response.data
            })
          },
          getRegenciesData(){
            var self = this;
            axios.get('{{ url('api/regencies') }}' + '/' + self.provinces_id)
            .then(function (response) {
              self.regencies = response.data
            })
          },
        },
        watch: {
          provinces_id: function(val,oldVal){
            this.regencies_id = null;
            this.getRegenciesData();
          }
        }
      });
    </script>
@endpush