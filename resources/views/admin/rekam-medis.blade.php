@extends('admin.template.main')

@section('title', 'Data Rekam Medis - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-8 flex-column justify-content-center my-0">
                        Data Rekam Medis</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted fs-8">Admin - Rekam Medis</li>
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
                                <div class="fs-5 text-gray-900 fw-bold">Filter Rekam Medis</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <div class="px-7 py-5">
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Nama Pasien:</label>
                                    <select class="form-select form-select-solid" data-placeholder=""
                                        data-hide-search="true" id="filterNamaPasien" name="nama_pasien">
                                        <option value="" selected disabled>Pilih nama pasien</option>
                                        @foreach ($pasiens as $pasien)
                                            <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Nama Dokter:</label>
                                    <select class="form-select form-select-solid" data-placeholder=""
                                        data-hide-search="true" id="filterNamaDokter" name="nama_dokter">
                                        <option value="" selected disabled>Pilih nama dokter</option>
                                        @foreach ($dokters as $dokter)
                                            <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Data tanggal:</label>
                                    <select class="form-select form-select-solid" data-placeholder=""
                                        data-hide-search="true" id="filterDataTanggal">
                                        <option value="" selected disabled>Pilih data tanggal</option>
                                        <option value="tanggal_pengajuan">Tanggal Pengajuan</option>
                                        <option value="tanggal_pemeriksaan">Tanggal Pemeriksaan</option>
                                    </select>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Tanggal setelah:</label>
                                    <input type="date" id="filterTanggalSetelah" name="date-before"
                                        class="form-control form-control-sm me-2">
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Tanggal sebelum:</label>
                                    <input type="date" id="filterTanggalSebelum" name="date-after"
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
                                    <table id="TabelRekamMedis"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>No Rekap</th>
                                                <th>Nama Pasien</th>
                                                <th>Nama Dokter</th>
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
                                    <span>Jabatan Pasien</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailJabatan" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tanggal Lahir Pasien</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailTL" readonly>
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tinggi Badan Pasien</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailTB" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Berat Badan Pasien</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailBB" readonly>
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
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Keluhan</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailKeluhan" readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Poli</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNamaPoli" readonly>
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

    <div id="modalDetailQR" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalDetailQRLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Detail QR Code</h2>
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
                                <span>QR Code</span>
                            </label>
                            <img src="" alt="QR Code" class="img-fluid" id="detailQR"
                                style="max-width: 200px;">
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

    <div id="modalDetailResep" class="modal fade" tabindex="-1" aria-hidden="true"
        aria-labelledby="modalDetailResepLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Detail Resep</h2>
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
                                    <span>Kode Resep</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailKodeResep" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Status Resep</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailStatusResep" readonly>
                            </div>
                        </div>
                        <div id="detailObatContainer"></div>
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
        // Inisialisasi datatable
        $(document).ready(function() {
            tabel = $('#TabelRekamMedis').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin-datarekammedis') }}",
                    data: function(d) {
                        d.id_dokter = $('#filterNamaDokter').val();
                        d.id_pasien = $('#filterNamaPasien').val();
                        d.data_tanggal = $('#filterDataTanggal').val();
                        d.tanggal_setelah = $('#filterTanggalSetelah').val();
                        d.tanggal_sebelum = $('#filterTanggalSebelum').val();
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
                        data: 'no_rekap',
                        name: 'no_rekap',
                        orderable: true,
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
                        data: 'nama_dokter',
                        name: 'nama_dokter',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
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
                            let buttons = '';
                            // Tombol detail selalu muncul
                            buttons += `
                            <div class="d-flex justify-content-center flex-shrink-0">
                            <a onclick="modalDetail('${row.nama_pasien}', '${row.nip_pasien}', '${row.nama_dokter}', '${row.nip_dokter}', '${row.keluhan}', '${row.status}', '${row.tanggal_pengajuan}', '${row.tanggal_pemeriksaan}', '${row.catatan}', '${row.nama_poli}', '${row.jabatan}', '${row.tl_pasien}', '${row.tb_pasien}', '${row.bb_pasien}')" class="btn btn-icon btn-light-primary btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                <i class="ki-duotone ki-scroll fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>`;
                            // Tombol QR selalu muncul
                            buttons += `
                            <a onclick="modalDetailQR('${row.id}')" class="btn btn-icon btn-light-info btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetailQR">
                                <i class="ki-duotone ki-scan-barcode fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                    <span class="path7"></span>
                                    <span class="path8"></span>
                                </i>
                            </a>`;
                            // Tombol download surat izin muncul jika surat_izin ada
                            if (row.surat_izin) {
                                buttons += `
                                <a onclick="downloadFile('${row.surat_izin}')" class="btn btn-icon btn-light-success btn-xl me-2">
                                    <i class="ki-duotone ki-file-down fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </a>`;
                            }
                            // Tombol rating muncul jika rating belum diberikan
                            if (row.kode_resep) {
                                buttons += `
                                <a onclick="detailResep('${row.nama_obat}', '${row.jumlah_obat}', '${row.kode_resep}', '${row.status_resep}')" class="btn btn-icon btn-light-warning btn-xl" data-bs-toggle="modal" data-bs-target="#modalDetailResep">
                                    <i class="ki-duotone ki-capsule fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </a>`;
                            }
                            buttons += '</div>';
                            return buttons;
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

            // Event listener untuk filter nama dokter
            $('#filterNamaDokter').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter nama pasien
            $('#filterNamaPasien').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter tanggal
            $('#filterDataTanggal').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter tanggal setelah
            $('#filterTanggalSetelah').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter tanggal sebelum
            $('#filterTanggalSebelum').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk reset filter
            document.querySelector('button[type="reset"]').addEventListener('click', function() {
                document.getElementById('filterNamaDokter').value = '';
                document.getElementById('filterNamaPasien').value = '';
                document.getElementById('filterDataTanggal').value = '';
                document.getElementById('filterTanggalSetelah').value = '';
                document.getElementById('filterTanggalSebelum').value = '';
                $('#TabelRekamMedis').DataTable().ajax.reload();
            });

            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });
        });

        // Pengambilan data modal detail
        function modalDetail(nama_pasien, nip_pasien, nama_dokter, nip_dokter, keluhan, status, tanggal_pengajuan,
            tanggal_pemeriksaan, catatan, nama_poli, jabatan, tl_pasien, tb_pasien, bb_pasien) {
            $('#detailNamaPasien').val(nama_pasien);
            $('#detailNipPasien').val(nip_pasien);
            $('#detailNamaDokter').val(nama_dokter);
            $('#detailNipDokter').val(nip_dokter);
            $('#detailKeluhan').val(keluhan);
            $('#detailStatus').val(status);
            let datePengajuan = new Date(tanggal_pengajuan);
            let dayPengajuan = String(datePengajuan.getDate()).padStart(2, '0');
            let monthPengajuan = String(datePengajuan.getMonth() + 1).padStart(2, '0');
            let yearPengajuan = String(datePengajuan.getFullYear());
            let formattedPengajuan = `${dayPengajuan}/${monthPengajuan}/${yearPengajuan}`;
            $('#detailTanggalPengajuan').val(formattedPengajuan);
            let datePemeriksaan = new Date(tanggal_pemeriksaan);
            let dayPemeriksaan = String(datePemeriksaan.getDate()).padStart(2, '0');
            let monthPemeriksaan = String(datePemeriksaan.getMonth() + 1).padStart(2, '0');
            let yearPemeriksaan = String(datePemeriksaan.getFullYear());
            let formattedPemeriksaan = `${dayPemeriksaan}/${monthPemeriksaan}/${yearPemeriksaan}`;
            $('#detailTanggalPemeriksaan').val(formattedPemeriksaan);
            $('#detailCatatan').val(catatan);
            $('#detailNamaPoli').val(nama_poli);
            $('#detailJabatan').val(jabatan);
            let dateTL = new Date(tl_pasien);
            let dayTL = String(dateTL.getDate()).padStart(2, '0');
            let monthTL = String(dateTL.getMonth() + 1).padStart(2, '0');
            let yearTL = String(dateTL.getFullYear());
            let formattedTL = `${dayTL}/${monthTL}/${yearTL}`;
            $('#detailTL').val(formattedTL);
            $('#detailTB').val(tb_pasien);
            $('#detailBB').val(bb_pasien);
            $('#modalDetail').modal('show');
        }

        // Pengambilan data modal detail QR
        function modalDetailQR(id) {
            var qrcodeUrl = '{{ asset('storage/qr_codes/rekap_') }}' + id + '.png';
            // Mengatur URL gambar QR Code
            $('#detailQR').attr('src', qrcodeUrl);
            $('#modalDetailQR').modal('show');
        }

        // Pengambilan data nama file
        function downloadFile(suratIzin) {
            if (suratIzin) {
                var downloadUrl = `/storage/pdf/${suratIzin}`;
                window.location.href = downloadUrl;
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Tidak Ditemukan',
                    text: 'Surat izin tidak ditemukan.',
                    confirmButtonText: 'OK'
                });
            }
        }

        // Pegambilan data resep
        function detailResep(nama_obat, jumlah_obat, kode_resep, status_resep) {
            $('#detailKodeResep').val(kode_resep);
            $('#detailStatusResep').val(status_resep);
            let namaObatArray = nama_obat.split(', ');
            let jumlahObatArray = jumlah_obat.split(', ');
            let obatContent = '';
            for (let i = 0; i < namaObatArray.length; i++) {
                obatContent += `
            <div class="row g-9 mb-8">
                <div class="col-md-6 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                        <span>Nama Obat</span>
                    </label>
                    <input type="text" class="form-control form-control-solid" placeholder=""
                        value="${namaObatArray[i]}" readonly>
                </div>
                <div class="col-md-6 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                        <span>Jumlah Obat</span>
                    </label>
                    <input type="text" class="form-control form-control-solid" placeholder=""
                        value="${jumlahObatArray[i]}" readonly>
                </div>
            </div>`;
            }

            // Tambahkan ke dalam elemen container obat
            $('#detailObatContainer').html(obatContent);
            $('#modalDetailResep').modal('show');
        }

        // Handle download pdf
        document.addEventListener("DOMContentLoaded", function() {
            const {
                jsPDF
            } = window.jspdf;
            document.getElementById('bt-download').addEventListener('click', function() {
                $.ajax({
                    url: "{{ route('admin-datarekammedis') }}",
                    type: "GET",
                    success: function(response) {
                        $.ajax({
                            url: "/logo-base64",
                            type: "GET",
                            success: function(logoResponse) {
                                // Urutkan data berdasarkan nama
                                var sortedData = response.data.sort((a, b) => {
                                    return a.no_rekap.localeCompare(b
                                        .no_rekap);
                                });
                                var doc = new jsPDF();
                                // Menambahkan kop perusahaan
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
                                doc.text('Data Rekam Medis', 14, 55);
                                // Menambahkan tabel
                                var columns = ["No", "No Rekap", "NIP Pasien",
                                    "Nama Pasien", "Divisi Pasien",
                                    "Nama Dokter", "Poli Pengajuan", "Keluhan",
                                    "Tanggal Pengajuan", "Tanggal Pemeriksaan"
                                ];
                                var data = sortedData.map((row, index) => [
                                    index + 1,
                                    row.no_rekap,
                                    row.nip_pasien,
                                    row.nama_pasien,
                                    row.divisi_pasien.replace(/&amp;/g,
                                        '&'),
                                    row.nama_dokter,
                                    row.nama_poli.replace(/&amp;/g, '&'),
                                    row.keluhan.replace(/&amp;/g, '&'),
                                    formatDate(row.tanggal_pengajuan),
                                    formatDate(row.tanggal_pemeriksaan)
                                ]);
                                doc.autoTable({
                                    head: [columns],
                                    body: data,
                                    startY: 60,
                                    styles: {
                                        halign: 'center',
                                        fontSize: 8
                                    },
                                    headStyles: {
                                        halign: 'center',
                                        fontSize: 8
                                    }
                                });
                                doc.save('Data_Rekam_Medis_Report.pdf');
                            }
                        });
                    }
                });
            });
            // Fungsi untuk format tanggal
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
        #TabelRekamMedis td,
        #TabelRekamMedis th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelRekamMedis thead th:first-child {
            cursor: default;
        }

        #TabelRekamMedis thead th:first-child::after,
        #TabelRekamMedis thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelRekamMedis td {
                white-space: normal;
                word-wrap: break-word;
            }

            .dtr-title {
                text-align: left;
                color: #99a1b7 !important;
            }
        }
    </style>
@endpush
