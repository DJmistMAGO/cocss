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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            var counter = 1;

            $('.add-medicine').click(function(e) {
                e.preventDefault();

                var newForm = $('.form-medicine').clone(true);
                newForm.find('input, textarea').each(function() {
                    $(this).attr('name', $(this).attr('name') + counter);
                    $(this).attr('id', $(this).attr('id').replace('0', counter));
                    $(this).val('');
                });

                $('.form-medicine:last').after(newForm);

                counter++;
            });

            $('.delete-medicine').click(function() {
                var count = $('.form-medicine').length;
                if (count > 1) {
                    $('.form-medicine').last().remove();
                }
            });
        });
    </script>
@endpush
