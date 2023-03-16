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
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                daysOfWeekDisabled: [0, 6],
                startDate: new Date(),
            });
        });
    </script>
@endpush
