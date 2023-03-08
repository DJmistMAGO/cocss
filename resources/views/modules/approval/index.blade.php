@extends('layout.app')


@section('title')
    For Approval
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
@livewire('for-approval.index-show')
@endsection
@push('scripts')
    @livewireScripts
@endpush


