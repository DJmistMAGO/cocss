<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clinic Online Consultation</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/hospitallogosmall.png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('bs5/css/bootstrap.min.css') }}">

    <style>
        body {
            font-family: Rubik, sans-serif;
        }

        .auth {
            background-color: #325170;
            height: 100vh;
            display: flex;
            justify-content: center !important;
            align-items: center !important;
        }

        .auth-container {
            width: 500px;
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

        .btn-maroon {
            background-color: #800000;
            color: #fff;
        }

        .btn-maroon:hover {
            background-color: #a70b0b;
            color: #000000;
        }
    </style>
</head>

<body>
    <div class="auth">
        <div class="col-md-8 auth-container">
            <div class="card">
                <header class="auth-header d-flex align-items-center justify-content-center"
                    style="background-color: #800000 !important; height: 70px; border-bottom: 0px">
                    <a href="" style="text-decoration:none;">
                        <h2 class="text-light mb-0">SORSU-BC CLINIC</h2>
                    </a>
                </header>
                {{-- <hr class="text-primary mb-0"> --}}
                <div class="card-body" style="padding: 1.25rem 1.8rem;">
                    <div style="margin-bottom: 10px;">
                        <div>
                            <h3 class="text-center">CREATE AN ACCOUNT</h3>
                        </div>
                    </div>

                    <form action="{{ route('register') }}" method="POST" id="registerForm">
                        @csrf
                        <div class="row mt-5">
                            <div class="form-group col-md-6 mb-2">
                                <label>School ID No.</label>
                                <input type="text" name="school_id"
                                    class="form-control @error('school_id') is-invalid @enderror"
                                    value="{{ old('school_id') }}" placeholder="Enter School ID No." required />
                                @error('school_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label>Fullname</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required placeholder="Enter your fullname" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- maximum year for birthdate is -15 years ago from current date --}}
                            <div class="form-group col-md-6 mb-2">
                                <label>Birthdate</label>
                                <input type="date" name="bdate" id="bdate"
                                    class="form-control @error('bdate') is-invalid @enderror"
                                    value="{{ old('bdate') }}" max="<?php echo date('Y', strtotime('-15 years')) . '-12-31'; ?>" required>
                                @error('bdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label>Phone No</label>
                                <input type="text" name="phone_no"
                                    class="form-control @error('phone_no') is-invalid @enderror"
                                    value="{{ old('phone_no') }}" placeholder="Enter contact number" required>
                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <label>SORSU E-mail</label>
                                <input type="email" name="sorsu_email"
                                    class="form-control @error('sorsu_email') is-invalid @enderror"
                                    value="{{ old('sorsu_email') }}" required placeholder="sample@sorsu.edu.ph">
                                @error('sorsu_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label>Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="*******"
                                    value="{{ old('password') }}" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="*******"
                                    id="confirm_password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" required
                                    autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-maroon w-100 mt-3 mb-2">Register</button>
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

    <script src="{{ asset('bs5/js/bootstrap.bundle.min.js') }}"></script>


</body>

</html>
