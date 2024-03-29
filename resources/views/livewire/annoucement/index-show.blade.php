<div class="container-fluid containerfluidneed" style="padding: 20px 20px;">
    <div class="row">
        @include('livewire.annoucement.add')
        @include('livewire.annoucement.edit')
        @include('livewire.annoucement.view')
        {{-- @include('livewire.appointment.view-app') --}}
        <div class="col-12">
            <div class="card" style="margin-bottom: 0px;">
                <div class="card-body" style="padding-top: 1rem; padding-bottom: .9rem;">
                    <div class="row page-titles" style="padding-bottom: 0px;">
                        <div class="col-md-6 align-self-center">
                            <h3 class="text-themecolor mb-0 mt-0" style="font-weight: 500" data-toggle="modal"
                                data-target="#create">Announcement</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid"
        style="padding: 15px 15px; background-color: white; min-height: auto; margin-top: 15px;">
        <div class="row" style="margin-bottom: .5rem;">
            <div class="col-md-12" style="margin-bottom: 10px;">
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
                    <div class="col-md-6" style="padding-left: 0px;">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create"
                                wire:click="resetInputFields()"> <i class="fas fa-bullhorn"></i> Add
                                Announcement</button>
                        </div>
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
                                <th style="width: 25%">Subject</th>
                                <th style="width: 10%">Date & Time</th>
                                <th class="text-center" style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tblappointmentlist">
                            @forelse ($announcements as $announcement)
                                <tr style="cursor:pointer;">
                                    <td>{{ $announcement->subject }}</td>
                                    <td>{{ $announcement->date->format('F d, Y') }} ||
                                        {{ date('h:i A', strtotime($announcement->time)) }}</td>
                                    <td class="d-flex justify-content-center" style="white-space: nowrap;">
                                        <button class="btn btn-sm btn-success " data-toggle="modal" data-target="#view"
                                            wire:click="view({{ $announcement->id }})">View</button>
                                        <button type="button" class="btn btn-primary mx-2" data-toggle="modal"
                                            data-target="#edit" wire:click="edit({{ $announcement->id }})">Edit</button>
                                        <button class="btn btn-sm btn-danger" wire:click="deleteConfirm({{ $announcement->id }})">Delete</button>
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
