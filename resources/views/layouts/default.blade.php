<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Incidently</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <!-- Navigation -->
        @include('elements.main-header')

        <!-- Content -->
        <div class="container mt-5 position-relative">

            <!-- Notifications -->
            @include('elements.notification')

            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-5"></div>
    </body>
</html>