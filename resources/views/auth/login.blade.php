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
    <title>Clinic Online Consultation</title>
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
    <style type="text/css">
        .auth {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            background-color: #325170;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .auth-container {
            width: 450px;
            min-height: 330px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateY(-50%) translateX(-50%);
            transform: translateY(-50%) translateX(-50%);
        }

        .card {
            background-color: #fff;
            -webkit-box-shadow: 1px 1px 5px rgb(126 142 159);
            box-shadow: 1px 1px 5px rgb(126 142 159);
            margin-bottom: 10px;
            border-radius: 0;
            border: none;
        }

        .auth-container .auth-header {
            text-align: center;
            border-bottom: 1px solid #000000;
        }
    </style>
</head>

<body>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
                stroke-miterlimit="10" />
        </svg>
    </div>

    <div class="auth">
        <div class="auth-container">
            <div class="card">
                <header class="auth-header">
                    <a href="javascript:void(0)" class="text-center db"
                        style="padding-top: 15px;padding-bottom: 15px;"><img src="assets/images/cocsslogo11.png"
                            alt="Home"width="45%" height="auto" />
                    </a>
                </header>
                <div class="card-body cardbodylogin" style="padding: 1.25rem 1.8rem;">
                    <div class="form-horizontal form-material">
                        <div class="form-group mt-3 row" style="margin-bottom: 5px;">
                            <div class="col-md-12">
                                <p class="text-center" style="margin-bottom: 5px; font-weight: 400; font-size: 1rem">
                                    SIGN IN TO YOUR ACCOUNT</p>
                            </div>
                        </div>

                        <label class="mt-3" for="username"
                            style="margin-bottom: 0px; font-weight: 500">Username</label>
                        <div class="form-group row">
                            <span class="text-danger"></span>
                            <div class="col-md-11" style="flex: 0 0 98.2%; max-width: 98.2%;">
                                <input type="text"
                                    class="form-control underlined @error('user_name') is-invalid @enderror"
                                    name="user_name" id="txtusername" placeholder="Enter your username" required
                                    style="height: 40px;" />
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" style="margin-bottom: 0px; font-weight: 500">Password</label>
                            <span class="text-danger"></span>
                            <div class="row">
                                <div class="col-md-11" style="padding-right: 0px; flex: 0 0 95%; max-width: 95%;">
                                    <input type="password"
                                        class="form-control underlined @error('password') is-invalid @enderror"
                                        name="password" placeholder="Enter your password" required
                                        style="height: 40px;">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1"
                                    style="padding-left: 0px;padding-right: 0px; flex: 1%; max-width: 1%;">
                                    <i class="fa fa-eye-slash"
                                        style="margin-left: -23px; cursor: pointer; font-size: 1.1rem; margin-top: .7rem"
                                        id="logineye" onclick="fncloginpassattribunHash()"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <div class="col-xs-12">
                                <button
                                    class="btn btn-info btn-md btn-block text-uppercase waves-effect waves-light mb-1"
                                    onclick="loginuser();" style="padding: 10px 10px; font-weight: 500">LogIn</button>
                                <span style="font-size: 14px;">Don't have an account yet?<a
                                        href="{{ route('register') }}" class="text-info"> Create an
                                        Account.</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

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
    // $.toast({
    //     heading: 'Welcome to Monster admin',
    //     text: 'Use the predefined ones, or specify a custom position object.',
    //     position: 'top-right',
    //     loaderBg: '#ff6849',
    //     icon: 'info',
    //     hideAfter: 3000,
    //     stack: 6
    // });
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
<script src="admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript">
</script>
<script src="admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="admin/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="admin/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9N071f-dwiyVB3WtyD3KH1LySx4bf6HA"></script>
<script src="admin/assets/gmaps/gmaps.js"></script>
<script src="admin/assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="admin/js/mask.init.js"></script>

<script type="text/javascript">
    $(document).on('show.bs.modal', '.modal', function() {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });
    var zIndex = Math.max.apply(null, Array.prototype.map.call(document.querySelectorAll('*'), function(el) {
        return +el.style.zIndex;
    })) + 10;
    $(document).on('hidden.bs.modal', '.modal', function() {
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
<script type="text/javascript">
    function loginuser() {
        var txtusername = $("#txtusername").val();
        var txtpassword = $("#txtpassword").val();
        $(".preloader").show().css('background', 'rgba(255,255,255,0.5)');
        $.ajax({
            type: 'POST',
            url: 'adminclass.php',
            data: 'txtusername=' + txtusername +
                '&txtpassword=' + txtpassword +
                '&form=loginuser',
            success: function(data) {
                setTimeout(function() {
                    $(".preloader").hide().css('background', '');
                    if (data == 1) {
                        window.location = 'index.php';
                    } else if (data == 3) {
                        Swal.fire(
                            'USER INACTIVE',
                            'Your account is currently inactive, Please contact your admin.',
                            'warning'
                        )
                    } else {
                        Swal.fire(
                            'USER NOT FOUND',
                            'You have entered invalid username or password.',
                            'warning'
                        )
                    }
                }, 1000);
            }
        })
    }

    function fncloginpassattribHash() {
        $("#txtpassword").attr("type", "password");
        $("#logineye").attr("onclick", "fncloginpassattribunHash()");
        $("#logineye").removeClass("fa-eye");
        $("#logineye").addClass("fa-eye-slash");
    }

    function fncloginpassattribunHash() {
        $("#txtpassword").attr("type", "text");
        $("#logineye").attr("onclick", "fncloginpassattribHash()");
        $("#logineye").addClass("fa-eye");
        $("#logineye").removeClass("fa-eye-slash");
    }
</script>
