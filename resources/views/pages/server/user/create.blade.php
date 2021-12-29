@extends('layouts.admin')

@section('title')
    Admin - Create User Page
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create User</h2>
            <p class="dashboard-subtitle">Create New User</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('User.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama User</label>
                                            <input type="text" name="nama" class="form-control mt-2 @error('nama') is-invalid @enderror" placeholder="Nama User" value="{{ old('nama') }}" required>
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label>Email User</label>
                                            <input type="email" name="email" class="form-control mt-2 @error('email') is-invalid @enderror" placeholder="Email User" value="{{ old('email') }}" required>
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label>Password User</label>
                                            <input type="password" name="password" class="form-control mt-2 @error('password') is-invalid @enderror" placeholder="Password User" value="{{ old('password') }}" required>
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="role_id" class="form-control mt-2 @error('roles') is-invalid @enderror" required>
                                                <option disaled selected>--- Role ---</option>
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                @if (old('role_id') == $role->id)
                                                    selected
                                                @endif>
                                                    {{ $role->role }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('roles')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-end">
                                        <a href="{{ route('User.index') }}" class="btn btn-secondary px-5 mt-4">
                                            Back
                                        </a>
                                        <button type="submit" class="btn btn-success px-5 mt-4">
                                            Create
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