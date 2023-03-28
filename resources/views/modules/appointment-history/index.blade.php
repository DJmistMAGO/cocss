@extends('layout.app')


@section('title')
    Appointment History
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    <div class="container-fluid containerfluidneed" style="padding: 20px 20px;">
        <div class="row">
            <div class="col-12">
                <div class="card" style="margin-bottom: 0px;">
                    <div class="card-body" style="padding-top: 1rem; padding-bottom: .9rem;">
                        <div class="row page-titles" style="padding-bottom: 0px;">
                            <div class="col-md-6 align-self-center">
                                <h3 class="text-themecolor mb-0 mt-0" style="font-weight: 500" data-toggle="modal"
                                    data-target="#create">Appointment History</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid"
            style="padding: 15px 15px; background-color: white; min-height: auto; margin-top: 15px;">
            <div class="row" style="margin-bottom: .5rem;">
                <div class="col-md-8" style="margin-bottom: 10px;">
                    <div class="row">
                        <div class="col-md-6 colsearchorders">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text searchinputorder"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control searchinputorder" id="txtsearchappointment"
                                    placeholder="Search . . .">
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-left: 0px;">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr class="hrpayment" style="margin-top: 0px;">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3" style="overflow: auto;">

                        <table data-height="350" class="table table-bordered fixTable table-hover"
                            style="margin-bottom: 0px;">
                            <thead class="text-white">
                                <tr style="background-color: #b04f4f !important;">
                                    <th style="width: 25%">Name of Patient</th>
                                    <th style="width: 10%">School ID</th>
                                    <th style="width: 20%">Date & Time</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tblappointmentlist">
                                @forelse ($book_appointment as $appointment)
                                    <tr style="cursor:pointer;">
                                        <td>{{ $appointment->user->name }}</td>
                                        <td>{{ $appointment->user->school_id }}</td>
                                        <td>{{ $appointment->appointment_date->format('F d, Y') }} ||
                                            {{ date('h:i A', strtotime($appointment->appointment_time)) }}</td>
                                        <td style="white-space: nowrap;">
                                            <a href="{{ route('appointment.checkup', $appointment->id) }}"
                                                class="btn btn-sm btn-success">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="text-align: center;">No data available in table</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                @endsection
                @push('scripts')
                    @livewireScripts
                @endpush
