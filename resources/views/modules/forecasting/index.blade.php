@extends('layout.app')


@section('title')
    Forecasting
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    @livewire('forecasting.index-show')
@endsection
@push('scripts')
    @livewireScripts
@endpush
