@extends('apoteker.template.main')

@section('title', 'Data Resep - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Data Resep</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Resep</li>
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
                                <div class="fs-5 text-gray-900 fw-bold">Range Filter</div>
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
                                    <label class="form-label fw-semibold">Tanggal Dibuat:</label>
                                    <input type="date" id="filterTanggalDibuat" name="tanggal_dibuat"
                                        class="form-control form-control-sm me-2">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm btn-danger btn-active-light-primary me-2"
                                        data-kt-menu-dismiss="true">Reset</button>
                                </div>
                            </div>
                        </div>
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
                                    <table id="TabelResep"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Nama Dokter</th>
                                                <th>Keluhan</th>
                                                <th>Status</th>
                                                <th>Tanggal Dibuat</th>
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
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Tanggal Dibuat</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailTanggalDibuat" readonly>
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
                        <div id="detailObatContainer" class="pt-15"></div>
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
            tabel = $('#TabelResep').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('apoteker-dataresep') }}",
                    data: function(d) {
                        d.id_pasien = $('#filterNamaPasien').val();
                        d.id_dokter = $('#filterNamaDokter').val();
                        d.tanggal_dibuat = $('#filterTanggalDibuat').val();
                    }
                },
                order: [
                    [5, 'asc'],
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
                        data: 'nama_dokter',
                        name: 'nama_dokter',
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
                        data: 'status_resep',
                        name: 'status_resep',
                        orderable: true,
                        render: function(data, type, row) {
                            return `<span class="badge badge-light-primary">${data}</span>`;
                        }
                    },
                    {
                        data: 'tanggal_dibuat',
                        name: 'tanggal_dibuat',
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
                                <a onclick="modalDetail('${row.nama_pasien}', '${row.nip_pasien}', '${row.keluhan}', '${row.kode_resep}', '${row.status_resep}', '${row.tanggal_dibuat}')" class="btn btn-icon btn-light-primary btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="detailResep('${row.nama_obat}', '${row.jumlah_obat}')" class="btn btn-icon btn-light-warning btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetailResep">
                                    <i class="ki-duotone ki-capsule fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="downloadResep('${row.nama_pasien}', '${row.nip_pasien}', '${row.keluhan}', '${row.kode_resep}', '${row.status_resep}', '${row.tanggal_dibuat}', '${row.nama_obat}', '${row.jumlah_obat}', '${row.nama_dokter}')" class="btn btn-icon btn-light-success btn-xl">
                                    <i class="ki-duotone ki-file-down fs-2">
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

            // Event listener untuk filter nama pasien
            $('#filterNamaPasien').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter nama dokter
            $('#filterNamaDokter').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter tanggal dibuat
            $('#filterTanggalDibuat').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk reset filter
            document.querySelector('button[type="reset"]').addEventListener('click', function() {
                document.getElementById('filterNamaPasien').value = '';
                document.getElementById('filterNamaDokter').value = '';
                document.getElementById('filterTanggalDibuat').value = '';
                $('#TabelResep').DataTable().ajax.reload();
            });

            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });
        });

        // Pengambilan data modal detail
        function modalDetail(nama_pasien, nip_pasien, keluhan, kode_resep, status_resep, tanggal_dibuat) {
            $('#detailNamaPasien').val(nama_pasien);
            $('#detailNipPasien').val(nip_pasien);
            $('#detailKeluhan').val(keluhan);
            $('#detailKodeResep').val(kode_resep);
            $('#detailStatusResep').val(status_resep);

            let dateDibuat = new Date(tanggal_dibuat);
            let dayDibuat = String(dateDibuat.getDate()).padStart(2, '0');
            let monthDibuat = String(dateDibuat.getMonth() + 1).padStart(2, '0');
            let yearDibuat = String(dateDibuat.getFullYear());
            let formattedBirthdateDibuat = `${dayDibuat}/${monthDibuat}/${yearDibuat}`;
            $('#detailTanggalDibuat').val(formattedBirthdateDibuat);

            $('#modalDetail').modal('show');
        }

        // Pegambilan data resep
        function detailResep(nama_obat, jumlah_obat) {
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

        async function downloadResep(namaPasien, nipPasien, keluhan, kodeResep, statusResep, tanggalDibuat, namaObat,
            jumlahObat, namaDokter) {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Fetch logo perusahaan
            const response = await fetch('/logo-base64');
            const logoResponse = await response.json();
            const companyLogo = logoResponse.base64;

            // Konfigurasi layout halaman
            const pageWidth = doc.internal.pageSize.getWidth();
            const logoWidth = 50;
            const centerX = pageWidth / 2;

            // Menambahkan logo perusahaan
            doc.addImage(companyLogo, 'PNG', 15, 10, logoWidth, 10);
            doc.setFontSize(16);
            doc.setFont("helvetica", "bold");
            doc.text(`Kode: ${kodeResep}`, 15, 30);

            // Menambahkan judul
            doc.setFontSize(20);
            doc.setFont("helvetica", "bold");
            const title = `DETAIL RESEP DOKTER`;
            const textWidth = doc.getTextWidth(title);
            const textX = centerX - textWidth / 2;
            const textY = 50;
            doc.text(title, textX, textY);

            // Menambahkan garis bawah
            const lineWidth = textWidth;
            const lineY = textY + 2;
            doc.line(textX, lineY, textX + lineWidth, lineY);

            // Menambahkan detail resep
            doc.setFontSize(12);
            doc.setFont("helvetica", "normal");
            let posY = 70;
            const lineHeight = 10;
            const labelWidth = 60;

            // Fungsi helper untuk menambahkan teks
            function addText(label, text) {
                doc.text(label, 15, posY);
                doc.text(text, 15 + labelWidth, posY);
                posY += lineHeight;
            }

            // Mengubah tanggal_dibuat ke format dd/mm/yyyy
            const formattedTanggalDibuat = new Date(tanggalDibuat).toLocaleDateString('id-ID', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
            });

            // Menambahkan informasi resep
            addText(`NIP Pasien`, `: ${nipPasien}`);
            addText(`Nama Pasien`, `: ${namaPasien}`);
            addText(`Keluhan`, `: ${keluhan}`);
            addText(`Status Resep`, `: ${statusResep}`);
            addText(`Tanggal Dibuat`, `: ${formattedTanggalDibuat}`);

            // Memproses nama_obat dan jumlah_obat menjadi array
            const listNamaObat = namaObat.split(',').map(item => item.trim());
            const listJumlahObat = jumlahObat.split(',').map(item => item.trim());

            // Menambahkan tabel resep
            posY += 10;
            doc.setFont("helvetica", "bold");
            doc.text(`Daftar Resep:`, 15, posY);
            posY += lineHeight;

            // Header tabel
            doc.text(`No`, 15, posY);
            const namaObatX = 50;
            doc.text(`Nama Obat`, namaObatX, posY, {
                align: 'center'
            });
            doc.text(`Jumlah`, 120, posY, {
                align: 'center'
            });
            posY += lineHeight;

            // Menambahkan isi tabel dengan jarak antar kolom
            doc.setFont("helvetica", "normal");
            listNamaObat.forEach((obat, index) => {
                const jumlah = listJumlahObat[index] || "-";
                doc.text(`${index + 1}`, 15, posY);
                doc.text(obat, namaObatX, posY, {
                    align: 'center'
                });
                doc.text(jumlah, 120, posY, {
                    align: 'center'
                });
                posY += lineHeight;
            });

            // Menambahkan footer
            const currentDate = new Date();
            const tanggalHariIni = currentDate.toLocaleDateString('id-ID', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
            });
            doc.text(`${tanggalHariIni}`, 150, 190);
            doc.text(`Dokter yang memeriksa`, 140, 200);
            doc.text(`${namaDokter}`, 150, 230);

            // Unduh file PDF
            doc.save(`Data_Resep_${namaPasien}_${kodeResep}.pdf`);
        }
    </script>
@endpush

@push('style')
    <style>
        #bt-download,
        #TabelResep td,
        #TabelResep th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelResep thead th:first-child {
            cursor: default;
        }

        #TabelResep thead th:first-child::after,
        #TabelResep thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelResep td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
