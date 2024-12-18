<!DOCTYPE html>

<html lang="en">

<head>
    <title>Landing - E Klinik PAL</title>
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
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="mb-10" id="home">
            <div class="bgi-no-repeat bgi-position-x-center bgi-position-y-bottom landing-dark-bg mb-10" id="background"
                style="background-image: url(assets/media/svg/illustrations/pal-3.png); background-size: cover; height: 100vh;">
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center flex-equal">
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                    id="kt_landing_menu_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-2hx">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                                <a href="{{ route('landing') }}">
                                    <img alt="Logo" src="assets/media/logos/pal-dark.png"
                                        class="logo-default h-25px h-lg-30px" />
                                    <img alt="Logo" src="assets/media/logos/pal.png"
                                        class="logo-sticky h-20px h-lg-25px" />
                                </a>
                            </div>
                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true"
                                    data-kt-drawer-name="landing-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                                        id="kt_landing_menu">
                                        <div class="menu-item">
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body"
                                                data-kt-scroll-toggle="true"
                                                data-kt-drawer-dismiss="true">{{ $companyProfiles->main_page_header }}</a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works"
                                                data-kt-scroll-toggle="true"
                                                data-kt-drawer-dismiss="true">{{ $companyProfiles->second_page_header }}</a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#achievements"
                                                data-kt-scroll-toggle="true"
                                                data-kt-drawer-dismiss="true">{{ $companyProfiles->third_page_header }}</a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#portfolio"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Galeri</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-equal text-end ms-1">
                                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                        <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mt-10 mb-6">
                            {{ $companyProfiles->main_page_title }}
                            <br />Solusi Kesehatan Digital Anda!
                        </h1>
                        {{-- <a href="{{ route('antrian') }}" class="btn btn-primary">Cek Antrian</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-n0 mb-lg-n60 z-index-2">
            <div class="container">
                <div class="text-center mb-17">
                    <h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works"
                        data-kt-scroll-offset="{default: 100, lg: 150}">{{ $companyProfiles->second_page_title }}</h3>
                    <div class="fs-5 text-muted fw-bold">{{ $companyProfiles->second_page_desc }}</div>
                </div>
                <div class="row w-100 gy-10 mb-md-20 justify-content-center">
                    @foreach ($dataDokter as $dokter)
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="card shadow-sm">
                                <img src="assets/media/illustrations/sigma-1/16.png" class="card-img-top"
                                    alt="Dokter Image">
                                <div class="card-body text-center">
                                    <h5 class="card-title fs-5 fs-lg-3 fw-bold text-gray-900">{{ $dokter->nama }}</h5>
                                    <div class="mb-2">
                                        @foreach (explode(',', $dokter->poli_nama) as $poli)
                                            <span class="badge badge-light-primary">{{ trim($poli) }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-0">
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <div class="pb-15 pt-10 landing-dark-bg">
                <div class="container">
                    <div class="text-center mt-15 mb-18" id="achievements"
                        data-kt-scroll-offset="{default: 100, lg: 150}">
                        <h3 class="fs-2hx text-white fw-bold mb-5">{{ $companyProfiles->third_page_title }}</h3>
                        <div class="fs-5 text-muted fw-bold">{{ $companyProfiles->third_page_desc }}</div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($dataBerita as $berita)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                <div class="card shadow-sm border-0">
                                    <img src="{{ asset('assets/media/illustrations/sigma-1/16.png') }}" class="card-img-top"
                                        alt="Cover Image">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark">{{ $berita->judul }}</h5>
                                        <p class="card-text text-muted">{{ $berita->deskripsi }}</p>
                                        <a href="{{ route('index-berita', $berita->id) }}" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                        fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <div class=" position-relative z-index-2">
            <div class="container">
                <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                    <div class="card-body p-lg-20">
                        <div class="text-center mb-10 mb-lg-10">
                            <h3 class="fs-2hx text-gray-900 mb-5" id="portfolio"
                                data-kt-scroll-offset="{default: 100, lg: 250}">Galeri</h3>
                        </div>
                        <div class="row g-10">
                            <div class="col-lg-6">
                                <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects"
                                    href="assets/media/stock/600x600/img-88.jpg">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                        style="background-image:url('assets/media/stock/600x600/img-88.jpg')">
                                    </div>
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="ki-duotone ki-eye fs-3x text-white">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="row g-10 mb-10">
                                    <div class="col-lg-6">
                                        <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                            href="assets/media/stock/600x600/img-89.jpg">
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                style="background-image:url('assets/media/stock/600x600/img-89.jpg')">
                                            </div>
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                            href="assets/media/stock/600x600/img-90.jpg">
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                style="background-image:url('assets/media/stock/600x600/img-90.jpg')">
                                            </div>
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                    href="assets/media/stock/600x400/img-81.jpg">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                        style="background-image:url('assets/media/stock/600x400/img-81.jpg')">
                                    </div>
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="ki-duotone ki-eye fs-3x text-white">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-0">
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <div class="landing-dark-bg pt-20">
            <div class="container">
                <div class="row py-10 py-lg-20">
                    <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                        <div
                            class="rounded landing-dark-border p-9 mb-10 ml-auto d-flex flex-column align-items-center">
                            <h2 class="text-white mb-6">Kunjungi Kami</h2>
                            <div class="position-relative w-100"
                                style="max-width: 450px; height: 0; padding-bottom: 56.25%;">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.309608484835!2d112.73898467475983!3d-7.205475092800067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9fdd43a47e3%3A0xe81dae64f37a97ee!2sPT%20PAL%20Indonesia%20(Persero)!5e0!3m2!1sid!2sid!4v1721619878386!5m2!1sid!2sid"
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
                                    allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-16">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex fw-semibold flex-column me-20">
                                <h4 class="fw-bold text-gray-500 mb-6">Selengkapnya</h4>
                                <a class="text-white opacity-50 text-hover-primary fs-5 mb-6">FAQ</a>
                                <a class="text-white opacity-50 text-hover-primary fs-5 mb-6">Dokumentasi</a>
                                <a class="text-white opacity-50 text-hover-primary fs-5 mb-6">Video Tutorial</a>
                                <a class="text-white opacity-50 text-hover-primary fs-5 mb-6">Forum</a>
                                <a class="text-white opacity-50 text-hover-primary fs-5">Blog</a>
                            </div>
                            <div class="d-flex fw-semibold flex-column ms-lg-20">
                                <h4 class="fw-bold text-gray-500 mb-6">Sosial Media</h4>
                                <a href="https://www.facebook.com/HumasPTPAL" class="mb-6">
                                    <img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2"
                                        alt="" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                                </a>
                                <a href="https://twitter.com/PTPAL_INDONESIA" class="mb-6">
                                    <img src="assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2"
                                        alt="" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
                                </a>
                                <a href="https://www.instagram.com/ptpal_indonesia" class="mb-6">
                                    <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2"
                                        alt="" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="landing-dark-separator"></div>
            <div class="container">
                <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                    <div class="d-flex align-items-center order-2 order-md-1">
                        <a href="{{ route('landing') }}">
                            <img alt="Logo" src="assets/media/logos/pal-dark.png" class="h-15px h-md-20px" />
                        </a>
                        <span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1">&copy;
                            2024 Pt. PAL Indonesia</span>
                    </div>
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                        <li class="menu-item">
                            <a class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item mx-5">
                            <a class="menu-link px-2">Support</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
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
</body>

</html>
