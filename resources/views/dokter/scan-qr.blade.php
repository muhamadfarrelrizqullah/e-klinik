@extends('dokter.template.main')

@section('title', 'Scan QR - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row gy-5 g-xl-10">
                    <div class="col-xl-8 mb-xl-10 h-100">
                        <div class="card">
                            <div class="card-header cursor-pointer">
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0 fs-8">Scan QR Code</h3>
                                </div>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div id="reader" class="mb-4 h-screen"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-xl-10 h-100">
                        <div class="card h-md-100" dir="ltr">
                            <div class="card-body d-flex flex-column flex-center">
                                <div class="mb-2">
                                    <h1 class="fw-semibold text-gray-800 text-center lh-lg">Update Status
                                        <span class="fw-bolder">Pengajuan Pemeriksaan</span>
                                        <br /> Dengan QR Code.
                                    </h1>
                                    <div class="py-10 text-center">
                                        <img src="assets/media/svg/illustrations/easy/3.svg"
                                            class="theme-light-show w-200px" alt="" />
                                        <img src="assets/media/svg/illustrations/easy/3-dark.svg"
                                            class="theme-dark-show w-200px" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/plugins/custom/html5-qrcode/html5-qrcode.min.js" type="text/javascript"></script>
    <script>
        // handler ketika scan sukses
        function onScanSuccess(decodedText, decodedResult) {
            const urlSegments = decodedText.split('/');
            const lastSegment = urlSegments.pop();

            console.log(lastSegment);
            fetch(`{{ route('get-rekap-data', ':id') }}`.replace(':id', lastSegment))
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Isi data ke dalam modal
                        document.getElementById('detailNipPasien').value = data.data.nip_pasien || '';
                        document.getElementById('detailNamaPasien').value = data.data.nama_pasien || '';
                        document.getElementById('detailNipDokter').value = data.data.nip_dokter || '';
                        document.getElementById('detailNamaDokter').value = data.data.nama_dokter || '';
                        document.getElementById('detailKeluhan').value = data.data.keluhan || '';
                        document.getElementById('detailNamaPoli').value = data.data.nama_poli || '';
                        document.getElementById('detailTanggalPemeriksaan').value = formatDate(data.data
                            .tanggal_pemeriksaan || '');
                        document.getElementById('detailObat').value = data.data.nama_obat || '';

                        function formatDate(dateString) {
                            if (!dateString) return '';
                            const [year, month, day] = dateString.split('-');
                            return `${day}/${month}/${year}`;
                        }

                        const modal = new bootstrap.Modal(document.getElementById('modalDetail'));
                        modal.show();
                    } else {
                        Swal.fire('Error', data.message || 'Gagal mengambil data.', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Error', 'Terjadi kesalahan saat mengambil data.', 'error');
                });
        }

        // handler ketika scan error
        function onScanFailure(error) {
            // console.warn(`Code scan error = ${error}`);
        }

        // inisialisasi html5-qrcodescanner
        const html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            false
        );
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
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
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Keluhan</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="detailKeluhan"
                                readonly>
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
                                    <span>Tanggal Pemeriksaan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailTanggalPemeriksaan" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Obat</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="detailObat"
                                readonly>
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
