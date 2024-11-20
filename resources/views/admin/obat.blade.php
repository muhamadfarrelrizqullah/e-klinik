@extends('admin.template.main')

@section('title', 'Data Obat - E Klinik PAL')

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
                        <a href="#" class="btn btn-sm btn-flex btn-light-secondary fw-bold"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-filter fs-6 text-muted me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>Filter</a>
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_658cdae763501">
                            <div class="px-7 py-5">
                                <div class="fs-5 text-gray-900 fw-bold">Filter Obat</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <div class="px-7 py-5">
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Jenis:</label>
                                    <select class="form-select form-select-solid" data-placeholder=""
                                        data-hide-search="true" id="filterJenis" name="jenis">
                                        <option value="" selected disabled>Pilih jenis obat</option>
                                        @foreach ($jenis_obats as $jenis)
                                            <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Satuan:</label>
                                    <select class="form-select form-select-solid" data-placeholder=""
                                        data-hide-search="true" id="filterSatuan" name="satuan">
                                        <option value="" selected disabled>Pilih satuan obat</option>
                                        <option value="Strip">Strip</option>
                                        <option value="Botol">Botol</option>
                                        <option value="Box">Box</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm btn-danger btn-active-light-primary me-2"
                                        data-kt-menu-dismiss="true">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-0">
                        <a class="btn btn-sm btn-flex btn-success fw-bold" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end" id="bt-download">
                            <i class="ki-duotone ki-folder-down fs-6 me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>Download PDF</a>
                    </div>
                    <div class="m-0">
                        <a class="btn btn-sm btn-flex btn-primary fw-bold" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end" data-bs-toggle="modal" data-bs-target="#modalAdd">
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
                    <form class="form" action="#">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Nama Obat</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="detailNama"
                                readonly>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Kuantitas</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="detailQty"
                                readonly>
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
                        <div class="text-end pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                class="btn btn-light me-3">Batal</button>
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
                    <form class="form" action="{{ route('admin-dataobat-tambah') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2 required">Nama Obat</label>
                            <input type="text" class="form-control form-control-solid" id="addNamaObat"
                                name="nama" placeholder="Masukkan Nama Obat">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2 required">Qty</label>
                            <input type="text" class="form-control form-control-solid" id="addQty" name="qty"
                                placeholder="Masukkan jumlah">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Satuan</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="addSatuan" name="satuan">
                                <option value="" selected disabled>Masukkan satuan obat</option>
                                <option value="Strip">Strip</option>
                                <option value="Botol">Botol</option>
                                <option value="Box">Box</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Jenis Obat</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="addJenisObat" name="jenis_obat">
                                <option value="" selected disabled>Masukkan jenis obat</option>
                                @foreach ($jenis_obats as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-end pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                                <span class="indicator-progress">Tunggu... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                    <form class="form" action="{{ route('admin-dataobat-edit') }}" method="PUT">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="id" name="id">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2 required">Nama Obat</label>
                            <input type="text" class="form-control form-control-solid" id="updateNamaObat"
                                name="nama">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2 required">Qty</label>
                            <input type="text" class="form-control form-control-solid" id="updateQty" name="qty">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Satuan</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="updateSatuan" name="satuan">
                                <option value="" selected disabled>Pilih satuan obat</option>
                                <option value="Strip">Strip</option>
                                <option value="Botol">Botol</option>
                                <option value="Box">Box</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Jenis Obat</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="updateJenisObat" name="jenis_obat">
                                <option value="" selected disabled>Pilih jenis obat</option>
                                @foreach ($jenis_obats as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-end
                                pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                                <span class="indicator-progress">Tunggu... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                ajax: {
                    url: "{{ route('admin-dataobat') }}",
                    data: function(d) {
                        d.data_jenis = $('#filterJenis').val();
                        d.data_satuan = $('#filterSatuan').val();
                    }
                },
                order: [
                    [1, 'asc'],
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'qty',
                        name: 'qty',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="badge badge-light-secondary">${data}</span>`;
                        }
                    },
                    {
                        data: 'satuan',
                        name: 'satuan',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            if (data === "Strip") {
                                return `<span class="badge badge-light-primary">${data}</span>`;
                            } else if (data === "Botol") {
                                return `<span class="badge badge-light-warning">${data}</span>`;
                            } else if (data === "Box") {
                                return `<span class="badge badge-light-success">${data}</span>`;
                            } else {
                                return `<span class="badge badge-light-secondary">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'jenis_obat',
                        name: 'jenis_obat',
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
                                <a onclick="modalDetail('${row.nama}', '${row.qty}', '${row.satuan}', '${row.jenis_obat}')" class="btn btn-icon btn-light-primary btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="modalEdit('${row.id}', '${row.nama}', '${row.qty}', '${row.satuan}', '${row.id_jenis}')" class="btn btn-icon btn-light-info btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalEdit">
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

            // Event listener untuk filter jenis
            $('#filterJenis').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter satuan
            $('#filterSatuan').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk reset filter
            document.querySelector('button[type="reset"]').addEventListener('click', function() {
                document.getElementById('filterJenis').value = '';
                document.getElementById('filterSatuan').value = '';
                $('#TabelObat').DataTable().ajax.reload();
            });

            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });
        });

        // Clear form modal add
        $('#modalAdd').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });

        // Pengambilan data modal detail
        function modalDetail(nama, jenis_obat, satuan, qty) {
            $('#detailNama').val(nama);
            $('#detailJenisObat').val(jenis_obat);
            $('#detailSatuan').val(satuan);
            $('#detailQty').val(qty);
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
            e.preventDefault();
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
                        type: "PUT",
                        data: data,
                        success: function(response) {
                            console.log(response);
                            $('#modalEdit').modal('hide');
                            tabel.ajax.reload();
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
        function modalEdit(id, nama, qty, satuan, id_jenis) {
            $('#id').val(id);
            $('#updateNamaObat').val(nama);
            $('#updateQty').val(qty);
            $('#updateSatuan').val(satuan);
            $('#updateJenisObat').val(id_jenis);
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
                    fetch(`/admin/data-obat-delete/${id}`, {
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

        // Regex input qty
        function restrictInputToNumbers(event) {
            event.target.value = event.target.value.replace(/[^0-9]/g, '');
        }
        const inputs = document.querySelectorAll(
            'input[name="qty"]');
        inputs.forEach(input => {
            input.addEventListener('input', restrictInputToNumbers);
        });
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
