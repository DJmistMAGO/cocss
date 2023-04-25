<div class="container-fluid containerfluidneed" style="padding: 20px 20px;">
    <div class="row">
        @include('livewire.book-appointment.create-modal')
        @include('livewire.book-appointment.edit-modal')
        @include('livewire.book-appointment.view-modal')
        <div class="col-12">
            <div class="card" style="margin-bottom: 0px;">
                <div class="card-body" style="padding-top: 1rem; padding-bottom: .9rem;">
                    <div class="row page-titles" style="padding-bottom: 0px;">
                        <div class="col-md-6 align-self-center">
                            <h3 class="text-themecolor mb-0 mt-0" style="font-weight: 500">Book Appointment</h3>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div>
                                <button type="button" class="btn btn-primary" wire:click="resetInputFields()"
                                    data-toggle="modal" data-target="#create">
                                    Book an Appointment
                                </button>
                            </div>
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
                            {{-- <div class="input-group-prepend">
                                <span class="input-group-text searchinputorder"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control searchinputorder" id="txtsearchappointment"
                                placeholder="Search . . ."> --}}
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
                        <thead class="bg-success text-white">
                            <tr>
                                <th
                                    style="width: 5%; white-space: nowrap; background-color: #800000; position: relative; top: 0px;">
                                    Date </th>
                                <th
                                    style="width: 5%; white-space: nowrap; background-color: #800000; position: relative; top: 0px;">
                                    Time </th>
                                <th
                                    style="width: 5%; white-space: nowrap; background-color: #800000; position: relative; top: 0px;">
                                    Reason </th>
                                <th
                                    style="width: 5%; white-space: nowrap; background-color: #800000; position: relative; top: 0px;">
                                    Status </th>
                                <th
                                    style="width: 5%; white-space: nowrap; background-color: #800000; position: relative; top: 0px;">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody id="tblappointmentlist">
                            @forelse ($book_appointments as $ba)
                                <tr style="cursor:pointer;">
                                    <td style="white-space: nowrap;">{{ $ba->appointment_date->format('F d, Y') }}</td>
                                    <td style="white-space: nowrap;">
                                        {{ date('h:i A', strtotime($ba->appointment_time)) }}</td>
                                    <td style="white-space: nowrap;">{{ $ba->reason }}</td>
                                    <td style="white-space: nowrap;">{{ $ba->status }}</td>
                                    <td style="white-space: nowrap;">
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view"
                                            wire:click='view({{ $ba->id }})'>View</button>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit"
                                            wire:click='edit({{ $ba->id }})'>Edit</button>
                                        <button class="btn btn-danger btn-sm"
                                            wire:click='deleteConfirm({{ $ba->id }})'>Delete</button>
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
