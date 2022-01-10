@extends('layouts.dashboard')

@section('title')
    Dashboard Account Page
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">My Account</h2>
      <p class="dashboard-subtitle">Update your current profile</p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('account-redirect', 'account-setting') }}" method="POST" id="formWithLocation">
          @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <label for="name">Your Name</label>
                      <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}"/>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <label for="email">Your Email</label>
                      <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}"/>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <label for="address_one">Address 1</label>
                      <input type="text" name="address_one" class="form-control" id="addressOne" value="{{ $user->address_one }}"/>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <label for="address_two">Address 2</label>
                      <input type="text" name="address_two" class="form-control" id="addressTwo" value="{{ $user->address_two }}"/>
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
                      <label for="zip_code">Zip Code</label>
                      <input type="text" name="zip_code" class="form-control" id="zip_code" value="{{ $user->zip_code }}"/>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <label for="country">Country</label>
                      <input type="text" name="country" class="form-control" id="country" value="{{ $user->country }}"/>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}"/>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col text-end">
                    <button class="btn btn-success" type="submit">
                      Save Now
                    </button>
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