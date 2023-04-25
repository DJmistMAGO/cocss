<div class="container-fluid containerfluidneed" style="padding: 20px 20px;">
    <div class="row">
        @include('livewire.med-inv.create')
        @include('livewire.med-inv.restock')
        @include('livewire.med-inv.edit')
        @include('livewire.med-inv.view')
        <div class="col-12">
            <div class="card" style="margin-bottom: 0px;">
                <div class="card-body" style="padding-top: 1rem; padding-bottom: .9rem;">
                    <div class="row page-titles" style="padding-bottom: 0px;">
                        <div class="col-md-6 align-self-center">
                            <h3 class="text-themecolor mb-0 mt-0" style="font-weight: 500" data-toggle="modal"
                                data-target="#create">Medicine Inventory</h3>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div>
                                <button type="button" class="btn btn-primary" wire:click="resetInputFields()"
                                    data-toggle="modal" data-target="#create">
                                    Add Medicine
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
                        <thead class="text-white text-center">
                            <tr style="background-color: #b04f4f !important;">
                                <th style="width: 25%">Medicine Name</th>
                                <th style="width: 25%">Description</th>
                                <th>Quantity</th>
                                <th>EXP Date</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tblappointmentlist">
                            <tr style="cursor:pointer;">
                                @forelse ($med_inv as $med)
                                    <td>{{ $med->med_name }}</td>
                                    <td>{{ $med->med_description }}</td>
                                    <td>{{ $med->med_quantity }}</td>
                                    <td>
                                        @if ($med->exp_date->format('Y-m-d') < date('Y-m-d', strtotime('+1 month')))
                                            <span title="Expired/Will expire in a month"
                                                class="badge badge-danger">{{ $med->exp_date->format('M. d, Y') }}</span>
                                        @elseif($med->exp_date->format('Y-m-d') < date('Y-m-d', strtotime('+3 month')))
                                            <span title="Will expire in 3 months"
                                                class="badge badge-warning">{{ $med->exp_date->format('M. d, Y') }}</span>
                                        @else
                                            <span
                                                class="badge badge-success">{{ $med->exp_date->format('M. d, Y') }}</span>
                                        @endif
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#restock"
                                            wire:click="addStock({{ $med->id }})">Restock</button>
                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#view"
                                            wire:click="view({{ $med->id }})">View</button>
                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit"
                                            wire:click="edit({{ $med->id }})">Edit</button>
                                        <button class="btn btn-sm btn-danger"
                                            wire:click='deleteConfirm({{ $med->id }})'>Delete</button>
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
