<!DOCTYPE html>

<html lang="en">

<head>
    <title>Antrian Pemeriksaan - E Klinik PAL</title>
    <style>
        @media (max-width: 768px) {
            #background {
                height: auto !important;
            }
        }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/plugins/custom/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="assets/plugins/custom/datatables.net/jquery.dataTables.css">
    <link rel="stylesheet" href="assets/plugins/custom/datatables.responsive/responsive.dataTables.min.css">
    <style>
        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .btn-back i {
            margin-right: 8px;
        }

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

</head>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }

        function goBack() {
            window.history.back();
        }
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="landing-header container-xxl">
            <button onclick="goBack()" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Kembali
            </button>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-body p-lg-17">
                        <div class="position-relative mb-17">
                            <div class="overlay overlay-show">
                                <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-250px"
                                    style="background-image:url('assets/media/svg/illustrations/pal-2.png')">
                                </div>
                                <div class="overlay-layer rounded bg-black" style="opacity: 0.4"></div>
                            </div>
                            <div class="position-absolute text-white mb-8 ms-10 bottom-0">
                                <h3 class="text-white fs-2qx fw-bold mb-3 m">Klinik Pratama PT PAL Indonesia</h3>
                                <div class="fs-5 fw-semibold">Pilih jadwal pemeriksaan sesuai dengan tanggal pemeriksaan yang Anda input</div>
                                <select id="selectTanggal" class="form-select form-select-solid mt-4"> </select>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-lg-row mb-17">
                            <div class="flex-lg-row-fluid me-0 me-lg-20">
                                <div class="table-responsive mb-15">
                                    <table id="TabelPengajuan"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Keluhan</th>
                                                <th>Poli</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Tanggal Pemeriksaan</th>
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
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
    <script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
    <script src="assets/js/custom/landing.js"></script>
    <script src="assets/js/custom/pages/pricing/general.js"></script>
    <script src="assets/plugins/custom/fontawesome/feather.min.js"></script>
    <script src="assets/plugins/custom/datatables.net/jquery.dataTables.js"></script>
    <script src="assets/plugins/custom/datatables.net-bs5/dataTables.bootstrap5.js"></script>
    <script src="assets/plugins/custom/datatables.responsive/dataTables.responsive.js"></script>
    <script>
        // Inisialisasi datatable
        $(document).ready(function() {
            // Mengisi select option dengan 7 hari ke depan
            const selectTanggal = $('#selectTanggal');
            const today = new Date();
            for (let i = 0; i < 7; i++) {
                const date = new Date();
                date.setDate(today.getDate() + i);
                const day = date.getDate().toString().padStart(2, '0');
                const month = (date.getMonth() + 1).toString().padStart(2, '0');
                const year = date.getFullYear();
                const formattedDate = `${year}-${month}-${day}`;
                selectTanggal.append(new Option(formattedDate, formattedDate));
            }

            // Set default value to today
            selectTanggal.val(today.toISOString().split('T')[0]);

            tabel = $('#TabelPengajuan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('antrian-data') }}",
                    data: function(d) {
                        d.tanggal = $('#selectTanggal').val();
                    }
                },
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
                    // {
                    //     data: 'nama_dokter',
                    //     name: 'nama_dokter',
                    //     orderable: true,
                    //     render: function(data, type, row, meta) {
                    //         return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                    //     }
                    // },
                    {
                        data: 'keluhan',
                        name: 'keluhan',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'nama_poli',
                        name: 'nama_poli',
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

            // Reload tabel ketika tanggal berubah
            $('#selectTanggal').change(function() {
                tabel.ajax.reload();
            });

            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });
        });
    </script>

</body>

</html>
