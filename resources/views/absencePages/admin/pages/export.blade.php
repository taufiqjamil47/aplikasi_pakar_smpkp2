@extends('absencePages.admin.layouts.index')

@section('content')
    <div class="min-h-screen bg-gray-50 py-4 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                    <h2 class="text-2xl font-bold text-white">Export Data Kehadiran Siswa</h2>
                    <p class="text-blue-100 mt-1">Pilih kelas dan periode untuk mengekspor data kehadiran</p>
                </div>

                <!-- Card Body -->
                <div class="p-6">
                    <form action="{{ route('attendance.export') }}" method="GET" class="space-y-6">
                        <!-- Classroom Selection -->
                        <div class="space-y-2">
                            <label for="classroom_id" class="block text-sm font-medium text-gray-700">Pilih Kelas</label>
                            <select name="classroom_id" id="classroom_id"
                                class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Period Selection -->
                        <div class="space-y-2">
                            <label for="period" class="block text-sm font-medium text-gray-700">Pilih Periode</label>
                            <div class="grid grid-rows-3-3 lg:grid-cols-3 gap-3">
                                <label
                                    class="flex items-center space-x-2 p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                                    <input type="radio" name="period" value="weekly"
                                        class="text-blue-600 focus:ring-blue-500" checked>
                                    <span>Mingguan</span>
                                </label>
                                <label
                                    class="flex items-center space-x-2 p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                                    <input type="radio" name="period" value="monthly"
                                        class="text-blue-600 focus:ring-blue-500">
                                    <span>Bulanan</span>
                                </label>
                                <label
                                    class="flex items-center space-x-2 p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                                    <input type="radio" name="period" value="semester"
                                        class="text-blue-600 focus:ring-blue-500">
                                    <span>Semester</span>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit"
                                class="w-full flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Export ke Excel
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Card Footer -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    <p class="text-sm text-gray-500">Data akan diekspor dalam format XLSX sesuai periode yang dipilih</p>
                </div>
            </div>
        </div>
    </div>
@endsection
