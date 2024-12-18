<!DOCTYPE html>

<html lang="en">

<head>
    <title>Berita - E Klinik PAL</title>
    <style>
        @media (max-width: 768px) {
            #background {
                height: auto !important;
            }
        }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/datatables.net/jquery.dataTables.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/custom/datatables.responsive/responsive.dataTables.min.css') }}">
    <style>
        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .btn-back i {
            margin-right: 8px;
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <h2 class="card-title">{{ $berita->judul }}</h2>
                                <p class="card-text fs-4">{{ $berita->isi }}</p>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('storage/covers/' . $berita->cover) }}"
                                        class="card-img-top img-fluid" alt="Cover Image"
                                        style="width: 400px; height: 150px;">
                                </div>
                                <p class="card-text fw-bold fs-7 mt-8">Deskripsi:</p>
                                <p class="card-text text-center text-muted fs-7">{{ $berita->deskripsi }}</p>
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
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/landing.js') }}"></script>
    <script src="{{ asset('assets/js/custom/pages/pricing/general.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/fontawesome/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables.responsive/dataTables.responsive.js') }}"></script>

</body>

</html>
