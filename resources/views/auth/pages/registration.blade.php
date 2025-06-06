@extends('auth.layouts.index')
@section('content')
    <div class="flex flex-col lg:flex-row lg:h-screen justify-center items-center m-4 lg:my-0 gap-5 sm:gap-10">
        <!-- Left Panel - Branding -->
        <div
            class="transition-all duration-500 ease-in-out transform hover:scale-[1.02] shadow-2xl bg-gradient-to-br from-blue-600 to-blue-400 px-6 py-8 w-full sm:w-96 lg:w-[15rem] h-auto lg:h-[32rem] rounded-xl text-white relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full"></div>
            <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-white/5 rounded-full"></div>

            <div class="relative z-10 flex flex-col items-center lg:items-start h-full">
                <embed src="img/Pakar2.svg" class="h-36 w-36 bg-white p-3 rounded-full shadow-lg mb-6" type="">
                <h1 class="text-3xl font-bold my-2 flex-wrap tracking-tight">PAKAR<span class="text-blue-200">.</span>solution
                </h1>
                <span class="font-light text-blue-100 leading-relaxed">
                    Aplikasi manajemen pendidikan yang memberikan kemudahan akses data dan informasi bagi Pendidik dan
                    Tendik.
                </span>

                <!-- Additional decorative element at bottom -->
                <div class="mt-auto hidden lg:block w-full">
                    <div class="h-1 bg-white/20 rounded-full mb-2"></div>
                    <p class="text-xs text-blue-100">SMP KP 2 Majalaya</p>
                </div>
            </div>
        </div>

        <!-- Right Panel - Registration Form -->
        <div
            class="transition-all duration-500 ease-in-out transform hover:scale-[1.02] shadow-2xl bg-white px-6 py-4 w-full sm:w-96 lg:w-[34rem] h-auto lg:h-[37rem] rounded-xl text-slate-800 relative overflow-hidden">
            <!-- Decorative corner element -->
            <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-full"></div>

            <div class="relative z-10">
                <form action="{{ route('store-register') }}" method="post" class="mt-2">
                    @csrf
                    <div class="mb-2">
                        <h2 class="font-bold text-3xl text-slate-800 mb-1">Registrasi</h2>
                        <p class="text-slate-600">Buat akun baru untuk mulai menggunakan aplikasi</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Email Field -->
                        <div class="flex flex-col text-slate-800">
                            <div class="flex flex-row justify-between">
                                <label for="email" class="font-medium text-slate-700">Surel <span
                                        class="text-red-500">*</span></label>
                                @error('email')
                                    <div class="relative text-end">
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="h-11 rounded-lg bg-blue-50/50 px-4 text-slate-700 border border-blue-100 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none transition-all duration-200">
                        </div>

                        <!-- Name Field -->
                        <div class="flex flex-col text-slate-800">
                            <div class="flex flex-row justify-between">
                                <label for="name" class="font-medium text-slate-700">Nama <span
                                        class="text-red-500">*</span></label>
                                @error('name')
                                    <div class="relative text-end">
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="h-11 rounded-lg bg-blue-50/50 px-4 text-slate-700 border border-blue-100 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none transition-all duration-200">
                        </div>

                        <!-- Password Field -->
                        <div class="flex flex-col text-slate-800">
                            <label for="password" class="font-medium text-slate-700">Password <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="password" name="password" id="password"
                                    class="h-11 w-full rounded-lg bg-blue-50/50 px-4 text-slate-700 border border-blue-100 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none transition-all duration-200">
                                <button type="button"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-blue-600"
                                    id="togglePassword">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="flex flex-col text-slate-800">
                            <label for="confirm-password" class="font-medium text-slate-700">Konfirmasi Password <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="password" name="confirm-password" id="confirm-password"
                                    class="h-11 w-full rounded-lg bg-blue-50/50 px-4 text-slate-700 border border-blue-100 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none transition-all duration-200">
                                <button type="button"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-blue-600"
                                    id="toggleConfirmPassword">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Terms Agreement -->
                    <div class="flex items-start mt-4">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                        </div>
                        <label for="terms" class="ml-2 block text-sm text-slate-600">
                            Saya menyetujui <a href="#"
                                class="text-blue-600 hover:text-blue-800 hover:underline">Syarat & Ketentuan</a> dan <a
                                href="#" class="text-blue-600 hover:text-blue-800 hover:underline">Kebijakan
                                Privasi</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full mt-6 bg-gradient-to-r from-blue-600 to-blue-500 h-12 rounded-lg text-white font-semibold shadow-md hover:shadow-lg hover:from-blue-700 hover:to-blue-600 transition-all duration-300 transform hover:-translate-y-0.5">
                        BUAT AKUN
                    </button>
                </form>

                <!-- Login Link -->
                <div class="text-center mt-5 text-sm text-slate-600">
                    Sudah punya akun? <a href="/login"
                        class="font-medium text-blue-600 hover:text-blue-800 hover:underline">Masuk disini</a>
                </div>

                <!-- Social Login Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-300"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="px-3 bg-white text-sm text-slate-500">Atau daftar dengan</span>
                    </div>
                </div>

                <!-- Social Login Buttons -->
                <div class="grid grid-cols-2 gap-4">
                    <button
                        class="flex items-center justify-center gap-2 border border-blue-400 rounded-lg p-3 text-blue-600 hover:bg-blue-50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z" />
                        </svg>
                        <span>belajar.id</span>
                    </button>
                    <button
                        class="flex items-center justify-center gap-2 border border-red-400 rounded-lg p-3 text-red-600 hover:bg-red-50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z" />
                        </svg>
                        <span>Gmail</span>
                    </button>
                </div>

                <!-- Footer -->
                <div class="mt-8 text-xs text-slate-500 text-center">
                    &copy;2020-<?php echo date('Y'); ?> PAKAR.solution - SMP KP 2 Majalaya
                </div>
            </div>
        </div>
    </div>
@endsection
