<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- app icon -->
    <link rel="icon" href="https://drive.google.com/uc?id=1sTGnIM9RvslWvrtCsOwaupBzHUCAF4Rm">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" integrity="sha512-n+g8P11K/4RFlXnx2/RW1EZK25iYgolW6Qn7I0F96KxJibwATH3OoVCQPh/hzlc4dWAwplglKX8IVNVMWUUdsw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #1266f1;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(18, 102, 241, 1), rgba(98, 217, 223, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(18, 102, 241, 1), rgba(98, 217, 223, 1))
        }
    </style>
</head>

<body class="c-app">
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span>
                                Integrations
                            </a>
                        </li>
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Year-end sale
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="col-lg-10 p-0">

                <nav class="navbar sticky-top w-100 d-flex flex-row-reverse py-2 shadow gradient-custom opacity-80">
                    <ul class="nav nav-tabs">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Logout</a>
                          </div>
                        </li>
                    </ul>
                </nav>

                <div class="min-vh-100 border-bottom">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js" integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://unpkg.com/@popperjs/core@2"></script> --}}
    {{-- <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script> --}}
    {{-- <script src="https://unpkg.com/@coreui/coreui@3.4.0/dist/js/coreui.bundle.min.js"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        //coreui tooltip
        var $ = jQuery.noConflict();

        $(window).on('load', function() {
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        });

        //sweetalert toast
        window.addEventListener('swal:modal', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
            });
        });

        window.addEventListener('swal:confirm', event => {
            swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.livewire.emit('removeItem', event.detail.id);
                    }
                });
        });

        window.addEventListener('swal:download', event => {
            swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDownload) => {
                    if (willDownload) {
                        window.livewire.emit('download', event.detail.path, event.detail.fileName);
                    }
                });
        });
    </script>
</body>

</html>
