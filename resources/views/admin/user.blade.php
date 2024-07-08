@extends('admin.template.main')

@section('title', 'Data User - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Data User</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">User</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <button type="button" class="btn btn-sm fw-bold btn-secondary" id="bt-download">
                        Download Excel
                    </button>
                    <button type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">
                        Tambah User
                    </button>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body">
                                <ul class="nav nav-pills nav-pills-custom mb-3">
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2 active"
                                            data-bs-toggle="pill" href="#kt_stats_widget_6_tab_1">
                                            <div class="nav-icon mb-3">
                                                <i class="ki-duotone ki-people fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </div>
                                            <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Pasien</span>
                                            <span
                                                class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2"
                                            data-bs-toggle="pill" href="#kt_stats_widget_6_tab_2">
                                            <div class="nav-icon mb-3">
                                                <i class="ki-duotone ki-syringe fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </div>
                                            <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Dokter</span>
                                            <span
                                                class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2"
                                            data-bs-toggle="pill" href="#kt_stats_widget_6_tab_3">
                                            <div class="nav-icon mb-3">
                                                <i class="ki-duotone ki-brifecase-timer fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                    <span class="path7"></span>
                                                </i>
                                            </div>
                                            <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Admin</span>
                                            <span
                                                class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="kt_stats_widget_6_tab_1">
                                        <div class="table-responsive">
                                            <table id="TabelUserPasien"
                                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                                style="width: 100%">
                                                <thead class="thead-dark">
                                                    <tr class="fw-bold text-muted">
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama</th>
                                                        <th>Status</th>
                                                        <th>Role</th>
                                                        <th>Divisi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_stats_widget_6_tab_2">
                                        <div class="table-responsive">
                                            <table id="TabelUserDokter"
                                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                                style="width: 100%">
                                                <thead class="thead-dark">
                                                    <tr class="fw-bold text-muted">
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama</th>
                                                        <th>Status</th>
                                                        <th>Role</th>
                                                        <th>Divisi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_stats_widget_6_tab_3">
                                        <div class="table-responsive">
                                            <table id="TabelUserAdmin"
                                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                                style="width: 100%">
                                                <thead class="thead-dark">
                                                    <tr class="fw-bold text-muted">
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama</th>
                                                        <th>Status</th>
                                                        <th>Role</th>
                                                        <th>Divisi</th>
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
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Yajra DataTable User 3 Role
        function initializeDataTable(selector, ajaxUrl) {
            return $(selector).DataTable({
                processing: true,
                serverSide: true,
                ajax: ajaxUrl,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'nip',
                        name: 'nip',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'role',
                        name: 'role',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'divisi_nama',
                        name: 'divisi_nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetail()" class="btn btn-icon btn-bg-light btn-active-color-info btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-note-2 fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="modalEdit()" class="btn btn-icon btn-bg-light btn-active-color-primary btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                    <i class="ki-duotone ki-pencil fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="deleteData()" class="btn btn-icon btn-bg-light btn-active-color-danger btn-xl">
                                    <i class="ki-duotone ki-trash fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                </a>
                            </div>`;
                        }
                    }
                ],
                aLengthMenu: [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                iDisplayLength: 10,
                responsive: true,
            });
        }

        $(document).ready(function() {
            var tabelPasien = initializeDataTable('#TabelUserPasien', "{{ route('admin-datauser-pasien') }}");
            var tabelDokter = initializeDataTable('#TabelUserDokter', "{{ route('admin-datauser-dokter') }}");
            var tabelAdmin = initializeDataTable('#TabelUserAdmin', "{{ route('admin-datauser-admin') }}");

            $(window).resize(function() {
                tabelPasien.columns.adjust().responsive.recalc();
                tabelDokter.columns.adjust().responsive.recalc();
                tabelAdmin.columns.adjust().responsive.recalc();
            });
        });
    </script>
@endpush

@push('style')
    <style>
        #TabelUserAdmin td,
        #TabelUserAdmin th,
        #TabelUserDokter td,
        #TabelUserDokter th,
        #TabelUserPasien td,
        #TabelUserPasien th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelUserAdmin thead th:first-child,
        #TabelUserDokter thead th:first-child,
        #TabelUserPasien thead th:first-child {
            cursor: default;
        }

        #TabelUserAdmin thead th:first-child::after,
        #TabelUserAdmin thead th:first-child::before,
        #TabelUserDokter thead th:first-child::after,
        #TabelUserDokter thead th:first-child::before, 
        #TabelUserPasien thead th:first-child::after,
        #TabelUserPasien thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelUserAdmin td,
            #TabelUserDokter td,
            #TabelUserPasien td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
