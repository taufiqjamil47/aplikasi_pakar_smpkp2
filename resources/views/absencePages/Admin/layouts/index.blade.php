<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>

<body>
    <!-- Main Container -->
    <div class="flex h-screen bg-gray-100">
        @include('absencePages.Admin.layouts.sidebar')
        @yield('content')
    </div>
</body>
<!-- JavaScript for interactive elements -->
<script>
    // Toggle mobile menu
    function toggleMobileMenu() {
        const mobileSidebar = document.getElementById('mobileSidebar');
        mobileSidebar.classList.toggle('hidden');
    }

    // Toggle user dropdown menu
    document.getElementById('userMenuButton').addEventListener('click', function() {
        document.getElementById('userMenuDropdown').classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenuDropdown = document.getElementById('userMenuDropdown');

        if (!userMenuButton.contains(event.target) && !userMenuDropdown.contains(event.target)) {
            userMenuDropdown.classList.add('hidden');
        }
    });

    // Add animation classes
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.fade-in');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('animate__animated', 'animate__fadeIn');
            }, index * 100);
        });
    });
</script>

</html>
