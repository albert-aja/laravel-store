@extends('layouts.admin')

@section('title')
    Admin - Product Page
@endsection

@push('addon-style')
<style>
    .dataTables_filter,
    .dataTables_paginate {
        float: right !important;
    }
</style>
@endpush

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Product</h2>
            <p class="dashboard-subtitle">List of Products</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('Product.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Produk</th>
                                            <th>Slug</th>
                                            <th>Pemilik</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
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
    <script>
        let dataTable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    orderable: false, 
                    searchable: false
                },
                {data: 'product_name', name: 'product_name'},
                {data: 'slug', name: 'slug'},
                {data: 'user.name', name: 'user.name'},
                {data: 'category.category', name: 'category.category'},
                {data: 'price', name: 'price'},
                {data: 'description', name: 'description'},
                {
                    data: 'action', 
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush