@extends('admin.template.main')

@section('title', 'Dashboard Admin - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-5 flex-column justify-content-center my-0">
                        Dashboard Admin</h1>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-profile-user fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2 mb-2" data-kt-countup="true"
                                        data-kt-countup-value="{{ $pasienCount }}">0</span>
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Pasien</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-file-up fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2 mb-2" data-kt-countup="true"
                                        data-kt-countup-value="{{ $pengajuanCount }}">0</span>
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Pengajuan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-syringe fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2 mb-2" data-kt-countup="true"
                                        data-kt-countup-value="{{ $dokterCount }}">0</span>
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Dokter</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-user-tick fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2 mb-2" data-kt-countup="true"
                                        data-kt-countup-value="{{ $aktifDokterCount }}">0</span>
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Dokter Aktif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-abstract-36 fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2 mb-2" data-kt-countup="true"
                                        data-kt-countup-value="{{ $poliCount }}">0</span>
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Poli</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-abstract-31 fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2 mb-2" data-kt-countup="true"
                                        data-kt-countup-value="{{ $divisiCount }}">0</span>
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Divisi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="col-xl-4">
                        <div class="card h-lg-100">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mb-2">
                                        <h3 class="fs-4 fw-bold">Selamat datang {{ auth()->user()->nama }}</h3>
                                        <span class="fw-semibold fs-6 opacity-75">Di sini Anda dapat melihat statistik
                                            utama dan mengelola berbagai aspek e-klinik.</span>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <img src="assets/media/svg/illustrations/easy/7.svg" class="h-200px h-lg-250px"
                                        alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card h-lg-100">
                            <div class="card-body">
                                <div id="performance"></div>
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
        document.addEventListener('DOMContentLoaded', function() {
            let data = @json($performance);

            // Fungsi untuk membuat rentang tanggal
            function createDateRange(startDate, endDate) {
                let dates = [];
                let currentDate = new Date(startDate);
                while (currentDate <= new Date(endDate)) {
                    dates.push(new Date(currentDate));
                    currentDate.setDate(currentDate.getDate() + 1);
                }
                return dates;
            }

            // Menemukan tanggal terawal dan terakhir dari data
            let startDate = new Date(data[0].date);
            let endDate = new Date(data[data.length - 1].date);

            // Membuat rentang tanggal
            let dateRange = createDateRange(startDate, endDate);

            // Membuat objek untuk memudahkan penggabungan
            let dataMap = {};
            data.forEach(item => {
                dataMap[new Date(item.date).getTime()] = item.pengajuan_count;
            });

            // Menggabungkan data dengan rentang tanggal, mengisi 0 jika tidak ada pengajuan
            let chartData = dateRange.map(date => {
                let time = date.getTime();
                return {
                    x: time,
                    y: dataMap[time] || 0
                };
            });

            // Mengurutkan data
            chartData.sort((a, b) => a.x - b.x);

            let options = {
                series: [{
                    name: 'Pengajuan',
                    data: chartData
                }],
                chart: {
                    height: 350,
                    width: 720,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                title: {
                    text: 'Pengajuan Laporan',
                    align: 'center',
                    margin: 10,
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold',
                        color: '#000'
                    }
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'datetime',
                    labels: {
                        format: 'dd MMM yyyy',
                        datetimeUTC: false
                    },
                    tickAmount: 'dataPoints',
                    tooltip: {
                        enabled: true,
                        formatter: function(val) {
                            return new Date(val).toLocaleDateString('en-GB');
                        }
                    }
                },
                yaxis: {
                    type: 'numeric', 
                    labels: {
                        formatter: function(value) {
                            return parseInt(value);
                        }
                    },
                    min: 0,
                },
                tooltip: {
                    x: {
                        format: 'dd MMM yyyy'
                    }
                },
                responsive: [{
                    breakpoint: 768,
                    options: {
                        chart: {
                            height: 300,
                            width: '100%',
                            toolbar: {
                                show: false
                            }
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#performance"), options);
            chart.render();
        });
    </script>
@endpush
