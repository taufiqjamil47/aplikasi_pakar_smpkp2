<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/admin/staff.css', 'resources/js/admin/staff.js'])
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <title>Document</title>
</head>

<body class="font-sans bg-gray-100 flex">
    {{-- Sidebar --}}
    @include('adminStaffPages.layouts.sidebar')

    <!-- Content -->
    <main class="flex-1 p-0 lg:p-4 overflow-y-auto">
        <!-- Header -->
        @include('adminStaffPages.layouts.navbar')

        <!-- Main content goes here -->
        @yield('content')
    </main>
</body>
<script>
    const hamburger = document.querySelector('#hamburger');
    const navMenu = document.querySelector('#nav-menu');
    hamburger.addEventListener('click', function() {
        hamburger.classList.toggle('hamburger-active');
        navMenu.classList.toggle('hidden');
    });

    // document.addEventListener('click', function(event) {
    //     const target = event.target;
    //     if (target !== hamburger) {
    //         hamburger.classList.remove('hamburger-active');
    //         navMenu.classList.add('hidden');
    //     }
    // });
</script>

</html>
