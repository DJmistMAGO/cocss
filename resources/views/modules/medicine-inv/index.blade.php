@extends('layout.app')

@section('title')
    Medicine Inventory
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    @livewire('med-inv.index-show')
@endsection
@push('scripts')
    @livewireScripts
@endpush
