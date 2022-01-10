@extends('layouts.dashboard')

@section('title')
    Transactions Page
@endsection

@section('content')

<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Transactions</h2>
      <p class="dashboard-subtitle">
        Big result start from the small one
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row mt-3">
        <div class="col-12 mt-2">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                Sell Product
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                Buy Product
              </button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              @foreach ($sellTransaction as $st)
              <a href="{{ route('transactionDetail', $st->id) }}" class="card card-list d-block">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="{{ ($st->product->galleries->count()) ? Storage::url($st->product->galleries->first()->photo) : Storage::url('product-placeholder.png') }}" class="w-75"/>
                    </div>
                    <div class="col-md-4">{{ $st->product->product_name }}</div>
                    <div class="col-md-3">{{ $st->transaction->user->name }}</div>
                    <div class="col-md-3">{{ tgl_indonesia($st->created_at,true) }}</div>
                    <div class="col-md-1 d-none d-md-block">
                      <img src="/images/dashboard-arrow-right.svg"/>
                    </div>
                  </div>
                </div>
              </a>
              @endforeach
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              @foreach ($buyTransaction as $bt)
              <a href="{{ route('transactionDetail', $bt->id) }}" class="card card-list d-block">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="{{ ($bt->product->galleries->count()) ? Storage::url($bt->product->galleries->first()->photo) : Storage::url('product-placeholder.png') }}" class="w-75"/>
                    </div>
                    <div class="col-md-4">{{ $bt->product->product_name }}</div>
                    <div class="col-md-3">{{ $bt->transaction->user->name }}</div>
                    <div class="col-md-3">{{ tgl_indonesia($bt->created_at,true) }}</div>
                    <div class="col-md-1 d-none d-md-block">
                      <img src="/images/dashboard-arrow-right.svg"/>
                    </div>
                  </div>
                </div>
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection