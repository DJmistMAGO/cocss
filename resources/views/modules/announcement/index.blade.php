@extends('layout.app')

@section('title')
    Announcement
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    @livewire('annoucement.index-show')
@endsection
@push('scripts')
    @livewireScripts


@endpush
