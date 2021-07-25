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
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @livewireStyles
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body class="c-app">
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')

            <div class="col-xl-10 col-lg-12 p-0">

                @include('partials.header')

                <div class="min-vh-100 border-bottom">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
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
