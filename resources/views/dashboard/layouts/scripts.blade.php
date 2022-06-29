<!-- Include jQuery -->
<script src="{{ asset('dashboard/js/jquery-2.2.4.min.js') }}"></script>
<!-- Custom Script -->
<script src="{{ asset('dashboard/js/script.js') }}"></script>
<!-- Calender -->
<script src="{{ asset('dashboard/js/calender.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

@foreach ($errors->all() as $error)
    <script>
        toastr.success("{{ $error }}");;
    </script>
@endforeach
