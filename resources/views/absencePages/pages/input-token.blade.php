@extends('absencePages.layouts.index')
@section('content')
    <div class="container mx-auto px-2 py-8 max-w-6xl">
        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-4 card-hover fade-in">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Input Token Absensi</h1>
                    <p class="text-indigo-600 font-medium">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ date('d M Y') }}
                        </span>
                    </p>
                </div>
                <div class="mt-4 md:mt-0 flex flex-col md:flex-row items-center space-y-3 md:space-y-0 md:space-x-4">
                    <div class="flex items-center space-x-2">
                        <div class="h-3 w-3 rounded-full bg-green-500 animate-pulse"></div>
                        <span class="text-sm text-gray-600">Sistem Absensi Online</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Messages -->
        <div class="space-y-4 mb-4">
            @if (session('error'))
                <div
                    class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg animate__animated animate__fadeIn">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div
                    class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg animate__animated animate__fadeIn">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Token Input Form -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 card-hover fade-in">
            <form action="{{ route('absen.validate') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="token" class="block text-sm font-medium text-gray-700 mb-1">Masukkan Token
                        Absensi</label>
                    <input type="text" name="token" id="token" placeholder="Masukkan token yang valid" required
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        Lanjutkan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
