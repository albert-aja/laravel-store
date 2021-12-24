@extends('layouts.dashboard')

@section('title')
    Dashboard Setting Page
@endsection

@section('content')
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Store Settings</h2>
                <p class="dashboard-subtitle">Make store that profitable</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Nama Toko</label>
                                <input type="text" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Kategori Toko</label>
                                <select
                                  name="category"
                                  class="form-control form-select"
                                >
                                  <option value="" disabled>
                                    Select Category
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 mt-3">
                              <div class="form-group">
                                <label>Store Status</label>
                                <p class="text-muted">
                                  Apakah saat ini toko Anda buka?
                                </p>
                                <div class="form-check form-check-inline">
                                  <input
                                    type="radio"
                                    name="is_store-open"
                                    class="form-check-input"
                                    id="openStoreTrue"
                                  />
                                  <label
                                    for="openStoreTrue"
                                    class="form-check-label"
                                    >Buka</label
                                  >
                                </div>
                                <div class="form-check form-check-inline">
                                  <input
                                    type="radio"
                                    name="is_store-open"
                                    class="form-check-input"
                                    id="openStoreFalse"
                                  />
                                  <label
                                    for="openStoreFalse"
                                    class="form-check-label"
                                    >Sementara Tutup</label
                                  >
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col text-end">
                                <button class="btn btn-success" type="submit">
                                  Save Now
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