@extends('layout.app')


@section('title')
    Appointment
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
@livewire('appointment.index-show')
@endsection
@push('scripts')
    @livewireScripts
@endpush


