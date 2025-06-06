<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/auth/auth.css', 'resources/js/auth/auth.js'])
    <title>{{ $title }}</title>
</head>

<body class="bg-slate-200">
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (Session::has('success'))
        <div id="success-message" class="fixed bg-green-300 text-green-800 p-4 rounded-[10px] top-3 left-3">
            {{ Session::get('success') }}
        </div>
        <script>
            // Menggunakan jQuery untuk menunggu 5 detik dan kemudian menyembunyikan pesan
            $(document).ready(function() {
                setTimeout(function() {
                    $('#success-message').fadeOut('slow');
                }, 5000);
            });
        </script>
    @endif
    @yield('content')
</body>

<script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.querySelector('svg').classList.toggle('text-blue-600');
    });

    // Toggle confirm password visibility
    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        const confirmPasswordInput = document.getElementById('confirm-password');
        const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordInput.setAttribute('type', type);
        this.querySelector('svg').classList.toggle('text-blue-600');
    });
</script>

<script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.querySelector('svg').classList.toggle('text-blue-600');
    });
</script>

</html>
