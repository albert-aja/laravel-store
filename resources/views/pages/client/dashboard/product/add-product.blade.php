@extends('layouts.dashboard')

@section('title')
    Add Product Page
@endsection

@section('content')<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Create New Product</h2>
                <p class="dashboard-subtitle">Create your own product</p>
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
                                <label>Product Name</label>
                                <input type="text" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-12 mt-3">
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
                            <div class="col-md-12 mt-3">
                              <div class="form-group">
                                <label>Description</label>
                                <textarea
                                  name="editor"
                                  id=""
                                  cols="30"
                                  rows="10"
                                ></textarea>
                              </div>
                            </div>
                            <div class="col-md-12 mt-3">
                              <div class="form-group">
                                <label>Thumbnails</label>
                                <input type="file" class="form-control" />
                                <p class="text-muted">
                                  Anda dapat memilih lebih dari 1 foto
                                </p>
                              </div>
                            </div>

                            <div class="row mt-4">
                              <div class="col">
                                <button
                                  class="btn btn-success w-100"
                                  type="submit"
                                >
                                  Create Product
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
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Shirup Marzzan</h2>
                <p class="dashboard-subtitle">Product Details</p>
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
                                <label>Product Name</label>
                                <input type="text" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-12 mt-3">
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
                            <div class="col-md-12 mt-3">
                              <div class="form-group">
                                <label>Description</label>
                                <textarea
                                  name="editor"
                                  id=""
                                  cols="30"
                                  rows="10"
                                ></textarea>
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col">
                                <button
                                  class="btn btn-success w-100"
                                  type="submit"
                                >
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
                          <div class="col-md-4 sticky-top">
                            <div class="gallery-container">
                              <img
                                src="/images/product-card-1.png"
                                class="w-100"
                              />
                              <a href="#" class="delete-gallery">
                                <img src="/images/icon-delete.svg" alt=""
                              /></a>
                            </div>
                          </div>
                          <div class="col-md-4 sticky-top">
                            <div class="gallery-container">
                              <img
                                src="/images/product-card-2.png"
                                class="w-100"
                              />
                              <a href="#" class="delete-gallery">
                                <img src="/images/icon-delete.svg" alt=""
                              /></a>
                            </div>
                          </div>
                          <div class="col-md-4 sticky-top">
                            <div class="gallery-container">
                              <img
                                src="/images/product-card-3.png"
                                class="w-100"
                              />
                              <a href="#" class="delete-gallery">
                                <img src="/images/icon-delete.svg" alt=""
                              /></a>
                            </div>
                          </div>
                          <div class="col-12">
                            <input
                              type="file"
                              id="file"
                              class="d-none"
                              multiple
                            />
                            <button
                              class="btn btn-secondary w-100 mt-3"
                              onclick="fileUpload()"
                            >
                              Add Photo
                            </button>
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
      CKEDITOR.replace("editor");
    </script>
@endpush