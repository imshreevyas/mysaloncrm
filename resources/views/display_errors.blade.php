@if (session('success'))
    <script>
        $(document).ready(function() {
            show_toast('success', '{{ session('success') }}')
        });
    </script>
@endif

@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            $(document).ready(function() {
                show_toast('error', '{{ $error }}')
            });
        @endforeach
    </script>
@endif