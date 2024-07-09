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
                                <ul id="navRole" class="nav nav-pills nav-pills-custom mb-3">
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-row overflow-hidden w-100 h-auto p-3 active"
                                            data-bs-toggle="pill" href="#kt_stats_widget_6_tab_1">
                                            <div class="nav-icon me-3 d-flex align-items-center">
                                                <i class="ki-duotone ki-people fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </div>
                                            <span
                                                class="nav-text text-gray-800 fw-bold fs-6 lh-1 d-flex align-items-center">Pasien</span>
                                            <span
                                                class="bullet-custom position-absolute start-0 bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-row overflow-hidden w-100 h-auto p-3"
                                            data-bs-toggle="pill" href="#kt_stats_widget_6_tab_2">
                                            <div class="nav-icon me-3 d-flex align-items-center">
                                                <i class="ki-duotone ki-syringe fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </div>
                                            <span
                                                class="nav-text text-gray-800 fw-bold fs-6 lh-1 d-flex align-items-center">Dokter</span>
                                            <span
                                                class="bullet-custom position-absolute start-0 bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-row overflow-hidden w-100 h-auto p-3"
                                            data-bs-toggle="pill" href="#kt_stats_widget_6_tab_3">
                                            <div class="nav-icon me-3 d-flex align-items-center">
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
                                            <span
                                                class="nav-text text-gray-800 fw-bold fs-6 lh-1 d-flex align-items-center">Admin</span>
                                            <span
                                                class="bullet-custom position-absolute start-0 bottom-0 w-100 h-4px bg-primary"></span>
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

@section('modals')
    <div id="modalDetail" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalDetailLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Detail User</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="#">
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>NIP</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNip" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Nama</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNama" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Status</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailStatus" readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Role</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailRole" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Divisi</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailDivisiNama" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Tanggal Lahir</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailTanggalLahir" readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tinggi Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailTinggiBadan" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Berat Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailBeratBadan" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modalAdd" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalAddLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Tambah User Baru</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('admin-datauser-tambah') }}" method="POST">
                        @csrf
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">NIP</span>
                                </label>
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Masukkan nip user" id="addNip" name="nip" pattern="\d{8}"
                                    title="NIP harus berupa 8 digit angka">
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Nama</span>
                                </label>
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Masukkan nama user" id="addNama" name="nama">
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Status</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="addStatus" name="status">
                                <option value="" selected disabled>Masukkan status user</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Role</label>
                                <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                    id="addRole" name="role">
                                    <option value="" selected disabled>Masukkan role user</option>
                                    <option value="Pasien">Pasien</option>
                                    <option value="Dokter">Dokter</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Divisi</label>
                                <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                    id="addDivisi" name="divisi">
                                    <option value="" selected disabled>Masukkan divisi user</option>
                                    @foreach ($divisis as $divisi)
                                        <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Tanggal Lahir</label>
                            <div class="position-relative d-flex align-items-center">
                                <i class="ki-duotone ki-calendar-8 fs-2 position-absolute mx-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                </i>
                                <input type="date" class="form-control form-control-solid ps-12" placeholder=""
                                    id="addTanggalLahir" name="tanggal_lahir" />
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tinggi Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Masukkan tinggi badan user" id="addTinggiBadan" name="tinggi_badan">
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Berat Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Masukkan berat badan user" id="addBeratBadan" name="berat_badan">
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                class="btn btn-light me-3">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
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
                        render: function(data, type, row) {
                            if (data === 'Aktif') {
                                return `<span class="badge badge-light-success">${data}</span>`;
                            } else {
                                return `<span class="badge badge-light-danger">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'role',
                        name: 'role',
                        orderable: true,
                        render: function(data, type, row) {
                            if (data === 'Admin') {
                                return `<span class="badge badge-primary">${data}</span>`;
                            } else if (data === 'Dokter') {
                                return `<span class="badge badge-warning">${data}</span>`;
                            } else {
                                return `<span class="badge badge-success">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'divisi_nama',
                        name: 'divisi_nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="badge badge-light-secondary">${data}</span>`;
                        }
                    },
                    {
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetail('${row.nip}', '${row.nama}', '${row.status}', '${row.role}', '${row.divisi_nama}', '${row.tanggal_lahir}', '${row.tinggi_badan}', '${row.berat_badan}')" class="btn btn-icon btn-bg-light btn-active-color-info btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="modalEdit()" class="btn btn-icon btn-bg-light btn-active-color-primary btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                    <i class="ki-duotone ki-wrench fs-2">
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
                language: {
                    paginate: {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    },
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    zeroRecords: "Tidak ditemukan data yang sesuai",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                    infoFiltered: "(disaring dari _MAX_ entri keseluruhan)"
                },
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

            $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
                tabelPasien.columns.adjust().responsive.recalc();
                tabelDokter.columns.adjust().responsive.recalc();
                tabelAdmin.columns.adjust().responsive.recalc();
            });

            $('#modalAdd form').on('submit', function(e) {
                const swalMixinSuccess = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                });
                e.preventDefault();
                let data = $(this).serialize();
                let form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: "POST",
                    data: data,
                    success: function(response) {
                        console.log(response);
                        $('#modalAdd').modal('hide');
                        tabelPasien.ajax.reload();
                        tabelDokter.ajax.reload();
                        tabelAdmin.ajax.reload();
                        swalMixinSuccess.fire(
                            'Success!',
                            'User berhasil ditambah.',
                            'success'
                        );
                    },
                    error: function(xhr) {
                        console.log(xhr.responseJSON.message);
                        Swal.fire(
                            'Error!',
                            'Error menambahkan user: ' + xhr.responseJSON.message,
                            'error'
                        );
                    }
                });
            });
        });

        function restrictInputToNumbers(event) {
            event.target.value = event.target.value.replace(/[^0-9]/g, '');
        }
        const inputs = document.querySelectorAll(
        'input[name="nip"], input[name="tinggi_badan"], input[name="berat_badan"]');
        inputs.forEach(input => {
            input.addEventListener('input', restrictInputToNumbers);
        });

        $('#modalAdd').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });

        function modalDetail(nip, nama, status, role, divisi_nama, tanggal_lahir, tinggi_badan, berat_badan) {
            $('#detailNip').val(nip);
            $('#detailNama').val(nama);
            $('#detailStatus').val(status);
            $('#detailRole').val(role);
            $('#detailDivisiNama').val(divisi_nama);
            let date = new Date(tanggal_lahir);
            let day = String(date.getDate()).padStart(2, '0');
            let month = String(date.getMonth() + 1).padStart(2, '0');
            let year = String(date.getFullYear());
            let formattedBirthdate = `${day}/${month}/${year}`;
            $('#detailTanggalLahir').val(formattedBirthdate);
            $('#detailTinggiBadan').val(tinggi_badan);
            $('#detailBeratBadan').val(berat_badan);
            $('#modalDetail').modal('show');
        }
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

            #navRole {
                justify-content: center;
            }
        }
    </style>
@endpush
