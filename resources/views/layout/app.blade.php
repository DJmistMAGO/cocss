
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/hospitallogosmall.png">
    <title>@yield('title')</title>

    @stack('links')
    <!-- Bootstrap Core CSS -->
    <link href="admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/assets/plugins/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="admin/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="admin/assets/plugins/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/fontawesome/css/fontawesome.css" />
    <link rel="stylesheet" href="admin/assets/fontawesome/css/brands.css" />
    <link rel="stylesheet" href="admin/assets/fontawesome/css/solid.css" />
    <link href="admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
    <script src="admin/assets/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="admin/assets/plugins/dropify/dist/css/dropify.min.css">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9N071f-dwiyVB3WtyD3KH1LySx4bf6HA"></script>
    <script src="admin/assets/gmaps/gmaps.js"></script>

    <link href="admin/css/style.css" rel="stylesheet">
    <link href="admin/css/mystyle.css" rel="stylesheet">
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
</head>

<body class="fix-header fix-sidebar card-no-border">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <div id="main-wrapper">
        @include('layout.partials.topbar')
        @include('layout.partials.sidebar')

        <div class="page-wrapper">

            <div class="container-fluid " style="padding: 20px 20px;">
                @section('content') @show
            </div>

            @include('layout.partials.footer')
        </div>

    </div>

    <!-- All Jquery -->
<!-- ============================================================== -->

<!-- Bootstrap tether Core JavaScript -->
<script src="admin/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="admin/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="admin/js/waves.js"></script>
<!--Menu sidebar -->
<script src="admin/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="admin/js/custom.min.js"></script>
<script src="admin/assets/plugins/toast-master/js/jquery.toast.js"></script>
<!-- Chart JS -->
<script src="admin/assets/plugins/bootstrap-table/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="admin/assets/plugins/bootstrap-table/dist/bootstrap-table-locale-all.min.js"></script>
<script src="admin/assets/plugins/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js"></script>
<script src="admin/js/bootstrap-table.init.js"></script>
<script src="admin/js/toastr.js"></script>
<script>
     @stack('scripts')

</script>
<!-- Sweet-Alert  -->
<!-- <script src="admin/assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script> -->
<!-- <script src="admin/assets/plugins/sweetalert2/sweet-alert.init.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="admin/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

<script src="admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="admin/assets/plugins/moment/moment.js"></script>
<script src="admin/assets/plugins/wizard/jquery.steps.min.js"></script>
<script src="admin/assets/plugins/wizard/jquery.validate.min.js"></script>

<script src="admin/assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="admin/assets/plugins/wizard/steps.js"></script>

<script src="admin/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

<script src="admin/assets/plugins/chartist-js/dist/chartist.min.js"></script>
<script src="admin/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<script src="admin/assets/plugins/echarts/echarts-all.js"></script>
<!-- <script src="admin/assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script> -->
<script src="admin/assets/plugins/tableHeadFixer.js"></script>
<script src="admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="admin/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="admin/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9N071f-dwiyVB3WtyD3KH1LySx4bf6HA"></script>
<script src="admin/assets/gmaps/gmaps.js"></script>
<script src="admin/assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="admin/js/mask.init.js"></script>

<script type="text/javascript">
    $(document).on('show.bs.modal', '.modal', function () {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });
    var zIndex = Math.max.apply(null, Array.prototype.map.call(document.querySelectorAll('*'), function(el) {
      return +el.style.zIndex;
    })) + 10;
    $(document).on('hidden.bs.modal', '.modal', function () {
        $('.modal:visible').length && $(document.body).addClass('modal-open');
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="admin/assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
</body>

</html>
