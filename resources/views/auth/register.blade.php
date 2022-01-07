@extends('layouts.auth')

@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <div class="col-lg-4">
                    <h2>
                        Memulai untuk jual beli<br />
                        dengan cara terbaru
                    </h2>
                    <form class="mt-3" method="POST" action="{{ route('register') }}">
                    @csrf
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" v-model="name" name="name" value="{{ old('name') }}" required autofocus />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" v-model="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" @change="checkAvailability()" :class="{'is-invalid' : this.email_unavailable}" required/>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid  @enderror" name="password" required/>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required/>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Store</label>
                            <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="is_store_open" class="form-check-input" id="openStoreTrue" v-model="is_store_open" :value="true"/>
                                <label for="openStoreTrue" class="form-check-label">Iya, Boleh</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="is_store_open" class="form-check-input" id="openStoreFalse" v-model="is_store_open" :value="false"/>
                                <label for="openStoreFalse" class="form-check-label">Enggak, makasih</label>
                            </div>
                        </div>
                        <div class="form-group mb-3" v-if="is_store_open">
                            <label>Nama Toko</label>
                            <input type="text" name="store_name" v-model="store_name" class="form-control @error('store_name') is-invalid @enderror" required autofocus/>
                            @error('store_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3" v-if="is_store_open">
                            <label>Kategori Toko</label>
                            <select name="categories_id" class="form-control">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success d-block mt-4 w-100" :disabled="this.email_unavailable">Sign Up Now</button>
                        <a href="{{ route('api-register-check') }}" class="btn btn-signup d-block mt-2">Back to Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
        },
        methods: {
            checkAvailability: function(){
                var self = this;
                axios.get('{{ route('api-register-check') }}', {
                    params: {
                        email: this.email
                    }
                }).then(function (response) {
                    if(response.data == 'Available') {
                        self.$toasted.show(
                            "Email anda tersedia! Silahkan lanjut langkah selanjutnya!", {
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                            }
                        );
                        self.email_unavailable = false;
                    } else {
                        self.$toasted.error(
                            "Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                            }
                        );
                        self.email_unavailable = true;
                    }
                })
            }
        },
        data() {
            return {
                name: "Albert",
                email: "albert@gmail.com",
                is_store_open: true,
                store_name: "",
                email_unavailable: false,
            }
        },
      });
    </script>
@endpush