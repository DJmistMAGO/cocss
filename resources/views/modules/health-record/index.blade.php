@extends('layout.app')


@section('title')
    Health Record
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
@livewire('health-record.index-show')
@endsection
@push('scripts')
    @livewireScripts
@endpush


