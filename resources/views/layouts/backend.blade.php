<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>BrewDash - Brew something amazing!</title>

    <meta name="description"
          content="BrewDash - Collaboration between SsBrewtech and BrewDash to provide a brewing dashboard">
    <meta name="author" content="SsBrewtech">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Fonts and Styles -->
    @yield('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" href="{{ mix('css/dashmix.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" href="{{ mix('css/themes/xwork.css') }}"> -->
@yield('css_after')

<!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
<body>
<!-- Page Container -->
<!--
    Available classes for #page-container:

GENERIC

    'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

SIDEBAR & SIDE OVERLAY

    'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
    'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
    'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
    'sidebar-dark'                              Dark themed sidebar

    'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
    'side-overlay-o'                            Visible Side Overlay by default

    'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

    'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

HEADER

    ''                                          Static Header if no class is added
    'page-header-fixed'                         Fixed Header


Footer

    ''                                          Static Footer if no class is added
    'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

HEADER STYLE

    ''                                          Classic Header style if no class is added
    'page-header-dark'                          Dark themed Header
    'page-header-glass'                         Light themed Header with transparency by default
                                                (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
    'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

MAIN CONTENT LAYOUT

    ''                                          Full width Main Content if no class is added
    'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
    'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
-->
<div id="page-container"
     class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
    <!-- Side Overlay-->
    <aside id="side-overlay">
        <!-- Side Header -->
        <div class="bg-image" style="background-image: url('{{ asset('media/various/bg_side_overlay_header.jpg') }}');">

            <div class="bg-primary-op">
                <div class="content-header">
                    <!-- User Avatar -->
                    <a class="img-link mr-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar48" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <div class="ml-2">
                        <a class="text-white font-w600" href="javascript:void(0)">George Taylor</a>
                        <div class="text-white-75 font-size-sm font-italic">Full Stack Developer</div>
                    </div>
                    <!-- END User Info -->

                    <!-- Close Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="ml-auto text-white" href="javascript:void(0)" data-toggle="layout"
                       data-action="side_overlay_close">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Side Overlay -->
                </div>
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
            <p>
                Content..
            </p>
        </div>
        <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="bg-header-dark">
            <div class="content-header bg-white-10">
                <!-- Logo -->
                <a class="link-fx font-w600 font-size-lg text-white" href="/">
                    <span class="text-white-75">Brew</span><span class="text-white">Dash</span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <!-- Toggle Sidebar Style -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                    <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler"
                       data-class="fa-toggle-off fa-toggle-on" data-toggle="layout" data-action="sidebar_style_toggle"
                       href="javascript:void(0)">
                        <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                    </a>
                    <!-- END Toggle Sidebar Style -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close"
                       href="javascript:void(0)">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="{{url("/home")}}">
                        <i class="nav-main-link-icon fa fa-paper-plane"></i>
                        <span class="nav-main-link-name">Overview</span>
                        <span class="nav-main-link-badge badge badge-pill badge-success">2</span>
                    </a>
                </li>
                <li class="nav-main-heading">My Devices</li>
                <li class="nav-main-item open">
                    <a class="nav-main-link" href="{{route('devices.index')}}">
                        <i class="nav-main-link-icon fa fa-list-alt"></i>
                        <span class="nav-main-link-name">Manage Devices</span>
                    </a>
                </li>
                {{--<li class="nav-main-item open">--}}
                {{--<a class="nav-main-link" href="/home">--}}
                {{--<i class="nav-main-link-icon fa fa-server"></i>--}}
                {{--<span class="nav-main-link-name">My Servers</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-main-item open">--}}
                {{--<a class="nav-main-link" href="/home">--}}
                {{--<i class="nav-main-link-icon fa fa-desktop"></i>--}}
                {{--<span class="nav-main-link-name">Server Logs</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-main-heading">Device Setup</li>--}}
                {{--<li class="nav-main-item open">--}}
                {{--<a class="nav-main-link" href="/configurator">--}}
                {{--<i class="nav-main-link-icon fa fa-plus-square"></i>--}}
                {{--<span class="nav-main-link-name">Add Device</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-main-heading">Tools</li>--}}
                {{--<li class="nav-main-item open">--}}
                {{--<a class="nav-main-link" href="/mqtt">--}}
                {{--<i class="nav-main-link-icon fa fa-server"></i>--}}
                {{--<span class="nav-main-link-name">MQTT Client Tool</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-main-item open">--}}
                {{--<a class="nav-main-link" href="/schedule">--}}
                {{--<i class="nav-main-link-icon fa fa-beer"></i>--}}
                {{--<span class="nav-main-link-name">Example Schedule</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-main-item open">--}}
                {{--<a class="nav-main-link" href="/calendar">--}}
                {{--<i class="nav-main-link-icon fa fa-calendar-alt"></i>--}}
                {{--<span class="nav-main-link-name">Sample Calendar</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-main-heading">More</li>--}}
                {{--<li class="nav-main-item open">--}}
                {{--<a class="nav-main-link" href="/">--}}
                {{--<i class="nav-main-link-icon fa fa-lemon"></i>--}}
                {{--<span class="nav-main-link-name">Landing</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-main-heading">Temp Pages</li>--}}
                {{--<li class="nav-main-item{{ request()->is('examples/*') ? ' open' : '' }}">--}}
                {{--<a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"--}}
                {{--aria-expanded="true" href="#">--}}
                {{--<i class="nav-main-link-icon fa fa-lightbulb"></i>--}}
                {{--<span class="nav-main-link-name">Examples</span>--}}
                {{--</a>--}}
                {{--<ul class="nav-main-submenu">--}}
                {{--<li class="nav-main-item">--}}
                {{--<a class="nav-main-link{{ request()->is('examples/plugin') ? ' active' : '' }}"--}}
                {{--href="/examples/plugin">--}}
                {{--<span class="nav-main-link-name">Plugin</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-main-item">--}}
                {{--<a class="nav-main-link{{ request()->is('examples/blank') ? ' active' : '' }}"--}}
                {{--href="/examples/blank">--}}
                {{--<span class="nav-main-link-name">Blank</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                <li class="nav-main-heading">Profiles</li>
                <li class="nav-main-item open">
                    <a class="nav-main-link" href="{{route('ferments.index')}}">
                        <i class="nav-main-link-icon fa fa-beer"></i>
                        <span class="nav-main-link-name">Ferment</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div>
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->

                <!-- Open Search Section -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                    <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search</span>
                </button>
                <!-- END Open Search Section -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                    @guest
                        <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{ __('Logout') }}</span>
                            <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                        </button>
                    @else
                        <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{ Auth::user()->name }}</span>
                            <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                User Options
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item" href="{{url('/profile')}}">
                                    <i class="far fa-fw fa-user mr-1"></i> Profile
                                </a>
                                {{--<a class="dropdown-item d-flex align-items-center justify-content-between"--}}
                                {{--href="javascript:void(0)">--}}
                                {{--<span><i class="far fa-fw fa-bell mr-1"></i> Notifications</span>--}}
                                {{--<span class="badge badge-primary">3</span>--}}
                                {{--</a>--}}
                                <div role="separator" class="dropdown-divider"></div>

                                <!-- Toggle Side Overlay -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            {{--<a class="dropdown-item" href="javascript:void(0)" data-toggle="layout"--}}
                            {{--data-action="side_overlay_toggle">--}}
                            {{--<i class="far fa-fw fa-building mr-1"></i> Settings--}}
                            {{--</a>--}}
                            <!-- END Side Overlay -->

                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
                <!-- END User Dropdown -->

                <!-- Notifications Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-dual" id="page-header-notifications-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="badge badge-secondary badge-pill">0</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                         aria-labelledby="page-header-notifications-dropdown">
                        <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                            Notifications
                        </div>
                        {{--<ul class="nav-items my-2">--}}
                        {{--<li>--}}
                        {{--<a class="text-dark media py-2" href="javascript:void(0)">--}}
                        {{--<div class="mx-3">--}}
                        {{--<i class="fa fa-fw fa-check-circle text-success"></i>--}}
                        {{--</div>--}}
                        {{--<div class="media-body font-size-sm pr-2">--}}
                        {{--<div class="font-w600">App was updated to v5.6!</div>--}}
                        {{--<div class="text-muted font-italic">3 min ago</div>--}}
                        {{--</div>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="text-dark media py-2" href="javascript:void(0)">--}}
                        {{--<div class="mx-3">--}}
                        {{--<i class="fa fa-fw fa-user-plus text-info"></i>--}}
                        {{--</div>--}}
                        {{--<div class="media-body font-size-sm pr-2">--}}
                        {{--<div class="font-w600">New Subscriber was added! You now have 2580!</div>--}}
                        {{--<div class="text-muted font-italic">10 min ago</div>--}}
                        {{--</div>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="text-dark media py-2" href="javascript:void(0)">--}}
                        {{--<div class="mx-3">--}}
                        {{--<i class="fa fa-fw fa-times-circle text-danger"></i>--}}
                        {{--</div>--}}
                        {{--<div class="media-body font-size-sm pr-2">--}}
                        {{--<div class="font-w600">Server backup failed to complete!</div>--}}
                        {{--<div class="text-muted font-italic">30 min ago</div>--}}
                        {{--</div>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="text-dark media py-2" href="javascript:void(0)">--}}
                        {{--<div class="mx-3">--}}
                        {{--<i class="fa fa-fw fa-exclamation-circle text-warning"></i>--}}
                        {{--</div>--}}
                        {{--<div class="media-body font-size-sm pr-2">--}}
                        {{--<div class="font-w600">You are running out of space. Please consider upgrading--}}
                        {{--your plan.--}}
                        {{--</div>--}}
                        {{--<div class="text-muted font-italic">1 hour ago</div>--}}
                        {{--</div>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="text-dark media py-2" href="javascript:void(0)">--}}
                        {{--<div class="mx-3">--}}
                        {{--<i class="fa fa-fw fa-plus-circle text-primary"></i>--}}
                        {{--</div>--}}
                        {{--<div class="media-body font-size-sm pr-2">--}}
                        {{--<div class="font-w600">New Sale! + $30</div>--}}
                        {{--<div class="text-muted font-italic">2 hours ago</div>--}}
                        {{--</div>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        <div class="p-2 border-top">
                            <a class="btn btn-light btn-block text-center" href="javascript:void(0)">
                                <i class="fa fa-fw fa-eye mr-1"></i> View All
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END Notifications Dropdown -->

                <!-- Toggle Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            {{--<button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">--}}
            {{--<i class="far fa-fw fa-list-alt"></i>--}}
            {{--</button>--}}
            <!-- END Toggle Side Overlay -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-primary">
            <div class="content-header">
                <form class="w-100" action="{{url('/home')}}" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-primary" data-toggle="layout"
                                    data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="Search or hit ESC.."
                               id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-darker">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
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
        <div class="content py-0">
            <div class="row font-size-sm">
                <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                    Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600"
                                                                               href="http://connelgroup.com"
                                                                               target="_blank">Connel</a>
                </div>
                <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                    <a class="font-w600" href="http://ssbrewtech.com" target="_blank">SsBrewtech</a> &copy; <span
                            data-toggle="year-copy">2018</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Dashmix Core JS -->
<script src="{{ mix('js/dashmix.app.js') }}"></script>

<!-- Laravel Scaffolding JS -->
<script src="{{ mix('js/laravel.app.js') }}"></script>

@yield('js')
</body>
</html>
