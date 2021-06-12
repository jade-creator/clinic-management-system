<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles
        <!-- CoreUI CSS -->
        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" integrity="sha512-n+g8P11K/4RFlXnx2/RW1EZK25iYgolW6Qn7I0F96KxJibwATH3OoVCQPh/hzlc4dWAwplglKX8IVNVMWUUdsw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body class="c-app">
        <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
            <div class="c-sidebar-brand d-lg-down-none">
                <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                    <use xlink:href="assets/brand/coreui.svg#full"></use>
                </svg>
                <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
                    <use xlink:href="assets/brand/coreui.svg#signet"></use>
                </svg>
            </div>
            <ul class="c-sidebar-nav">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="index.html">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                        </svg> Dashboard<span class="badge badge-info">NEW</span></a></li>
                <li class="c-sidebar-nav-title">Theme</li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="colors.html">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                        </svg> Colors</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="typography.html">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                        </svg> Typography</a></li>
                <li class="c-sidebar-nav-title">Components</li>
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a
                        class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg> Base</a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span
                                    class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/cards.html"><span
                                    class="c-sidebar-nav-icon"></span> Cards</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/carousel.html"><span
                                    class="c-sidebar-nav-icon"></span> Carousel</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/collapse.html"><span
                                    class="c-sidebar-nav-icon"></span> Collapse</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/forms.html"><span
                                    class="c-sidebar-nav-icon"></span> Forms</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/jumbotron.html"><span
                                    class="c-sidebar-nav-icon"></span> Jumbotron</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/list-group.html"><span
                                    class="c-sidebar-nav-icon"></span> List group</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/navs.html"><span
                                    class="c-sidebar-nav-icon"></span> Navs</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/pagination.html"><span
                                    class="c-sidebar-nav-icon"></span> Pagination</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/popovers.html"><span
                                    class="c-sidebar-nav-icon"></span> Popovers</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/progress.html"><span
                                    class="c-sidebar-nav-icon"></span> Progress</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/scrollspy.html"><span
                                    class="c-sidebar-nav-icon"></span> Scrollspy</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/switches.html"><span
                                    class="c-sidebar-nav-icon"></span> Switches</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tables.html"><span
                                    class="c-sidebar-nav-icon"></span> Tables</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tabs.html"><span
                                    class="c-sidebar-nav-icon"></span> Tabs</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tooltips.html"><span
                                    class="c-sidebar-nav-icon"></span> Tooltips</a></li>
                    </ul>
                </li>
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a
                        class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
                        </svg> Buttons</a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/buttons.html"><span
                                    class="c-sidebar-nav-icon"></span> Buttons</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/button-group.html"><span
                                    class="c-sidebar-nav-icon"></span> Buttons Group</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/dropdowns.html"><span
                                    class="c-sidebar-nav-icon"></span> Dropdowns</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/brand-buttons.html"><span
                                    class="c-sidebar-nav-icon"></span> Brand Buttons</a></li>
                    </ul>
                </li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="charts.html">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                        </svg> Charts</a></li>
                <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-star"></use>
                        </svg> Iconss</a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-free.html">
                                CoreUI Icons<span class="badge badge-success">Free</span></a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-brand.html">
                                CoreUI Icons - Brand</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-flag.html">
                                CoreUI Icons - Flag</a></li>
                    </ul>
                </li>
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a
                        class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                        </svg> Notifications</a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/alerts.html"><span
                                    class="c-sidebar-nav-icon"></span> Alerts</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/badge.html"><span
                                    class="c-sidebar-nav-icon"></span> Badge</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/modals.html"><span
                                    class="c-sidebar-nav-icon"></span> Modals</a></li>
                    </ul>
                </li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="widgets.html">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
                        </svg> Widgets<span class="badge badge-info">NEW</span></a></li>
                <li class="c-sidebar-nav-divider"></li>
                <li class="c-sidebar-nav-title">Extras</li>
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a
                        class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-star"></use>
                        </svg> Pages</a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="login.html" target="_top">
                                <svg class="c-sidebar-nav-icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> Login</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="register.html" target="_top">
                                <svg class="c-sidebar-nav-icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> Register</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="404.html" target="_top">
                                <svg class="c-sidebar-nav-icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
                                </svg> Error 404</a></li>
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="500.html" target="_top">
                                <svg class="c-sidebar-nav-icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
                                </svg> Error 500</a></li>
                    </ul>
                </li>
                <li class="c-sidebar-nav-item mt-auto"><a class="c-sidebar-nav-link c-sidebar-nav-link-success"
                        href="https://coreui.io" target="_top">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                        </svg> Download CoreUI</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link c-sidebar-nav-link-danger"
                        href="https://coreui.io/pro/" target="_top">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
                        </svg> Try CoreUI<strong>PRO</strong></a></li>
            </ul>
            <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
                data-class="c-sidebar-minimized"></button>
        </div>

        <div class="c-wrapper c-fixed-components">
            <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
                <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
                    data-class="c-sidebar-show">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button><a class="c-header-brand d-lg-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="assets/brand/coreui.svg#full"></use>
                    </svg></a>
                <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
                    data-class="c-sidebar-lg-show" responsive="true">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button>
                
                <ul class="c-header-nav ml-auto mr-4">
                    <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                            <svg class="c-icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                            </svg></a></li>
                    <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                            <svg class="c-icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
                            </svg></a></li>
                    <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                            <svg class="c-icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                            </svg></a></li>
                    <li class="c-header-nav-item dropdown">
                        <a class="c-header-nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="c-avatar">
                                <img class="c-avatar-img" src="https://www.vippng.com/png/detail/416-4161690_empty-profile-picture-blank-avatar-image-circle.png" alt="avatar"/>
                            </div>
                            <p class="pt-3 mx-1">{{ auth()->user()->name }}</p>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <strong>Account</strong>
                            </div>

                            <a class="dropdown-item" href="#">
                                <svg class="c-icon mr-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                                </svg>
                                Updates
                                <span class="badge badge-info ml-auto">42</span>
                            </a>
                                
                            <a class="dropdown-item" href="#">
                                <svg class="c-icon mr-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                </svg> 
                                Messages
                                <span class="badge badge-success ml-auto">42</span>
                            </a>
                            
                            <a class="dropdown-item" href="#">
                                <svg class="c-icon mr-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-task"></use>
                                </svg> 
                                Tasks
                                <span class="badge badge-danger ml-auto">42</span>
                            </a>
                            
                            <a class="dropdown-item" href="#">
                                <svg class="c-icon mr-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
                                </svg> 
                                Comments
                                <span class="badge badge-warning ml-auto">42</span>
                            </a>

                            <div class="dropdown-divider"></div>
                            
                            <a class="dropdown-item" href="#">
                                <svg class="c-icon mr-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                </svg> 
                                Lock Account
                            </a>
                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                <svg class="c-icon mr-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> 
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </header>

            <div class="c-body">
                <main class="c-main w-100 px-3 px-sm-5">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <!-- Scripts -->
        @livewireScripts
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js" integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        {{-- <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script> --}}
        <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
        <script>
            var $ = jQuery.noConflict();

            $(window).on('load', function() { 
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            });
        </script>
    </body>
</html>

{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <style>
        svg {
            width: 16px;
        }
    </style>
</head> --}}