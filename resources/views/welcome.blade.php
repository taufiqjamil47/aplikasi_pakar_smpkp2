<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portal Layanan Aplikasi PAKAR.solution SMP KP 2 Majalaya">

    <title>PAKAR.solution</title>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/home/welcome.css', 'resources/js/home/welcome.js'])
</head>

<body class="antialiased bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Animated background elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div
            class="absolute top-0 left-0 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob dark:bg-blue-800">
        </div>
        <div
            class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000 dark:bg-green-800">
        </div>
        <div
            class="absolute bottom-0 left-1/2 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000 dark:bg-purple-800">
        </div>
    </div>

    <div class="relative min-h-screen flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto w-full">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="flex flex-col items-center justify-center">
                    <div
                        class="w-32 h-32 md:w-40 md:h-40 bg-white dark:bg-gray-800 rounded-full shadow-lg p-2 mb-6 transform hover:scale-105 transition-transform duration-300">
                        <img src="{{ url('img/logo_sekolah.png') }}" alt="Logo Sekolah"
                            class="w-full h-full object-contain">
                    </div>

                    <h1 class="text-3xl md:text-5xl font-bold text-gray-800 dark:text-white mb-4">
                        Portal Layanan Aplikasi <span class="text-blue-600 dark:text-blue-400">PAKAR</span>
                    </h1>

                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                        Kumpulan jalan pintas menuju masing-masing aplikasi PAKAR.solution SMP KP 2 Majalaya
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="#portal"
                                class="px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-lg shadow-md hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center">
                                <i class="fas fa-th-large mr-2"></i> Portal
                            </a>
                        @else
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}"
                                    class="px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-lg shadow-md hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center">
                                    <i class="fas fa-sign-in mr-2"></i> Login
                                </a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-medium rounded-lg shadow-md hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center">
                                    <i class="fas fa-user-plus mr-2"></i> Registrasi Akun
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>

            <!-- Applications Grid -->
            <div class="mt-15" id="portal">
                @auth
                    <h2 class="text-2xl md:text-2xl font-bold text-center text-gray-800 dark:text-white mb-5">
                        Hai 👋🏻, {{ Auth::user()->name }}
                        <span class="text-white bg-blue-600 px-2 rounded-md animate-pulse">
                            {{ Auth::user()->role_name }}
                        </span>
                    </h2>
                @endauth
                <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 dark:text-white mb-10">
                    silahkan pilih Aplikasi yang anda butuhkan
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <!-- PPDB Card -->
                    <a href="/login"
                        class="group relative overflow-hidden bg-white dark:bg-gray-800 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 opacity-0 group-hover:opacity-10 transition-opacity duration-300">
                        </div>
                        <div class="p-6 flex items-start">
                            <div class="flex-shrink-0">
                                <div
                                    class="h-16 w-16 bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center rounded-xl text-blue-500 dark:text-blue-400 group-hover:bg-blue-50 dark:group-hover:bg-blue-900/50 transition-colors duration-300">
                                    <i class="fas fa-user-graduate text-2xl"></i>
                                </div>
                            </div>
                            <div class="ml-6">
                                <h3
                                    class="text-xl font-semibold text-gray-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">
                                    PAKAR.spmb
                                </h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">
                                    Aplikasi unggulan untuk mengelola Sistem Penerimaan Siswa Baru (SPMB). Memberikan
                                    solusi terpadu untuk mempermudah proses pendaftaran serta pengelolaan PPDB di
                                    lembaga pendidikan.
                                </p>
                            </div>
                        </div>
                        <div
                            class="px-6 py-4 bg-gray-50 dark:bg-gray-700/30 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center">
                            <span class="text-sm text-blue-600 dark:text-blue-400 font-medium">Klik untuk
                                mengakses</span>
                            <i
                                class="fas fa-arrow-right text-blue-500 dark:text-blue-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                        </div>
                    </a>

                    <!-- Presence Card -->
                    <a href="@auth /presence-dash @else /absen-hari-ini/form @endauth"
                        class="group relative overflow-hidden bg-white dark:bg-gray-800 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-500 to-green-600 opacity-0 group-hover:opacity-10 transition-opacity duration-300">
                        </div>
                        <div class="p-6 flex items-start">
                            <div class="flex-shrink-0">
                                <div
                                    class="h-16 w-16 bg-green-100 dark:bg-green-900/30 flex items-center justify-center rounded-xl text-green-500 dark:text-green-400 group-hover:bg-green-50 dark:group-hover:bg-green-900/50 transition-colors duration-300">
                                    <i class="fas fa-calendar-check text-2xl"></i>
                                </div>
                            </div>
                            <div class="ml-6">
                                <h3
                                    class="text-xl font-semibold text-gray-800 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors duration-300">
                                    PAKAR.presence
                                </h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">
                                    Aplikasi khusus untuk Piket dalam menjalankan tugasnya secara digital. Memudahkan
                                    pengabsenan harian dengan antarmuka yang intuitif dan fitur yang lengkap.
                                </p>
                            </div>
                        </div>
                        <div
                            class="px-6 py-4 bg-gray-50 dark:bg-gray-700/30 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center">
                            <span class="text-sm text-green-600 dark:text-green-400 font-medium">Klik untuk
                                mengakses</span>
                            <i
                                class="fas fa-arrow-right text-green-500 dark:text-green-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <a href="https://github.com/taufiqjamil47"
                            class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-white transition-colors duration-300 flex items-center">
                            <i class="fas fa-heart text-red-500 mr-2"></i>
                            <span>PAKAR.solution | SMP KP 2 Majalaya</span>
                        </a>
                    </div>
                    <div class="text-gray-500 dark:text-gray-400 text-sm">
                        App Version {{ Illuminate\Foundation\Application::VERSION }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
