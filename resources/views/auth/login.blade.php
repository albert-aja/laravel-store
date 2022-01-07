@extends('layouts.auth')

@section('content')

<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-6 text-center">
                    <img src="/images/login-placeholder.png" alt="" class="w-50 mb-4 mb-lg-none"/>
                </div>
                <div class="col-lg-5">
                    <h2> Belanja kebutuhan utama,<br /> menjadi lebih mudah</h2>
                    <form action="{{ route('login') }}" method="POST" class="mt-3">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Email Address</label>
                            <input type="email" id="email" class="form-control mt-2 w-75 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Password</label>
                            <input type="password" class="form-control mt-2 w-75 @error('password') is-invalid  @enderror" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success d-block w-75 mt-4">Sign In to My Account</button>
                        <a href="{{ route('register') }}" class="btn btn-signup d-block w-75 mt-2">Sign Up</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection