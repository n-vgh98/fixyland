@if (session('success'))
    <script>
        // wihtout timer
        // Swal.fire({
        //     title: 'Done',
        //     text: '{{ session('success') }}',
        //     icon: 'success',
        //     confirmButtonText: 'Ok'
        // })

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: true,
            timer: 1250
        })
    </script>
@endif
@if (session('fail'))
    <script>
        // wihtout timer
        // Swal.fire({
        //     title: 'Fail',
        //     text: '{{ session('fail') }}',
        //     icon: 'error',
        //     confirmButtonText: 'Ok'
        // })

        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '{{ session('fail') }}',
            showConfirmButton: true,
            timer: 5000
        })
    </script>
@endif
