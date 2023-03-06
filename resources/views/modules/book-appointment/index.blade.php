@extends('layout.app')


@section('title')
    Dashboard
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card" style="margin-bottom: 15px;">
            <div class="card-body paddingbreadcard" style="padding-top: 25px; padding-bottom: 25px;">
                <div class="row page-titles" style="padding-bottom: 0px;">
                    <div class="col-md-6 align-self-center">
                        <h3 class="mb-0 mt-0 textdashboardbread3"><span>Welcome, </span> <span class="text-themecolor textdashboardbread3" style="font-weight: 500; font-size: 25px;" id="txtuserFname">Name</span></h3>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <h4 class="mb-0 mt-0 float-right textdashboardbread textdashboardbread2" style="font-weight: 400; color: #5f5f5f;"><span class="textdashboardbread" id="txtdatex">Date &nbsp;&nbsp;&nbsp;Time </span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
