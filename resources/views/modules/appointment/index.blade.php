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

                if (counter == 1) {
                    $('.delete-medicine').show();
                }

                var newForm = $('.form-medicine:first').clone(true);
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
                    counter--;
                    if (counter == 1) {
                        $('.delete-medicine').hide();
                    }
                }
            });
        });
    </script>
@endpush
