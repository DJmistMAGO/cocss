@extends('layout.app')


@section('title')
    User's Profile
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    @if (session('success'))
        <div class="alert alert-custom alert-success fade show mb-1 py-2" role="alert">
            <div class="alert-text"> {{ session('success') }}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-custom alert-danger fade show mb-1 py-2" role="alert">
            <div class="alert-text"> {{ session('error') }}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-5 mt-5">
            <div class="card card-custom card-stretch">
                <div class="card-header">
                    <div class="card-title">
                        <h2 class="card-label font-weight-bolder text-dark">User's Avatar</h2>
                    </div>
                </div>
                <form action="{{ route('user.updateProfile', [$user]) }}" method="post"" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @if ($errors->has('profile_picture'))
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p class="text-danger text-center">{{ $errors->first('profile_picture') }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($user->profile_picture == null)
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center align-items-center">
                                    <img id="preview_image" src="/uploads/default.jpg" alt="" width="250"
                                        height="250" style="border-radius: 100%;">
                                </div>
                            </div>
                        @elseif($user->profile_picture != null)
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center align-items-center">
                                    <img id="preview_image" src="/uploads/{{ $user->profile_picture }}" alt=""
                                        width="250" height="250" style="border-radius: 100%;">
                                </div>
                            </div>
                        @endif

                        {{-- <div class="row mt-3">
                            <div class="form-group col-md-12">
                                <input readonly type="file" name="profile_picture" class="form-control" id="profile_picture">
                            </div>
                            <div class="form-group col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success col-md-6">Upload Avatar</button>
                            </div>
                        </div> --}}

                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-7 mt-5">
            <div class="card card-custom card-stretch">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">User Information</h3>
                    </div>
                    <div class="card-toolbar">
                        <ul class="nav nav-success nav-bold nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('users.index') }}">Back to List</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_7_2">Change Password</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_tab_pane_7_1" role="tabpanel"
                            aria-labelledby="kt_tab_pane_7_1">
                            <form action="{{ route('user.updateInfo', [$user]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label font-weight-bold">User Name:</label>
                                        <input readonly type="text" name="user_name" class="form-control" placeholder=""
                                            value="{{ $user->user_name }}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label font-weight-bold">School ID:</label>
                                        <input readonly type="text" class="form-control" name="school_id" placeholder=""
                                            value="{{ $user->school_id }}" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label font-weight-bold">Name:</label>
                                        <input readonly type="text" class="form-control" name="name" placeholder="User Name"
                                            value="{{ $user->name }}" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label font-weight-bold">E-mail Address:</label>
                                        <input readonly type="text" class="form-control" name="sorsu_email" placeholder=""
                                            value="{{ $user->sorsu_email }}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label font-weight-bold">Birthday:</label>
                                        <input readonly type="date" class="form-control" placeholder="" name="bdate"
                                            value="{{ $user->bdate }}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label font-weight-bold">Phone No.:</label>
                                        <input readonly type="text" class="form-control" placeholder="" name="phone_no"
                                            value="{{ $user->phone_no }}" />
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <button class="btn btn-primary col-md-12">Update Changes</button>
                                    </div> --}}
                                </div>
                            </form>
                        </div>

                        {{-- <div class="tab-pane fade" id="kt_tab_pane_7_2" role="tabpanel"
                            aria-labelledby="kt_tab_pane_7_2">
                            <form action="{{ route('user.updatePassword', [$user]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label font-weight-bold">Old Password:</label>
                                        <input readonly type="password" name="old_password" class="form-control" placeholder=""
                                            value="" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label font-weight-bold">New Password:</label>
                                        <input readonly type="password" class="form-control" name="new_password" placeholder=""
                                            value="" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label font-weight-bold">Confirm Password:</label>
                                        <input readonly type="password" class="form-control" name="confirm_password"
                                            placeholder="" value="" />
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary col-md-12">Update Password</button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var input readonly = document.getElementById('profile_picture');
        var preview = document.getElementById('preview_image');

        input.addEventListener('change', function() {
            var file = input.files[0];
            var reader = new FileReader();

            reader.addEventListener('load', function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            });

            reader.readAsDataURL(file);
        });
    </script>
@endpush
