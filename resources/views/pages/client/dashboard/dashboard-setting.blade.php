@extends('layouts.dashboard')

@section('title')
    Dashboard Setting Page
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Store Settings</h2>
      <p class="dashboard-subtitle">Make store that profitable</p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('account-redirect', 'store-setting') }}" method="POST">
          @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Toko</label>
                      <input type="text" class="form-control mt-2" name="store_name" value={{ $user->store_name }}/>
                      @error('store_name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Toko</label>
                      <select name="categories_id" class="form-control mt-2 form-select @error('categories_id') is-invalid @enderror" required>
                        <option value="" selected disabled>--- Select Category ---</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          @if (old('categories_id', $user->categories_id) == $category->id)
                            selected
                          @endif>
                            {{ $category->category }}
                          </option>
                        @endforeach
                      </select>
                      @error('categories_id')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <label>Store Status</label>
                      <p class="text-muted">
                        Apakah saat ini toko Anda buka?
                      </p>
                      <div class="form-check form-check-inline">
                        <input type="radio" name="store_status" class="form-check-input" id="openStoreTrue" value="1" {{ ($user->store_status) ? 'checked' : '' }}/>
                        <label for="openStoreTrue" class="form-check-label">Buka</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="radio" name="store_status" class="form-check-input" id="openStoreFalse" value="2" {{ ($user->store_status == 0 || $user->store_status == NULL) ? 'checked' : '' }}/>
                      <label for="openStoreFalse" class="form-check-label">Sementara Tutup</label>
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