@extends('pasien.template.main')

@section('title', 'Data Pengajuan - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Data Pengajuan Pasien</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Pengajuan</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <button type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">
                        Tambah Pengajuan
                    </button>
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
                                    <table id="TabelPengajuan"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Keluhan</th>
                                                <th>Status</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Tanggal Pemeriksaan</th>
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
                    <h2>Detail Pengajuan</h2>
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
                                    <span>NIP Pasien</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNipPasien" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Nama Pasien</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNamaPasien" readonly>
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>NIP Dokter</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNipDokter" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Nama Dokter</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNamaDokter" readonly>
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Keluhan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailKeluhan" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Status</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailStatus" readonly>
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tanggal Pengajuan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailTanggalPengajuan" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tanggal Pemeriksaan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailTanggalPemeriksaan" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Catatan</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailCatatan" readonly>
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

    <div id="modalAdd" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalAddsLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Tambah Pengajuan Baru</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('pasien-datapengajuan-tambah') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Keluhan</span>
                            </label>
                            <textarea class="form-control form-control-solid" placeholder="Masukkan keluhan anda" id="addKeluhan"
                                name="keluhan"></textarea>
                        </div>
                        <div class="text-end pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                class="btn btn-light me-3">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                                <span class="indicator-progress">Tunggu....
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
        // Inisialisasi datatable
        $(document).ready(function() {
            tabel = $('#TabelPengajuan').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('pasien-datapengajuan') }}",
                order: [
                    [4, 'asc'],
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
                        data: 'nama_pasien',
                        name: 'nama_pasien',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'keluhan',
                        name: 'keluhan',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        render: function(data, type, row) {
                            if (data === 'Pending') {
                                return `<span class="badge badge-light-secondary">${data}</span>`;
                            } else if (data === 'Ditolak') {
                                return `<span class="badge badge-light-danger">${data}</span>`;
                            } else if (data === 'Diterima') {
                                return `<span class="badge badge-light-info">${data}</span>`;
                            } else if (data === 'Diproses') {
                                return `<span class="badge badge-light-primary">${data}</span>`;
                            } else {
                                return `<span class="badge badge-light-success">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'tanggal_pengajuan',
                        name: 'tanggal_pengajuan',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            var tanggal = new Date(data);
                            var day = tanggal.getDate().toString().padStart(2, '0');
                            var month = (tanggal.getMonth() + 1).toString().padStart(2, '0');
                            var year = tanggal.getFullYear();
                            return `<span class="text-gray-900 fw-bold fs-6">${day}-${month}-${year}</span>`;
                        }
                    },
                    {
                        data: 'tanggal_pemeriksaan',
                        name: 'tanggal_pemeriksaan',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            var tanggal = new Date(data);
                            var day = tanggal.getDate().toString().padStart(2, '0');
                            var month = (tanggal.getMonth() + 1).toString().padStart(2, '0');
                            var year = tanggal.getFullYear();
                            return `<span class="text-gray-900 fw-bold fs-6">${day}-${month}-${year}</span>`;
                        }
                    },
                    {
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetail('${row.nama_pasien}', '${row.nip_pasien}', '${row.nama_dokter}', '${row.nip_dokter}', '${row.keluhan}', '${row.status}', '${row.tanggal_pengajuan}', '${row.tanggal_pemeriksaan}', '${row.catatan}')" class="btn btn-icon btn-bg-light btn-active-color-info btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
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
        function modalDetail(nama_pasien, nip_pasien, nama_dokter, nip_dokter, keluhan, status, tanggal_pengajuan,
            tanggal_pemeriksaan, catatan) {
            $('#detailNamaPasien').val(nama_pasien);
            $('#detailNipPasien').val(nip_pasien);
            $('#detailNamaDokter').val(nama_dokter);
            $('#detailNipDokter').val(nip_dokter ? nip_dokter : "");
            $('#detailKeluhan').val(keluhan);
            $('#detailStatus').val(status);
            let datePengajuan = new Date(tanggal_pengajuan);
            let dayPengajuan = String(datePengajuan.getDate()).padStart(2, '0');
            let monthPengajuan = String(datePengajuan.getMonth() + 1).padStart(2, '0');
            let yearPengajuan = String(datePengajuan.getFullYear());
            let formattedBirthdatePengajuan = `${dayPengajuan}/${monthPengajuan}/${yearPengajuan}`;
            $('#detailTanggalPengajuan').val(formattedBirthdatePengajuan);
            let datePemeriksaan = new Date(tanggal_pemeriksaan);
            let dayPemeriksaan = String(datePemeriksaan.getDate()).padStart(2, '0');
            let monthPemeriksaan = String(datePemeriksaan.getMonth() + 1).padStart(2, '0');
            let yearPemeriksaan = String(datePemeriksaan.getFullYear());
            let formattedBirthdatePemeriksaan = `${dayPemeriksaan}/${monthPemeriksaan}/${yearPemeriksaan}`;
            $('#detailTanggalPemeriksaan').val(formattedBirthdatePemeriksaan);
            $('#detailCatatan').val(catatan);
            $('#modalDetail').modal('show');
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
                        'Pengajuan berhasil ditambah.',
                        'success'
                    );
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON.message);
                    Swal.fire(
                        'Error!',
                        'Error menambahkan pengajuan: ' + xhr.responseJSON.message,
                        'error'
                    );
                }
            });
        });
    </script>
@endpush

@push('style')
    <style>
        #bt-download,
        #TabelPengajuan td,
        #TabelPengajuan th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelPengajuan thead th:first-child {
            cursor: default;
        }

        #TabelPengajuan thead th:first-child::after,
        #TabelPengajuan thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelPengajuan td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush