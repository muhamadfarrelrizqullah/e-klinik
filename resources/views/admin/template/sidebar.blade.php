<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-5" id="kt_app_sidebar_logo">
        <img alt="Logo" src="assets/media/logos/pal.png" class="h-30px app-sidebar-logo-default theme-light-show px-11" />
        <img alt="Logo" src="assets/media/logos/pal-dark.png" class="h-30px app-sidebar-logo-default theme-dark-show px-11" />
        <img alt="Logo" src="assets/media/logos/favicon.png" class="h-40px app-sidebar-logo-minimize theme-light-show" />
        <img alt="Logo" src="assets/media/logos/favicon-dark.png" class="h-40px app-sidebar-logo-minimize theme-dark-show" />
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-dashboard') ? 'active' : '' }}"
                            href="{{ route('admin-dashboard') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-triangle fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </div>
                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Master Data</span>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-pengajuan') ? 'active' : '' }}"
                            href="{{ route('admin-pengajuan') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-file-right fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Data Pengajuan</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-user') ? 'active' : '' }}"
                            href="{{ route('admin-user') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-profile-user fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Data User</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-divisi') ? 'active' : '' }}"
                            href="{{ route('admin-divisi') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-filter fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Data Divisi</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-poli') ? 'active' : '' }}"
                            href="{{ route('admin-poli') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-flag fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Data Poli</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-rating') ? 'active' : '' }}"
                            href="{{ route('admin-rating') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-like-shapes fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Data Rating</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-scanqr') ? 'active' : '' }}"
                            href="{{ route('admin-scanqr') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-fingerprint-scanning fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                </i>
                            </span>
                            <span class="menu-title">Scan QR</span>
                        </a>
                    </div>
                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Akun</span>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-profil') ? 'active' : '' }}"
                            href="{{ route('admin-profil') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-setting-4 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Edit Akun</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click">
                <span class="btn-label">Logout</span>
                <i class="ki-duotone ki-entrance-left btn-icon fs-2 m-0">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </button>
        </form>
    </div>
</div>
