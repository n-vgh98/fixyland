@if (session('success'))
    <script>
        Swal.fire({
            title: 'Done',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    </script>
@endif
@if (session('fail'))
    <script>
        Swal.fire({
            title: 'Fail',
            text: '{{ session('fail') }}',
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    </script>
@endif
