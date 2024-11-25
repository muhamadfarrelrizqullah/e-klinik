@extends('apoteker.template.main')

@section('title', 'Data Obat Keluar - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-8 flex-column justify-content-center my-0">
                        Data Obat Keluar</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted fs-8">Apoteker - Obat Keluar</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <a class="btn btn-sm btn-flex btn-light-secondary fw-bold" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-filter fs-6 text-muted me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>Filter</a>
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_658cdae763501">
                            <div class="px-7 py-5">
                                <div class="fs-5 text-gray-900 fw-bold">Filter Obat Keluar</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <div class="px-7 py-5">
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Nama Obat:</label>
                                    <select class="form-select form-select-solid" data-placeholder=""
                                        data-hide-search="true" id="filterNamaObat" name="nama_obat">
                                        <option value="" selected disabled>Pilih nama obat</option>
                                        @foreach ($obats as $obat)
                                            <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Jenis Obat:</label>
                                    <select class="form-select form-select-solid" data-placeholder=""
                                        data-hide-search="true" id="filterJenisObat" name="jenis_obat">
                                        <option value="" selected disabled>Pilih jenis obat</option>
                                        @foreach ($jenis_obats as $jenis_obat)
                                            <option value="{{ $jenis_obat->id }}">{{ $jenis_obat->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Tanggal Keluar:</label>
                                    <input type="date" id="filterTanggalKeluar" name="tanggal_keluar"
                                        class="form-control form-control-sm me-2">
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
                                    <table id="TabelObatKeluar"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Jenis</th>
                                                <th>Satuan</th>
                                                <th>Jumlah Keluar</th>
                                                <th>Tanggal Keluar</th>
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
                    <h2>Detail Obat Keluar</h2>
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
                            <input type="text" class="form-control form-control-solid" placeholder="" id="detailNamaObat"
                                readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Jenis Obat</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailJenisObat" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Satuan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailSatuan" readonly>
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Stok Tersedia</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailJumlahTotal" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Jumlah Keluar</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailJumlahKeluar" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Tanggal Keluar</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailTanggalKeluar" readonly>
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
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            tabel = $('#TabelObatKeluar').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('apoteker-dataobatkeluar') }}",
                    data: function(d) {
                        d.data_nama = $('#filterNamaObat').val();
                        d.data_jenis = $('#filterJenisObat').val();
                        d.data_tanggal = $('#filterTanggalKeluar').val();
                    }
                },
                order: [
                    [5, 'desc'],
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
                        data: 'nama_obat',
                        name: 'nama_obat',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
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
                        data: 'jumlah_keluar',
                        name: 'jumlah_keluar',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="badge badge-light-secondary">${data}</span>`;
                        }
                    },
                    {
                        data: 'tanggal_keluar',
                        name: 'tanggal_keluar',
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
                                <a onclick="modalDetail('${row.nama_obat}', '${row.jenis_obat}', '${row.satuan}', '${row.jumlah_total}', '${row.jumlah_keluar}', '${row.tanggal_keluar}')" class="btn btn-icon btn-light-primary btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
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
                }
            });

            // Event listener untuk filter nama
            $('#filterNamaObat').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter jenis
            $('#filterJenisObat').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter tanggal
            $('#filterTanggalKeluar').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk reset filter
            document.querySelector('button[type="reset"]').addEventListener('click', function() {
                document.getElementById('filterNamaObat').value = '';
                document.getElementById('filterJenisObat').value = '';
                document.getElementById('filterTanggalKeluar').value = '';
                $('#TabelObatKeluar').DataTable().ajax.reload();
            });

            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });
        });

        // Pengambilan data modal detail
        function modalDetail(nama_obat, jenis_obat, satuan, jumlah_total, jumlah_keluar, tanggal_keluar) {
            $('#detailNamaObat').val(nama_obat);
            $('#detailJenisObat').val(jenis_obat);
            $('#detailSatuan').val(satuan);
            $('#detailJumlahTotal').val(jumlah_total);
            $('#detailJumlahKeluar').val(jumlah_keluar);

            let dateKeluar = new Date(tanggal_keluar);
            let dayKeluar = String(dateKeluar.getDate()).padStart(2, '0');
            let monthKeluar = String(dateKeluar.getMonth() + 1).padStart(2, '0');
            let yearKeluar = String(dateKeluar.getFullYear());
            let formattedBirthdateKeluar = `${dayKeluar}/${monthKeluar}/${yearKeluar}`;
            $('#detailTanggalKeluar').val(formattedBirthdateKeluar);

            $('#modalDetail').modal('show');
        }

        // Handle download pdf
        document.addEventListener("DOMContentLoaded", function() {
            const {
                jsPDF
            } = window.jspdf;
            document.getElementById('bt-download').addEventListener('click', function() {
                var filterNama = $('#filterNamaObat').val();
                var filterJenis = $('#filterJenisObat').val();
                var filterTanggal = $('#filterTanggalKeluar').val();
                $.ajax({
                    url: "{{ route('apoteker-dataobatkeluar') }}",
                    type: "GET",
                    data: {
                        data_nama: filterNama,
                        data_jenis: filterJenis,
                        data_tanggal: filterTanggal
                    },
                    success: function(response) {
                        $.ajax({
                            url: "/logo-base64",
                            type: "GET",
                            success: function(logoResponse) {
                                // Menambahkan kop perusahaan
                                var doc = new jsPDF();
                                var companyLogo = logoResponse.base64;
                                var companyAddress =
                                    'Jl. Ujung Kel. Ujung, Kec. Semampir, PO BOX 1134 Surabaya 60155';
                                var companyContact =
                                    'Telp (62-31) 329 2275 Fax (62-31) 329 2530';
                                var pageWidth = doc.internal.pageSize.getWidth();
                                var logoWidth = 50;
                                var centerX = pageWidth / 2;
                                doc.addImage(companyLogo, 'PNG', centerX -
                                    logoWidth / 2, 10, logoWidth, 10);
                                doc.setFontSize(10);
                                doc.setFont("helvetica", "normal");
                                doc.text(companyAddress, centerX, 30, {
                                    align: "center"
                                });
                                doc.text(companyContact, centerX, 35, {
                                    align: "center"
                                });
                                doc.setFontSize(10);
                                doc.text('Data Obat Keluar Pt. PAL Indonesia', 14,
                                    55);
                                // Menambahkan tabel
                                var columns = ["No", "Nama Obat", "Satuan", "Jenis",
                                    "Jumlah Keluar",
                                    "Stok", "Tanggal Keluar"
                                ];
                                var data = response.data.map((row, index) => [
                                    index + 1,
                                    row.nama_obat.replace(/&amp;/g, '&'),
                                    row.satuan,
                                    row.jenis_obat,
                                    row.jumlah_keluar,
                                    row.jumlah_total,
                                    formatDate(row.tanggal_keluar)
                                ]);
                                doc.autoTable({
                                    head: [columns],
                                    body: data,
                                    startY: 60,
                                    styles: {
                                        halign: 'center'
                                    },
                                    headStyles: {
                                        halign: 'center'
                                    }
                                });
                                doc.save('Data_Obat_Keluar_Report.pdf');
                            }
                        });
                    }
                });
            });

            function formatDate(dateStr) {
                var tanggal = new Date(dateStr);
                var day = tanggal.getDate().toString().padStart(2, '0');
                var month = (tanggal.getMonth() + 1).toString().padStart(2, '0');
                var year = tanggal.getFullYear();
                return `${day}-${month}-${year}`;
            }
        });
    </script>
@endpush

@push('style')
    <style>
        #bt-download,
        #TabelObatKeluar td,
        #TabelObatKeluar th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelObatKeluar thead th:first-child {
            cursor: default;
        }

        #TabelObatKeluar thead th:first-child::after,
        #TabelObatKeluar thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelObatKeluar td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
