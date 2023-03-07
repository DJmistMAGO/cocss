<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Favicon Icon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/hospitallogosmall.png">
    <title>Clinic Online Consultation</title>

    <link rel="stylesheet" href="{{ asset('bs5/css/bootstrap.min.css') }}">

    <link href="admin/css/colors/blue.css" id="theme" rel="stylesheet">

    <link href="admin/css/style.css" rel="stylesheet">
    <link href="admin/css/mystyle.css" rel="stylesheet">

    <style type="text/css">
        .auth {
            background-color: #325170;
            height: 100vh;
            display: flex;
            justify-content: center !important;
            align-items: center !important;
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
    <div class="auth">
        <div class="col-md-6">
            <div class="card">
                <header class="auth-header">
                    <a href="#" class="text-center db" style="padding-top: 15px;"><img
                            src="assets/images/cocsslogo11.png" alt="Home"width="25%" height="auto" />
                    </a>
                </header>
                <hr class="text-primary mb-0">
                <div class="card-body cardbodylogin" style="padding: 1.25rem 1.8rem;">
                    <div class=" row" style="margin-bottom: 5px;">
                        <div class="col-md-12">
                            <h3 class="text-center">CREATE AN ACCOUNT</h3>
                        </div>
                    </div>

                    <form action="{{ route('regsubmit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" style="margin-bottom: 0px; font-weight: 500;">School
                                    ID</label>
                                <input type="text" placeholder="Enter School ID" name="school_id"
                                    class="form-control" value="{{ old('school_id') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" style="margin-bottom: 0px; font-weight: 500;">Full
                                    Name</label>
                                <input type="text" name="name" class="form-control" required
                                    placeholder="Enter Full Name" value="{{ old('name') }}">

                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label"
                                    style="margin-bottom: 0px; font-weight: 500;">Birthdate</label>
                                <input type="date" name="bdate" class="form-control" required
                                    value="{{ old('bdate') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" style="margin-bottom: 0px; font-weight: 500;">Phone
                                    No.</label>
                                <input type="number" name="phone_no" class="form-control" required
                                    placeholder="Enter Phone No." value="{{ old('phone_no') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label" style="margin-bottom: 0px; font-weight: 500;">SORSU
                                    E-mail.</label>
                                <input type="email" name="sorsu_email" class="form-control" required
                                    placeholder="Enter SORSU E-mail" value="{{ old('sorsu_email') }}">

                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" style="margin-bottom: 0px; font-weight: 500;">Password</label>
                                <input type="password" name="password" class="form-control" required
                                    placeholder="Enter Password" id="pass1">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" style="margin-bottom: 0px; font-weight: 500;">Confirm
                                    Password</label>
                                <input type="password" class="form-control" id="passcon" name="confirmPassword"
                                    required placeholder="Confirm Password">
                            </div>
                            <div>
                                <span class="text-danger small d-none" id="password-message">
                                    <i class="fa fa-window-close" aria-hidden="true"></i>
                                    Passwords do not match!
                                </span>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="col-md-12">
                                <button type="submit"
                                    class="btn btn-info btn-md btn-block text-uppercase waves-effect waves-light mb-1 w-100"
                                    style="padding: 10px 10px; font-weight: 500">Register</button>
                            </div>
                        </div>
                    </form>
                    <span style="font-size: 14px;">Already have an account?
                        <a href="{{ route('login') }}" class="text-info"> Go to login.</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="{{ asset('bs5/js/bootstrap.bundle.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#passcon , #pass1').on('input', function() {
            var pass = $('#pass1').val();
            var passcon = $('#passcon').val();

            if (pass !== passcon) {
                $('#password-message').removeClass('d-none');
            } else {
                $('#password-message').addClass('d-none');
            }
        });
    });
</script>
