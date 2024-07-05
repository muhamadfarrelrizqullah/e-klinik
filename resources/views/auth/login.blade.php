<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../" />
    <title>Login - E Klinik PAL</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank">
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
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" action="{{ route('login-process') }}" method="POST" id="loginForm">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Selamat Datang, User!</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Silakan masuk ke akun Anda</div>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="number" placeholder="Masukkan 8 digit nip anda" name="nip"
                                    class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-8">
                                <input type="password" placeholder="Masukkan password anda" name="password"
                                    class="form-control bg-transparent" />
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <span class="indicator-label">Login</span>
                                    <span class="indicator-progress">Tunggu...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <div class="text-gray-500 text-center fw-semibold fs-6">Belum punya akun?
                                <a href="https://wa.me/089612747709" class="link-primary">Hubungi Admin</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
                    <div class="me-10">
                        <a href="{{ route('landing') }}"><img alt="Logo" src="assets/media/logos/bumn.png"
                                class="theme-light-show h-40px app-sidebar-logo-default" /></a>
                        <a href="{{ route('landing') }}"><img alt="Logo" src="assets/media/logos/bumn-dark.png"
                                class="theme-dark-show h-40px app-sidebar-logo-default" /></a>
                    </div>
                    <div class="d-flex fw-semibold text-primary fs-base gap-5">
                        <a>E Klinik - PT PAL Indonesia</a>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url(assets/media/misc/background.png)">
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <a href="{{ route('landing') }}" class="mb-0 mb-lg-12">
                        <img alt="Logo" src="assets/media/logos/pal-dark.png" class="h-60px h-lg-80px" />
                    </a>
                    <div class="d-none d-lg-block text-white fs-base text-center">
                        <a class="opacity-75-hover text-warning fw-bold me-1">PT PAL Indonesia (Persero) </a>mempunyai reputasi sebagai kekuatan utama untuk <br>
                        pengembangan industri maritim nasional. Sebagai usaha untuk mendukung pondasi <br>
                        bagi industri maritim, <a class="opacity-75-hover text-warning fw-bold me-1">PT PAL Indonesia (Persero) </a>bekerja keras untuk menyampaikan <br> 
                        pengetahuan, keterampilan dan teknologi untuk masyarakat luas industri maritim nasional. <br>
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
    <script src="assets/js/custom/authentication/sign-in/general.js"></script>
    <script>
        $(document).ready(function() {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            });

            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                let form = $(this);
                let formData = form.serialize();

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            swalMixinSuccess.fire({
                                icon: 'success',
                                title: 'Login Berhasil!',
                                text: 'Mengalihkan ke halaman dashboard...',
                            }).then(() => {
                                window.location.href = response.redirect;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Gagal!',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseJSON);
                        let errorMessage = 'Unknown error occurred. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            errorMessage = Object.values(xhr.responseJSON.errors).join('<br>');
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal!',
                            html: errorMessage,
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
