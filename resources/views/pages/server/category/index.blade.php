@extends('layouts.admin')

@section('title')
    Admin - Category Page
@endsection

@push('addon-style')
<style>
    .admin-logo {
        width: 120px;
    }

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
            <h2 class="dashboard-title">Category</h2>
            <p class="dashboard-subtitle">List of Categoies</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('Category.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kategori</th>
                                            <th>Foto</th>
                                            <th>Slug</th>
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
                {data: 'category', name: 'category'},
                {data: 'photo', name: 'photo'},
                {data: 'slug', name: 'slug'},
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