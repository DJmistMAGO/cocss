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
    </style>
</head>

<body>
    <div class="auth">
        <div class="col-md-8 auth-container">
            <div class="card">
                <header class="text-center">
                    <div class="text-center mt-2">
                        <a href="#" class="text-center" style="padding-top: 15px; margin-top: 15px;">
                            <img src="{{ asset('assets/images/cocsslogo11.png') }}" alt="Home" width="40%"
                                height="auto" class="m-auto" />
                        </a>
                    </div>
                </header>
                <hr class="text-primary mb-0">
                <div class="card-body" style="padding: 1.25rem 1.8rem;">
                    <div style="margin-bottom: 5px;">
                        <div>
                            <h3 class="text-center">CREATE AN ACCOUNT</h3>
                        </div>
                    </div>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>School ID No.</label>
                                <input type="text" name="school_id"
                                    class="form-control @error('school_id') is-invalid @enderror"
                                    value="{{ old('school_id') }}" required />
                                @error('school_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fullname</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Birthdate</label>
                                <input type="date" name="bdate"
                                    class="form-control @error('bdate') is-invalid @enderror"
                                    value="{{ old('bdate') }}" required>
                                @error('bdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone No</label>
                                <input type="text" name="phone_no"
                                    class="form-control @error('phone_no') is-invalid @enderror"
                                    value="{{ old('phone_no') }}" required>
                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label>SORSU E-mail</label>
                                <input type="email" name="sorsu_email"
                                    class="form-control @error('sorsu_email') is-invalid @enderror"
                                    value="{{ old('sorsu_email') }}" required>
                                @error('sorsu_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" required
                                    autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100 mt-3 mb-2">Register</button>
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
