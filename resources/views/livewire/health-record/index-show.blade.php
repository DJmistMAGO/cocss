<div class="container-fluid containerfluidneed" style="padding: 20px 20px;">
    <div class="row">
        @include('livewire.health-record.view-modal')
        <div class="col-12">
            <div class="card" style="margin-bottom: 0px;">
                <div class="card-body" style="padding-top: 1rem; padding-bottom: .9rem;">
                    <div class="row page-titles" style="padding-bottom: 0px;">
                        <div class="col-md-6 align-self-center">
                            <h3 class="text-themecolor mb-0 mt-0" style="font-weight: 500" data-toggle="modal" data-target="#create">Health Record</h3>
                        </div>
                        {{-- <div class="col-md-6 d-flex justify-content-end">
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                    Book an Appointment
                                </button>
                            </div>
                        </div> --}}
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
                        <thead class="bg-success text-white">
                            <tr>
                                <th style="width: 5%; white-space: nowrap; background-color: rgb(51, 52, 63); position: relative; top: 0px;">
                                    Date </th>
                                <th style="width: 5%; white-space: nowrap; background-color: rgb(51, 52, 63); position: relative; top: 0px;">
                                    Time </th>
                                <th style="width: 20%; white-space: nowrap; background-color: rgb(51, 52, 63); position: relative; top: 0px;">
                                    Result </th>
                                <th style="width: 10%; white-space: nowrap; background-color: rgb(51, 52, 63); position: relative; top: 0px;">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody id="tblappointmentlist">
                            <tr style="cursor:pointer;">
                            <td style="white-space: nowrap;">test</td>
                            <td style="white-space: nowrap;">test</td> 
                            <td style="white-space: nowrap;">test</td>
                            <td style="white-space: nowrap;">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
                            {{-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button> --}}
                        </td>
            </tr>
        </tbody>
    </table>
</div>

