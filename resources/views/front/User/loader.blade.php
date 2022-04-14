<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>Fixy Land</title>

    <!-- bootstrap styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>



<body>

    <main>

        <div class="vh-100 d-flex justify-content-center align-items-center">
            <img src="{{ asset('frontend/fixy-land-en-main/gif/loader.gif') }}" alt="loader" />
        </div>
    </main>



    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            // get message functions
            function checker() {
                $.ajax({
                    url: "{{ route('user.service.find.checker', $order->id) }}",
                    type: 'get',
                    success: function(data) {
                        if (typeof data.route !== 'undefined') {
                            window.location.replace(data.route);
                        }
                    }
                });

            }
            setInterval(checker, 5000)

        })
    </script>
</body>



</html>
