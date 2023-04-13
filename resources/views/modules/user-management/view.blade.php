@extends('layout.app')


@section('title')
    User's Profile
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    <div class="row">
        <div class="col-md-5 mt-5">
            <div class="card card-custom card-stretch">
                <div class="card-header">
                    <div class="card-title">
                        <h2 class="card-label font-weight-bolder text-dark">User's Avatar</h2>
                    </div>
                </div>
                <form method="POST" action="{{ route('user.updateProfile') }}" enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center align-items-center">
                                <img id="preview_image"
                                    src="{{ $profilePictureUrl }}"
                                    alt="" width="250" height="250" style="border-radius: 100%;">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-md-12">
                                <input type="file" name="avatar" class="form-control" id="profile_picture">
                            </div>
                            <div class="form-group col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success col-md-6">Upload Avatar</button>
                            </div>
                        </div>

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
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_7_1">Personal Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_7_2">Change Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_tab_pane_7_1" role="tabpanel"
                            aria-labelledby="kt_tab_pane_7_1">
                            <form action="">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label font-weight-bold">User Name:</label>
                                        <input type="text" class="form-control" placeholder=""
                                            value="{{ $userId->user_name }}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label font-weight-bold">School ID:</label>
                                        <input type="text" class="form-control" placeholder=""
                                            value="{{ $userId->school_id }}" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label font-weight-bold">Name:</label>
                                        <input type="text" class="form-control" placeholder="User Name"
                                            value="{{ $userId->name }}" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label font-weight-bold">E-mail Address:</label>
                                        <input type="text" class="form-control" placeholder=""
                                            value="{{ $userId->sorsu_email }}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label font-weight-bold">Birthday:</label>
                                        <input type="date" class="form-control" placeholder=""
                                            value="{{ $userId->bdate }}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label font-weight-bold">Phone No.:</label>
                                        <input type="text" class="form-control" placeholder=""
                                            value="{{ $userId->phone_no }}" />
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary col-md-12">Update Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="kt_tab_pane_7_2" role="tabpanel" aria-labelledby="kt_tab_pane_7_2">
                            <form action="">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label font-weight-bold">Old Password:</label>
                                        <input type="password" class="form-control" placeholder="" value="" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label font-weight-bold">New Password:</label>
                                        <input type="password" class="form-control" placeholder="" value="" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label font-weight-bold">Confirm Password:</label>
                                        <input type="password" class="form-control" placeholder="" value="" />
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary col-md-12">Update Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var input = document.getElementById('profile_picture');
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
