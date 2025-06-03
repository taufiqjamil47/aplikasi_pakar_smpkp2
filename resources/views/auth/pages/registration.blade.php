@extends('auth.layouts.index')
@section('content')
    <div class="flex flex-col lg:flex-row lg:h-screen justify-center items-center m-4 lg:my-0 gap-5 sm:gap-10">
        <div
            class="shadow-2xl bg-blueColor px-4 py-7 w-full sm:w-96 lg:w-[13rem] h-auto lg:h-[30rem] rounded-[10px] text-white">
            <embed src="img/Pakar2.svg" class="h-32 w-32 bg-white p-3 rounded-full" type="">
            <h1 class="text-3xl font-semibold my-2 flex-wrap">PAKAR . solution</h1>
            <span class="font-light">Merupakan sebuah aplikasi managemen pendidikan yang menawarkan kemudahan kepada
                Pendidik dan Tendik dalam
                mengakses data serta informasi.</span>
        </div>
        <div
            class="shadow-2xl bg-white px-4 py-7 w-full sm:w-96 lg:w-[34rem] h-auto lg:h-[33rem] rounded-[10px] text-slate-800">
            <form action="{{ route('store-register') }}" method="post" class="mt-4">
                @csrf
                <h2 class="font-semibold text-2xl">Registrasi</h2>
                <h2>Buat akun baru</h2>
                <div class="grid grid-rows-2 md:grid-cols-2 justify-center gap-4 my-3">
                    <div class="flex flex-col text-slate-800">
                        <div class="flex flex-row justify-between">
                            <label for="email">Surel<b class="text-red-500">*</b>
                            </label>
                            @error('email')
                                <div class="relative text-end">
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="h-[35px] rounded bg-blue-50 px-3 text-slate-600 focus:ring-1 focus:border-blueColor focus:outline-none">
                    </div>
                    <div class="flex flex-col text-slate-800">
                        <div class="flex flex-row justify-between">
                            <label for="name">Nama <b class="text-red-500">*</b>
                            </label>
                            @error('name')
                                <div class="relative text-end">
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <input type="name" name="name" id="name" value="{{ old('name') }}"
                            class="h-[35px] rounded bg-blue-50 px-3 text-slate-600 focus:ring-1 focus:border-blueColor focus:outline-none">
                    </div>
                    <div class="flex flex-col text-slate-800">
                        <label for="password">Password <b class="text-red-500">*</b></label>
                        <input type="password" name="password" id="password"
                            class="h-[35px] rounded bg-blue-50 px-3 text-slate-600 focus:ring-1 focus:border-blueColor focus:outline-none">
                    </div>
                    <div class="flex flex-col text-slate-800">
                        <label for="confirm-password">re-Password <b class="text-red-500">*</b></label>
                        <input type="password" name="confirm-password" id="confirm-password"
                            class="h-[35px] rounded bg-blue-50 px-3 text-slate-600 focus:ring-1 focus:border-blueColor focus:outline-none">
                    </div>
                </div>
                <div class="flex flex-col justify-center mt-5">
                    <button type="submit" class="bg-blueColor h-10 rounded text-white font-medium">
                        BUAT
                    </button>
                </div>
            </form>
            <div class="flex flex-row justify-between mb-3">
                <a href="#lupaSandi" class="text-blueColor font-light">Lupa kata sandi?</a>
                <a href="/login" class="text-blueColor font-light">Sudah punya akun?</a>
            </div>
            <div class="grid grid-cols-3 justify-between items-center text-center px-2 my-3">
                <div class="h-[1px] bg-slate-300"></div>
                <h1 class="text-xs">Atau masuk dengan</h1>
                <div class="h-[1px] bg-slate-300"></div>
            </div>
            <div class="grid grid-cols-2 justify-between items-center text-center gap-6">
                <button class="border border-blueColor rounded p-2 text-blueColor">Akun belajar.id</button>
                <button class="border border-red-500 rounded p-2 text-red-500">Akun Gmail</button>
            </div>
            <div class="mt-9 text-xs text-slate-600 text-center">&copy;2020-<?php echo date('Y'); ?> PAKAR.solution - SMP KP 2
                Majalaya</div>
        </div>
    </div>
@endsection
