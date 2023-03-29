@extends('layout.app')


@section('title')
    View | Health Record
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
<form action="{{ route('appointment.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <a href="{{ route('healthRecord.index') }}" class="btn btn-sm btn-icon btn-light-primary mr-4">
                                <i class="flaticon2-left-arrow-1"></i>
                            </a>
                            <h3 class="card-label">
                                Patient Information
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label >Patient Name:<span class="text-danger">*</span></label>
                                <input type="text" name="patient_name" class="form-control"
                                    value="{{ $bookappointment->user->name }}" placeholder="Enter Patient Name"
                                    readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label >Patient Name:<span class="text-danger">*</span></label>
                                <input type="date" name="patient_name" class="form-control"
                                    value="{{ $bookappointment->appointment_date->format('Y-m-d') }}"
                                    placeholder="Enter Patient Name" readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label >Patient Name:<span class="text-danger">*</span></label>
                                <input type="time" name="patient_name" class="form-control"
                                    value="{{ $bookappointment->appointment_time }}" placeholder="Enter Patient Name"
                                    readonly />
                            </div>
                            <div class="form-group col-md-12">
                                <label>Reason:<span class="text-danger">*</span></label>
                                <textarea name="reason" class="form-control" rows="2" readonly>{{ $bookappointment->reason }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                Check Up
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="book_appointment_id" value="{{ $bookappointment->id }}">
                            <div class="form-group col-md-12">
                                <label>Result:<span class="text-danger">*</span></label>
                                <textarea name="result" class="form-control  rows="2" required>{{ $bookappointment->appointment->results }}</textarea>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <x-card title="Medicine to Take" data-item-container>
                {{-- <button type="button" class="btn btn-primary mb-3" data-add-item>Add new item</button> --}}
                @foreach($appointmentMedicine as $appMed)
                <div class="row border rounded-sm border-primary mt-3 pt-3 pb-3"{{ $loop->first ? 'data-parent' : '' }}>
                    <input readonly  type="hidden" name="liquidationId[]" value="{{ $appMed->id }}">
                    <div class="col-md-12 d-flex flex-wrap">
                        <div class="form-group col-md-4">
                            <label>Medicine:<span class="text-danger">*</span></label>
                            <select name="medicine_name[]" disabled class="form-control @error('medicine_name') is-invalid @enderror"
                                required>
                                <option value="">--Please Select--</option>
                                @foreach ($medicine as $med)
                                    <option value="{{ $med->id }}" @selected($med->id == $appMed->medicine_name)>
                                    {{ $med->med_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Quantity:<span class="text-danger">*</span></label>
                            <input readonly type="number" name="med_quantity[]"
                                class="form-control @error('med_quantity') is-invalid @enderror" required
                                value="{{ $appMed->med_quantity }}" placeholder="Enter Item" />

                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Time to Take:</label>
                            <div class="input-group">
                                <textarea readonly name="med_time[]" cols="30" rows="1" class="form-control @error('med_time') is-invalid @enderror"
                                    required>{{ $appMed->med_time }}</textarea>
                                <div class="input-group-append d-none" data-item-hide>
                                    <button class="btn btn-danger" type="button" data-remove-item>
                                        <span class="flaticon2-trash"></span>
                                    </button>
                                </div>
                                @error('med_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <x-slot:footer>
                    <div class=" pt-2 pb-2 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary col-md-3">Create</button>
                    </div>
                </x-slot:footer> --}}
            </x-card>
        </div>
    </div>
</form>
@endsection
@push('scripts')
    @livewireScripts
@endpush
