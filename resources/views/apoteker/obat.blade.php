@extends('apoteker.template.main')

@section('title', 'Data Pengajuan - E Klinik PAL')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Data Obat</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Obat</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <a class="btn btn-sm btn-flex btn-primary fw-bold" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end" data-bs-toggle="modal"
                            data-bs-target="#modalAdd">
                            <i class="ki-duotone ki-plus fs-6 me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>Tambah Obat</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="TabelObat"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Qty</th>
                                                <th>Satuan</th>
                                                <th>Jenis</th>
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

@section('modals')
    <div id="modalDetail" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalDetailLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Detail Obat</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Nama Obat</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNama" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Kuantitas</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailQty" readonly>
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Satuan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailSatuan" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Jenis Obat</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailJenisObat" readonly>
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
                    <h2>Tambah Obat</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('apoteker-dataobat-tambah') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2">Nama Obat</label>
                            <input type="text" class="form-control form-control-solid" id="addNamaObat" name="nama" placeholder="Masukkan Nama Obat" required>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2 required">Qty</label>
                            <input type="number" class="form-control form-control-solid" id="addQty" name="qty" placeholder="Masukkan jumlah" required>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2 required">Satuan</label>
                            <input type="text" class="form-control form-control-solid" id="addSatuan" name="satuan" placeholder="Masukkan satuan (contoh: Tablet, Botol, Kapsul)" required>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2 required">Jenis Obat</label>
                            <input type="text" class="form-control form-control-solid" id="addJenisObat" name="jenis_obat" placeholder="Masukkan jenis obat (contoh: Generik, Paten)" required>
                        </div>
                        <div class="text-end pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                                <span class="indicator-progress">Tunggu... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <div id="modalEdit" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalEditLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Obat</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('apoteker-dataobat-edit') }}" method="PUT">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editId" name="id">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2">Nama Obat</label>
                            <input type="text" class="form-control form-control-solid" id="editNamaObat" name="nama" required>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2 required">Qty</label>
                            <input type="number" class="form-control form-control-solid" id="editQty" name="qty" required>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2 required">Satuan</label>
                            <input type="text" class="form-control form-control-solid" id="editSatuan" name="satuan" required>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2 required">Jenis Obat</label>
                            <input type="text" class="form-control form-control-solid" id="editJenisObat" name="jenis_obat" required>
                        </div>
                        <div class="text-end pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                                <span class="indicator-progress">Tunggu... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
        $(document).ready(function() {
            tabel = $('#TabelObat').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('apoteker-dataobat') }}", // Pastikan route ini mengembalikan data yang sesuai
                order: [
                    [0, 'asc'], // Urutkan berdasarkan kolom pertama (ID)
                    [1, 'desc'], // Jika ingin urutkan nama misalnya
                ],
                columns: [
                    {
                        data: 'DT_RowIndex', // Data untuk nomor urut otomatis
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'nama', // Kolom nama sesuai di tabel obats
                        name: 'nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'qty', // Kolom qty
                        name: 'qty',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'satuan', // Kolom satuan
                        name: 'satuan',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'jenis_obat', // Kolom jenis_obat
                        name: 'jenis_obat',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: null, // Kolom aksi (edit, delete, dll.)
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetail('${row.nama}', '${row.qty}', '${row.satuan}', '${row.jenis_obat}')" class="btn btn-icon btn-light-primary btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="modalEdit('${row.id}', '${row.nama}', '${row.qty}', '${row.satuan}', '${row.jenis_obat}')" class="btn btn-icon btn-light-info btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                    <i class="ki-duotone ki-wrench fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="deleteData(${row.id})" class="btn btn-icon btn-light-danger btn-xl">
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
                }
            });
        });


            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });

        // Clear form modal add
        $('#modalAdd').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });
        $('#modalAddRating').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });

        // Pengambilan data modal detail
        function modalDetail(nama, jenis_obat, satuan, qty) {
            $('#detailNama').val(nama);
            $('#detailJenisObat').val(jenis_obat);
            $('#detailSatuan').val(satuan);
            $('#detailQty').val(qty);
            
            // Menampilkan modal detail
            $('#modalDetail').modal('show');
        }

        // Penanganan form modal edit
        $('#modalEdit form').on('submit', function(e) {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            e.preventDefault(); // Mencegah submit form default

            let data = $(this).serialize();
            let form = $(this);

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda ingin menyimpan perubahan ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: form.attr('action'),
                        type: "PUT", // Gunakan PUT sesuai metode pada route
                        data: data,
                        success: function(response) {
                            console.log(response);
                            $('#modalEdit').modal('hide');
                            tabel.ajax.reload(); // Reload tabel setelah update berhasil
                            swalMixinSuccess.fire(
                                'Saved!',
                                'Obat berhasil diupdate.',
                                'success'
                            );
                        },
                        error: function(xhr) {
                            console.log(xhr.responseJSON.message);
                            Swal.fire(
                                'Error!',
                                'Error mengupdate obat: ' + xhr.responseJSON.message,
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // Pengambilan data old modal edit
        function modalEdit(id, nama, qty, satuan, jenis_obat) {
            $('#editId').val(id);
            $('#editNamaObat').val(nama);
            $('#editQty').val(qty);
            $('#editSatuan').val(satuan);
            $('#editJenisObat').val(jenis_obat);

            // Menampilkan modal edit
            $('#modalEdit').modal('show');
        }

        // Menangani penanganan form modal add
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
                    tabel.ajax.reload();
                    swalMixinSuccess.fire(
                        'Success!',
                        'Obat berhasil ditambah.',
                        'success'
                    );
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON.message);
                    Swal.fire(
                        'Error!',
                        'Error menambahkan Obat: ' + xhr.responseJSON.message,
                        'error'
                    );
                }
            });
        });

        // Menangani penanganan fungsi delete data
        function deleteData(id) {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/apoteker/data-obat-delete/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(errorData => {
                                    throw new Error(errorData.message);
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Deleted:', data);
                            tabel.ajax.reload();
                            swalMixinSuccess.fire(
                                'Deleted!',
                                'Obat berhasil dihapus.',
                                'success'
                            );
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'Error menghapus obat: ' + error.message,
                                'error'
                            );
                        });
                }
            });
        }
    </script>
@endpush

@push('style')
    <style>
        #bt-download,
        #TabelObat td,
        #TabelObat th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelObat thead th:first-child {
            cursor: default;
        }

        #TabelObat thead th:first-child::after,
        #TabelObat thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelObat td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
