@extends('layout.app')


@section('title')
    Appointment History
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    @livewire('appointment-history.index-show')
@endsection
@push('scripts')
    @livewireScripts
@endpush
