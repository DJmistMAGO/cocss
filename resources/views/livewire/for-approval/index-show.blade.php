<div class="container-fluid containerfluidneed" style="padding: 20px 20px;">
    <div class="row">
        @include('livewire.for-approval.view-modal')
        <div class="col-12">
            <div class="card" style="margin-bottom: 0px;">
                <div class="card-body" style="padding-top: 1rem; padding-bottom: .9rem;">
                    <div class="row page-titles" style="padding-bottom: 0px;">
                        <div class="col-md-6 align-self-center">
                            <h3 class="text-themecolor mb-0 mt-0" style="font-weight: 500" data-toggle="modal"
                                data-target="#create">For Approval</h3>
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
                                <th style="width: 25%">Reason</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tblappointmentlist">
                            @forelse ($book_appointment as $ba)
                                <tr style="cursor:pointer;">
                                    <td>{{ $ba->user->name }}</td>
                                    <td>{{ $ba->user->school_id }}</td>
                                    <td>{{ $ba->appointment_date->format('F d, Y') }} || {{ date('h:i A', strtotime($ba->appointment_time)) }}</td>
                                    <td>{{ $ba->reason }}</td>

                                    <td style="white-space: nowrap;">
                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#view" wire:click="edit({{ $ba->id }})">Approval</button>

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
