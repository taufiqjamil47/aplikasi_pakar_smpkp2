<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/ppdb/app.css', 'resources/css/cdn/toastr.min.css', 'resources/js/ppdb/app.js', 'resources/js/cdn/toastr.min.js'])
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('e0887344edf7a452d669', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('popup-channel');
        channel.bind('data-baru', function(data) {
            toastr.success(JSON.stringify(data.nama_siswa) + ' telah ditambahkan oleh ' + JSON.stringify(data
                .name));
        });
    </script>
    <title>Document</title>
</head>

<body class="flex flex-col min-h-screen">
    {{-- Header Section --}}
    @include('ppdbPages.layouts.header')

    {{-- Body Section --}}
    @yield('content')

    {{-- Message --}}
    {{-- @include('ppdbPages.layouts.message') --}}

    {{-- Jumlah total siswa  --}}
    @include('ppdbPages.layouts.total')

    <!-- footer start -->
    @include('ppdbPages.layouts.footer')
</body>

</html>
