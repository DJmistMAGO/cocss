@extends('layout.app')


@section('title')
    Check Up | Appointment
@endsection

@section('content')
    <form action="{{ route('appointment.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                                <a href="{{ route('appointment.index') }}" class="btn btn-sm btn-icon btn-light-primary mr-4">
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
                                        value="{{ $book_appointment->user->name }}" placeholder="Enter Patient Name"
                                        readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Patient Name:<span class="text-danger">*</span></label>
                                    <input type="date" name="patient_name" class="form-control"
                                        value="{{ $book_appointment->appointment_date->format('Y-m-d') }}"
                                        placeholder="Enter Patient Name" readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Patient Name:<span class="text-danger">*</span></label>
                                    <input type="time" name="patient_name" class="form-control"
                                        value="{{ $book_appointment->appointment_time }}" placeholder="Enter Patient Name"
                                        readonly />
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Reason:<span class="text-danger">*</span></label>
                                    <textarea name="reason" class="form-control" rows="2" readonly>{{ $book_appointment->reason }}</textarea>
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
                                <input type="hidden" name="book_appointment_id" value="{{ $book_appointment->id }}">
                                <div class="form-group col-md-12">
                                    <label>Result:<span class="text-danger">*</span></label>
                                    <textarea name="result" class="form-control @error('result') is-invalid @enderror" rows="2" required>{{ old('result') }}</textarea>
                                    @error('result')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                    <button type="button" class="btn btn-primary mb-3" data-add-item>Add new item</button>
                    <div class="row border rounded-sm border-primary mt-3 pt-3 pb-3" data-parent>
                        <div class="col-md-12 d-flex flex-wrap">
                            <div class="form-group col-md-4">
                                <label>Medicine:<span class="text-danger">*</span></label>
                                <select name="medicine_name[]" class="form-control @error('medicine_name') is-invalid @enderror"
                                    required>
                                    <option value="">--Please Select--</option>
                                    @foreach ($medicine as $med)
                                        <option value="{{ $med->id }}" @selected(old('medicine_name.0') == $med->id)>
                                            {{ $med->med_name }}</option>
                                    @endforeach
                                </select>
                                @error('med_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label>Quantity:<span class="text-danger">*</span></label>
                                <input type="number" name="med_quantity[]"
                                    class="form-control @error('med_quantity') is-invalid @enderror" required
                                    value="{{ old('med_quantity.0') }}" placeholder="Enter Item" />

                                @error('med_quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Time to Take:</label>
                                <div class="input-group">
                                    <textarea name="med_time[]" cols="30" rows="1" class="form-control @error('med_time') is-invalid @enderror"
                                        required>{{ old('med_time.0') }}</textarea>
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
                    <x-slot:footer>
                        <div class=" pt-2 pb-2 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary col-md-3">Create</button>
                        </div>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </form>
@endsection
