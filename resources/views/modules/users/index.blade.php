@extends('layout.app')


@section('title')
    User's List
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    @livewire('users.index-show')
@endsection
@push('scripts')
    @livewireScripts
@endpush
