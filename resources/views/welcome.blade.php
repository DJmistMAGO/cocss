<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets1/images/hospitallogosmall.png">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets1/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets1/plugins/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    <link href="css/colors/green.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="assets1/fontawesome/css/fontawesome.css" />
    <link rel="stylesheet" href="assets1/fontawesome/css/brands.css" />
    <link rel="stylesheet" href="assets1/fontawesome/css/solid.css" />
    <script src="assets1/plugins/jquery/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9N071f-dwiyVB3WtyD3KH1LySx4bf6HA"></script>
    <script src="assets1/gmaps/gmaps.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-85622565-1', 'auto');
        ga('send', 'pageview');
    </script>

    <style>
        .carousel-item {
            height: 500px;
        }

        .slideimg {
            width: 100%;
            height: 100%;
            object-position: center;
            object-fit: cover
        }
    </style>
</head>

<body class="fix-header card-no-border fix-sidebar">
    {{-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
                stroke-miterlimit="10" />
        </svg>
    </div> --}}
    <div id="main-wrapper">
        @include('partials.topbar')

        <div class="page-wrapper">

            @include('home.index')

            <footer class="footer">
                © 2023 Clinic Online Consultation
            </footer>
        </div>
    </div>

    <script src="assets1/plugins/jquery/jquery.min.js"></script>
    <script src="assets1/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets1/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9N071f-dwiyVB3WtyD3KH1LySx4bf6HA"></script>
    <script src="assets1/gmaps/gmaps.js"></script>

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script>
        var URL = '{{ config('app.url') }}'
    </script>
    @stack('scripts')

</body>

</html>
