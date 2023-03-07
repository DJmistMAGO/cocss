@extends('layout.app')


@section('title')
    Book Appointment
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
@livewire('book-appointment.index-show')
@endsection
@push('scripts')
    @livewireScripts
@endpush


