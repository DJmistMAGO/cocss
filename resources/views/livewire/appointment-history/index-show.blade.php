<div class="container-fluid containerfluidneed" style="padding: 20px 20px;">
    <div class="row">
        @include('livewire.appointment-history.view')
        @include('livewire.appointment-history.edit')
        <div class="col-12">
            <div class="card" style="margin-bottom: 0px;">
                <div class="card-body" style="padding-top: 1rem; padding-bottom: .9rem;">
                    <div class="row page-titles" style="padding-bottom: 0px;">
                        <div class="col-md-6 align-self-center">
                            <h3 class="text-themecolor mb-0 mt-0" style="font-weight: 500">Appointment History</h3>
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
                            <input type="text" wire:model="search" class="form-control searchinputorder"
                                placeholder="Search . . .">
                            <span><button wire:click="search" class="btn btn-primary ml-2">Search</button></span>
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
                                <th>Reason</th>
                                <th style="width: 25%">Result</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tblappointmentlist">
                            @forelse ($app_history as $app_his)
                                <tr style="cursor:pointer;">
                                    <td style="white-space: nowrap;">{{ $app_his->user->name }}</td>
                                    <td style="white-space: nowrap;">{{ $app_his->user->school_id }}</td>
                                    <td style="white-space: nowrap;">{{ $app_his->appointment_date->format('M. d, Y') }}
                                        || {{ date('h:i A', strtotime($app_his->appointment_time)) }}</td>
                                    <td>{{ $app_his->reason }}</td>
                                    <td>{{ $app_his->appointment->results }}</td>
                                    <td style="white-space: nowrap;">
                                        <a href="{{ route('appointhistory.show', $app_his->id) }}"
                                            class="btn btn-sm btn-success">View</a>
                                        {{-- <button class="btn btn-info" data-toggle="modal"
                                            data-target="#edit">Edit</button>
                                        <button class="btn btn-danger">Delete</button> --}}
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
            </div>
        </div>
    </div>
</div>
