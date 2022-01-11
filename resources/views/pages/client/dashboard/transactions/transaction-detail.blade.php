@extends('layouts.dashboard')

@section('title')
    Transactions Detail Page
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">#{{ $transaction_details->code }}</h2>
      <p class="dashboard-subtitle">Transactions / Details</p>
    </div>
    <div class="dashboard-content" id="transactions-details">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-4">
                  <img src="{{ ($transaction_details->product->galleries->count()) ? Storage::url($transaction_details->product->galleries->first()->photo) : Storage::url('product-placeholder.png') }}" alt={{ $transaction_details->product->product_name }} class="w-100 mb-3"/>
                </div>
                <div class="col-12 col-md-8">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-title">Customer Name</div>
                      <div class="product-subtitle">{{ $transaction_details->transaction->user->name }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Product Name</div>
                      <div class="product-subtitle">
                        {{ $transaction_details->product->product_name }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Date of Transaction
                      </div>
                      <div class="product-subtitle">
                        {{ tgl_indonesia($transaction_details->created_at,true) }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Payment Status</div>
                      <div class="product-subtitle text-danger">
                        {{ $transaction_details->transactionStatus->status }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Total Amount</div>
                      <div class="product-subtitle">
                        {{ convertRupiah($transaction_details->transaction->total_price) }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Mobile</div>
                      <div class="product-subtitle">
                        {{ $transaction_details->transaction->user->phone }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <form action="{{ route('transactionUpdate', $transaction_details->id) }}" method="POST">
              @csrf
                <div class="row">
                  <div class="col-12 mt-4">
                    <h5>Shipping Information</h5>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="product-title">Address I</div>
                        <div class="product-subtitle">
                          {{ $transaction_details->transaction->user->address_one }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Address II</div>
                        <div class="product-subtitle">
                          {{ $transaction_details->transaction->user->address_two }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Province</div>
                        <div class="product-subtitle">
                          {{ App\Models\Province::find($transaction_details->transaction->user->provinces_id)->name }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">City</div>
                        <div class="product-subtitle">
                          {{ App\Models\Regency::find($transaction_details->transaction->user->regencies_id)->name }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Zip Code</div>
                        <div class="product-subtitle">
                          {{ $transaction_details->transaction->user->zip_code }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Country</div>
                        <div class="product-subtitle">
                          {{ $transaction_details->transaction->user->country }}
                        </div>
                      </div>
                      <div class="col-12 col-md-3">
                        <div class="product-title">Shipping Status</div>
                        <select name="transaction_status_id" id="transaction_status_id" class="form-control form-select" v-model="transaction_status_id">
                          <option value="1">Pending</option>
                          <option value="2">Shipping</option>
                          <option value="3">Success</option>
                        </select>
                      </div>
                      <template v-if="transaction_status_id == '2'">
                        <div class="col-md-3">
                          <div class="product-title">Input Resi</div>
                          <input type="text" name="resi" class="form-control" id="resi" v-model="resi"/>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-success mt-4">
                            Update Resi
                          </button>
                        </div>
                      </template>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success mt-4">
                      Save Now
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
    <script src="/vendor/vue/vue.js"></script>
    <script>
      let transactionDetails = new Vue({
        el: "#transactions-details",
        data: {
          transaction_status_id: "{{ $transaction_details->transaction_status_id }}",
          resi: "{{ $transaction_details->resi }}",
        },
      });
    </script>
@endpush