<!-- resources/views/buat_surat.blade.php -->
@extends('adminStaffPages.layouts.index')
@section('content')
    <div class="mt-20 lg:mt-0">
        <h2 class="text-2xl font-semibold mb-4 text-center lg:text-start mt-2">Surat Tugas</h2>
        <div class="bg-white p-3 rounded-lg lg:rounded-lg">
            <form action="{{ route('proses-surat') }}" method="post">
                @csrf
                <label for="nama_siswa">Pilih Nama Siswa:</label>
                <select name="nama_siswa" id="nama_siswa">
                    <option selected disabled>-- Pilih --</option>
                    @foreach ($students as $student => $nama_siswa)
                        <option value="{{ $student }}">{{ $nama_siswa }}</option>
                    @endforeach
                </select>
                <button type="submit">Proses Surat</button>
            </form>
        </div>
    </div>
@endsection
