<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title> @ &amp; APP</title>

        <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ mix('/css/oneui.css') }}">

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/amethyst.css') }}"> -->
        @yield('css_after')

        <!-- Scripts -->
        <!-- <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script> -->
    </head>
    <body>
          <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header">
                    <!-- Logo -->
                    <a class="font-semibold text-dual" href="/">
                        <span class="smini-visible">
                            <i class="fa fa-circle-notch text-primary"></i>
                        </span>
                        <span class="smini-hide fs-5 tracking-wider"> <span class="fw-normal">Menú</span></span>
                    </a>
                    <!-- END Logo -->

                    <!-- Extra -->
                    <div>
                        <!-- Dark Mode -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle" href="javascript:void(0)">
                            <i class="far fa-moon"></i>
                        </a>
                        <!-- END Dark Mode -->


                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Extra -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- Side Navigation -->
                    <div class="content-side">

                        @php
                        session();
                        $role_id = session('user') ? session('user')->role_id : null ;
                        @endphp

                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                                    <i class="nav-main-link-icon si si-home"></i>
                                    <span class="nav-main-link-name">Inicio</span>
                                </a>
                            </li>
                        </ul>

                        @if($role_id==1 || $role_id==3)
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/requisitionForm">
                                    <i class="nav-main-link-icon si si-magic-wand"></i>
                                    <span class="nav-main-link-name">Crear</span>
                                </a>
                            </li>
                        </ul>
                        @endif

                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/requisitions">
                                    <i class="nav-main-link-icon si si-layers"></i>
                                    <span class="nav-main-link-name">Solicitudes</span>
                                </a>
                            </li>
                        </ul>

                        @if($role_id==1)
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/users">
                                    <i class="nav-main-link-icon si si-users"></i>
                                    <span class="nav-main-link-name">Usuarios</span>
                                </a>
                            </li>
                        </ul>
                        @endif
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/calendar">
                                    <i class="nav-main-link-icon si si-calendar"></i>
                                    <span class="nav-main-link-name">Calendario</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Toggle Mini Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                            <i class="fa fa-fw fa-ellipsis-v"></i>
                        </button>
                        <!-- END Toggle Mini Sidebar -->

                        <!-- Open Search Section (visible on smaller screens) -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-sm btn-alt-secondary d-md-none" data-toggle="layout" data-action="header_search_on">
                            <i class="fa fa-fw fa-search"></i>
                        </button>
                        <!-- END Open Search Section -->

                        <!-- Search Form (visible on larger screens) -->
                        <!-- <form class="d-none d-md-inline-block" action="/dashboard" method="POST">
                            @csrf
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-alt" placeholder="Search.." id="page-header-search-input2" name="page-header-search-input2">
                                <span class="input-group-text border-0">
                                    <i class="fa fa-fw fa-search"></i>
                                </span>
                            </div>
                        </form> -->
                        <!-- END Search Form -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- User Dropdown -->

                        <div class="dropdown d-inline-block ms-2">
                            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle" src="{{ asset('media/avatars/avatar.jpg') }}" alt="Header Avatar" style="width: 21px;">
                                <span class="d-none d-sm-inline-block ms-2">{{$userSession->name}}</span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('media/avatars/avatar.jpg') }}" alt="">
                                    <p class="mt-2 mb-0 fw-medium">{{$userSession->name}}</p>
                                    <p class="mb-0 text-muted fs-sm fw-medium">{{$userSession->position}}</p>
                                </div>

                                <div role="separator" class="dropdown-divider m-0"></div>
                                <div class="p-2">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="/logout">
                                        <span class="fs-sm fw-medium">Salir</span>
                                    </a>
                                </div>
                            </div>
                        </div>                         
                        <!-- END User Dropdown -->

                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-body-extra-light">
                    <div class="content-header">
                        <form class="w-100" action="/dashboard" method="POST">
                            @csrf
                            <div class="input-group">
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                   </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-body-extra-light">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="row fs-sm">
                        <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                            <!-- Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://1.envato.market/ydb" target="_blank">pixelcave</a> -->
                        </div>
                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                            <a class="fw-semibold" href="#" target="_blank">APP</a> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!--
            OneUI JS

            Core libraries and functionality
        -->
        <script src="{{ mix('js/oneui.app.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->

        @yield('js_after')
    </body>
</html>
