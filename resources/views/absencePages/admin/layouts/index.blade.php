<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAKAR.attendance</title>

    <!-- Performance Optimizations -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Modern Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Simplified Asset Loading -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <!-- Tailwind via CDN (for production, consider self-hosting) -->
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/css/attendance/app.css', 'resources/js/attendance/app.js'])

</head>

<body class="font-sans bg-gray-50 text-gray-800 flex flex-col min-h-screen">
    <!-- Header/Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        @include('absencePages.admin.layouts.navbar')
    </header>

    <div class="flex flex-1">
        @include('absencePages.admin.layouts.sidebar')

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            {{-- content section --}}
            @yield('content')
        </main>
    </div>

    {{-- floating section --}}
    @include('absencePages.admin.layouts.floating')

    {{-- footer section --}}
    @include('absencePages.admin.layouts.footer')
</body>

</html>
