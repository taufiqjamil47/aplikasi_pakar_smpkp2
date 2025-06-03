@extends('ppdbPages.layouts.index')
@section('content')
    <section>
        <div class="container w-[65%] m-auto my-[1.2rem] flex gap-5 flex-wrap items-center mt-4 p-4 bg-white ">
            <div class="py-8 m-auto w-full">
                <div>
                    <form action="{{ route('data-siswa.update', $student->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div>
                            <div class="container mb-4 non-printable">
                                <div class="container">
                                    <div class="flex flex-wrap justify-between">
                                        <div class="flex gap-4">
                                            <a href="/ppdb/data-siswa"
                                                class="flex flex-wrap gap-3 py-2 px-4 bg-slate-300 rounded-md hover:bg-slate-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                                </svg>
                                                Kembali
                                            </a>
                                        </div>
                                        <div class="items-center text-center m-auto">
                                            <h2 class="text-2xl uppercase">edit data - {{ $student->nama_siswa }}
                                            </h2>
                                        </div>
                                        <div class="flex gap-4">
                                            <button
                                                class="py-2 px-4 bg-green-300 rounded-md hover:bg-green-200">Simpan</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Identitas Peserta didik --}}
                            <section>
                                <div class="container">
                                    <div class="grid gap-2">
                                        <div class="flex justify-center bg-gray-600 text-white font-semibold">
                                            <h4>Identitas Peserta Didik</h4>
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="nama_siswa"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Nama
                                                Siswa</label>
                                            <input type="text"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="nama_siswa" value="{{ $student->nama_siswa }}" name="nama_siswa">
                                            @error('nama_siswa')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="jenis_kelamin"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Jenis
                                                Kelamin</label>
                                            <select type="text"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="jenis_kelamin" {{ $student->jenis_kelamin }} name="jenis_kelamin">
                                                <option>-- Pilih --</option>
                                                <option value="Laki-laki"
                                                    {{ $student->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                                </option>
                                                <option value="Perempuan"
                                                    {{ $student->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                                </option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="nisn"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">NISN</label>
                                            <input type="text" name="nisn"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="nisn" maxlength="10" value="{{ $student->nisn }}" />
                                            @error('nisn')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="nik"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">NIK</label>
                                            <input type="text" name="nik"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="nik" maxlength="16" value="{{ $student->nik }}" />
                                            @error('nik')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="tempat_lahir"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Tempat
                                                Lahir</label>
                                            <input type="text" name="tempat_lahir"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="tempat_lahir" value="{{ $student->tempat_lahir }}" />
                                            @error('tempat_lahir')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="tanggal_lahir"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Tanggal
                                                Lahir</label>
                                            <input type="date" name="tanggal_lahir"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="tanggal_lahir" value="{{ $student->tanggal_lahir }}" />
                                            @error('tanggal_lahir')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="agama"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Agama</label>
                                            <select type="text" {{ $student->agama }}
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="agama" name="agama">
                                                <option selected>-- Pilih --</option>
                                                <option value="Islam" {{ $student->agama == 'Islam' ? 'selected' : '' }}>
                                                    Islam</option>
                                                <option value="Kristen Protestan"
                                                    {{ $student->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen
                                                    Protestan
                                                </option>
                                                <option value="Katholik"
                                                    {{ $student->agama == 'Katholik' ? 'selected' : '' }}>
                                                    Katholik</option>
                                                <option value="Hindu" {{ $student->agama == 'Hindu' ? 'selected' : '' }}>
                                                    Hindu</option>
                                                <option value="Lainnya"
                                                    {{ $student->agama == 'Lainnya' ? 'selected' : '' }}>
                                                    Lainnya</option>
                                            </select>
                                            @error('agama')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="alamat"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Alamat</label>
                                            <input type="text" name="alamat"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="alamat" value="{{ $student->alamat }}" />
                                            @error('alamat')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="rt"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">RT</label>
                                            <input type="text" name="rt"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="rt" value="{{ $student->rt }}" />
                                            @error('rt')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="rw"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">RW</label>
                                            <input type="text" name="rw"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="rw" value="{{ $student->rw }}" />
                                            @error('rw')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="desa"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Desa</label>
                                            <input type="text" name="desa"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="desa" value="{{ $student->desa }}" />
                                            @error('desa')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="kecamatan"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Kecamatan</label>
                                            <input type="text" name="kecamatan"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="kecamatan" value="{{ $student->kecamatan }}" />
                                            @error('kecamatan')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </section>
                            {{-- Berkas dan lain-lain --}}
                            <section>
                                <div class="container">
                                    <div class="grid gap-2">
                                        <div class="flex justify-center bg-gray-600 text-white font-semibold mt-2">
                                            <h4>Data Pelengkap</h4>
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="no_telp"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">No
                                                HP</label>
                                            <input type="text" name="no_telp"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="no_telp" value="{{ $student->no_telp }}" />
                                            @error('no_telp')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="asal_sekolah"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Asal
                                                Sekolah</label>
                                            <input type="text" name="asal_sekolah"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="asal_sekolah" value="{{ $student->asal_sekolah }}" />
                                            @error('asal_sekolah')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="pkh"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">PKH</label>
                                            <input type="text" name="pkh"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="pkh" value="{{ $student->pkh }}" />
                                            @error('pkh')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="kks"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">KKS</label>
                                            <input type="text" name="kks"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="kks" value="{{ $student->kks }}" />
                                            @error('kks')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="pip"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">PIP</label>
                                            <input type="text" name="pip"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="pip" value="{{ $student->pip }}" />
                                            @error('pip')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="tinggi_badan"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Tinggi
                                                Badan</label>
                                            <input type="text" name="tinggi_badan"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="tinggi_badan" value="{{ $student->tinggi_badan }}" />
                                            @error('tinggi_badan')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="berat_badan"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Berat
                                                Badan</label>
                                            <input type="text" name="berat_badan"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="berat_badan" value="{{ $student->berat_badan }}" />
                                            @error('berat_badan')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="anak_ke"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Anak
                                                Ke</label>
                                            <input type="text" name="anak_ke"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="anak_ke" value="{{ $student->anak_ke }}" />
                                            @error('anak_ke')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="ukuran_baju"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Ukuran
                                                Baju</label>
                                            <select type="text" {{ $student->ukuran_baju }}
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="ukuran_baju" name="ukuran_baju">
                                                <option selected>--pilih--</option>
                                                <option value="S"
                                                    {{ $student->ukuran_baju == 'S' ? 'selected' : '' }}>S</option>
                                                <option value="M"
                                                    {{ $student->ukuran_baju == 'M' ? 'selected' : '' }}>M</option>
                                                <option value="L"
                                                    {{ $student->ukuran_baju == 'L' ? 'selected' : '' }}>L</option>
                                                <option value="XL"
                                                    {{ $student->ukuran_baju == 'XL' ? 'selected' : '' }}>XL</option>
                                                <option value="XXL"
                                                    {{ $student->ukuran_baju == 'XXL' ? 'selected' : '' }}>XXL</option>
                                            </select>
                                            @error('ukuran_baju')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </section>
                            {{-- Data Orang Tua / Wali --}}
                            <section>
                                <div class="container">
                                    <div class="grid gap-2">
                                        <div class="flex justify-center bg-gray-600 text-white font-semibold mt-2">
                                            <h4>Identitas Orang Tua</h4>
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="nama_ayah"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Nama
                                                Ayah</label>
                                            <input type="text" name="nama_ayah"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="nama_ayah" value="{{ $student->nama_ayah }}" />
                                            @error('nama_ayah')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="tahun_lahir_ayah"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Tahun
                                                Lahir Ayah</label>
                                            <input type="text" name="tahun_lahir_ayah"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="tahun_lahir_ayah" value="{{ $student->tahun_lahir_ayah }}" />
                                            @error('tahun_lahir_ayah')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="pekerjaan_ayah"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Pekerjaan
                                                Ayah</label>
                                            <select type="text" {{ $student->pekerjaan_ayah }}
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="pekerjaan_ayah" name="pekerjaan_ayah">
                                                <option selected>-- pilih --</option>
                                                <option value="Tidak Bekerja"
                                                    {{ $student->pekerjaan_ayah == 'Tidak Bekerja' ? 'selected' : '' }}>
                                                    Tidak
                                                    Bekerja</option>
                                                <option value="Petani"
                                                    {{ $student->pekerjaan_ayah == 'Petani' ? 'selected' : '' }}>Petani
                                                </option>
                                                <option value="Peternak"
                                                    {{ $student->pekerjaan_ayah == 'Peternak' ? 'selected' : '' }}>Peternak
                                                </option>
                                                <option value="PNS/TNI/POLRI"
                                                    {{ $student->pekerjaan_ayah == 'PNS/TNI/POLRI' ? 'selected' : '' }}>
                                                    PNS/TNI/POLRI</option>
                                                <option value="Karyawan Swasta"
                                                    {{ $student->pekerjaan_ayah == 'Karyawan Swasta' ? 'selected' : '' }}>
                                                    Karyawan Swasta</option>
                                                <option value="Pedagang Kecil"
                                                    {{ $student->pekerjaan_ayah == 'Pedagang Kecil' ? 'selected' : '' }}>
                                                    Pedagang Kecil</option>
                                                <option value="Pedagang Besar"
                                                    {{ $student->pekerjaan_ayah == 'Pedagang Besar' ? 'selected' : '' }}>
                                                    Pedagang Besar</option>
                                                <option value="Wiraswasta"
                                                    {{ $student->pekerjaan_ayah == 'Wiraswasta' ? 'selected' : '' }}>
                                                    Wiraswasta
                                                </option>
                                                <option value="Wirausaha"
                                                    {{ $student->pekerjaan_ayah == 'Wirausaha' ? 'selected' : '' }}>
                                                    Wirausaha
                                                </option>
                                                <option value="Buruh"
                                                    {{ $student->pekerjaan_ayah == 'Buruh' ? 'selected' : '' }}>Buruh
                                                </option>
                                                <option value="Pensiunan"
                                                    {{ $student->pekerjaan_ayah == 'Pensiunan' ? 'selected' : '' }}>
                                                    Pensiunan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ $student->pekerjaan_ayah == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                                </option>
                                            </select>
                                            @error('pekerjaan_ayah')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="pendidikan_ayah"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Pendidikan
                                                Ayah</label>
                                            <select type="text" {{ $student->pendidikan_ayah }}
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="pendidikan_ayah" placeholder="--1, 3, atau 4--"
                                                name="pendidikan_ayah">
                                                <option selected>-- pilih --</option>
                                                <option value="Tidak Sekolah"
                                                    {{ $student->pendidikan_ayah == 'Tidak Sekolah' ? 'selected' : '' }}>
                                                    Tidak Sekolah</option>
                                                <option value="Putus SD"
                                                    {{ $student->pendidikan_ayah == 'Putus SD' ? 'selected' : '' }}>
                                                    Putus SD</option>
                                                <option value="SD Sederajat"
                                                    {{ $student->pendidikan_ayah == 'SD Sederajat' ? 'selected' : '' }}>
                                                    SD Sederajat</option>
                                                <option value="SMP"
                                                    {{ $student->pendidikan_ayah == 'SMP' ? 'selected' : '' }}>SMP
                                                </option>
                                                <option value="SMA"
                                                    {{ $student->pendidikan_ayah == 'SMA' ? 'selected' : '' }}>SMA
                                                </option>
                                                <option value="D1"
                                                    {{ $student->pendidikan_ayah == 'D1' ? 'selected' : '' }}>D1
                                                </option>
                                                <option value="D2"
                                                    {{ $student->pendidikan_ayah == 'D2' ? 'selected' : '' }}>D2
                                                </option>
                                                <option value="D3"
                                                    {{ $student->pendidikan_ayah == 'D3' ? 'selected' : '' }}>D3
                                                </option>
                                                <option value="D4/S1"
                                                    {{ $student->pendidikan_ayah == 'D4/S1' ? 'selected' : '' }}>
                                                    D4/S1</option>
                                                <option value="S2"
                                                    {{ $student->pendidikan_ayah == 'S2' ? 'selected' : '' }}>S2
                                                </option>
                                                <option value="S3"
                                                    {{ $student->pendidikan_ayah == 'S3' ? 'selected' : '' }}>S3
                                                </option>
                                            </select>
                                            @error('pendidikan_ayah')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="nama_ibu"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Nama
                                                Ibu</label>
                                            <input type="text" name="nama_ibu"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="nama_ibu" value="{{ $student->nama_ibu }}" />
                                            @error('nama_ibu')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="tahun_lahir_ibu"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Tahun
                                                Lahir Ibu</label>
                                            <input type="text" name="tahun_lahir_ibu"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="tahun_lahir_ibu" value="{{ $student->tahun_lahir_ibu }}" />
                                            @error('tahun_lahir_ibu')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="pekerjaan_ibu"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Pekerjaan
                                                Ibu</label>
                                            <select type="text" {{ $student->pekerjaan_ibu }}
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="pekerjaan_ibu" name="pekerjaan_ibu">
                                                <option selected>-- pilih --</option>
                                                <option value="Tidak Bekerja"
                                                    {{ $student->pekerjaan_ibu == 'Tidak Bekerja' ? 'selected' : '' }}>
                                                    Tidak
                                                    Bekerja</option>
                                                <option value="Petani"
                                                    {{ $student->pekerjaan_ibu == 'Petani' ? 'selected' : '' }}>Petani
                                                </option>
                                                <option value="Peternak"
                                                    {{ $student->pekerjaan_ibu == 'Peternak' ? 'selected' : '' }}>Peternak
                                                </option>
                                                <option value="PNS/TNI/POLRI"
                                                    {{ $student->pekerjaan_ibu == 'PNS/TNI/POLRI' ? 'selected' : '' }}>
                                                    PNS/TNI/POLRI</option>
                                                <option value="Karyawan Swasta"
                                                    {{ $student->pekerjaan_ibu == 'Karyawan Swasta' ? 'selected' : '' }}>
                                                    Karyawan Swasta</option>
                                                <option value="Pedagang Kecil"
                                                    {{ $student->pekerjaan_ibu == 'Pedagang Kecil' ? 'selected' : '' }}>
                                                    Pedagang Kecil</option>
                                                <option value="Pedagang Besar"
                                                    {{ $student->pekerjaan_ibu == 'Pedagang Besar' ? 'selected' : '' }}>
                                                    Pedagang Besar</option>
                                                <option value="Wiraswasta"
                                                    {{ $student->pekerjaan_ibu == 'Wiraswasta' ? 'selected' : '' }}>
                                                    Wiraswasta
                                                </option>
                                                <option value="Wirausaha"
                                                    {{ $student->pekerjaan_ibu == 'Wirausaha' ? 'selected' : '' }}>
                                                    Wirausaha
                                                </option>
                                                <option value="Buruh"
                                                    {{ $student->pekerjaan_ibu == 'Buruh' ? 'selected' : '' }}>Buruh
                                                </option>
                                                <option value="Pensiunan"
                                                    {{ $student->pekerjaan_ibu == 'Pensiunan' ? 'selected' : '' }}>
                                                    Pensiunan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ $student->pekerjaan_ibu == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                                </option>
                                            </select>
                                            @error('pekerjaan_ibu')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="pendidikan_ibu"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Pendidikan
                                                Ibu</label>
                                            <select type="text" {{ $student->pendidikan_ibu }}
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="pendidikan_ibu" placeholder="--1, 3, atau 4--" name="pendidikan_ibu">
                                                <option selected>-- pilih --</option>
                                                <option value="Tidak Sekolah"
                                                    {{ $student->pendidikan_ibu == 'Tidak Sekolah' ? 'selected' : '' }}>
                                                    Tidak Sekolah</option>
                                                <option value="Putus SD"
                                                    {{ $student->pendidikan_ibu == 'Putus SD' ? 'selected' : '' }}>
                                                    Putus SD</option>
                                                <option value="SD Sederajat"
                                                    {{ $student->pendidikan_ibu == 'SD Sederajat' ? 'selected' : '' }}>
                                                    SD Sederajat</option>
                                                <option value="SMP"
                                                    {{ $student->pendidikan_ibu == 'SMP' ? 'selected' : '' }}>SMP
                                                </option>
                                                <option value="SMA"
                                                    {{ $student->pendidikan_ibu == 'SMA' ? 'selected' : '' }}>SMA
                                                </option>
                                                <option value="D1"
                                                    {{ $student->pendidikan_ibu == 'D1' ? 'selected' : '' }}>D1
                                                </option>
                                                <option value="D2"
                                                    {{ $student->pendidikan_ibu == 'D2' ? 'selected' : '' }}>D2
                                                </option>
                                                <option value="D3"
                                                    {{ $student->pendidikan_ibu == 'D3' ? 'selected' : '' }}>D3
                                                </option>
                                                <option value="D4/S1"
                                                    {{ $student->pendidikan_ibu == 'D4/S1' ? 'selected' : '' }}>
                                                    D4/S1</option>
                                                <option value="S2"
                                                    {{ $student->pendidikan_ibu == 'S2' ? 'selected' : '' }}>S2
                                                </option>
                                                <option value="S3"
                                                    {{ $student->pendidikan_ibu == 'S3' ? 'selected' : '' }}>S3
                                                </option>
                                            </select>
                                            @error('pendidikan_ibu')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex justify-center bg-gray-600 text-white font-semibold">
                                            <h4>Identitas Wali</h4>
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="nama_wali"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Nama
                                                Wali</label>
                                            <input type="text" name="nama_wali"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="nama_wali" value="{{ $student->nama_wali }}" />
                                            @error('nama_wali')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="tahun_lahir_wali"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Tahun
                                                Lahir Wali</label>
                                            <input type="text" name="tahun_lahir_wali"
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="tahun_lahir_wali" value="{{ $student->tahun_lahir_wali }}" />
                                            @error('tahun_lahir_wali')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="pekerjaan_ibu"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Pekerjaan
                                                Wali</label>
                                            <select type="text" {{ $student->pekerjaan_wali }}
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="pekerjaan_wali" name="pekerjaan_wali">
                                                <option selected>-- pilih --</option>
                                                <option value="Tidak Bekerja"
                                                    {{ $student->pekerjaan_wali == 'Tidak Bekerja' ? 'selected' : '' }}>
                                                    Tidak
                                                    Bekerja</option>
                                                <option value="Petani"
                                                    {{ $student->pekerjaan_wali == 'Petani' ? 'selected' : '' }}>Petani
                                                </option>
                                                <option value="Peternak"
                                                    {{ $student->pekerjaan_wali == 'Peternak' ? 'selected' : '' }}>
                                                    Peternak
                                                </option>
                                                <option value="PNS/TNI/POLRI"
                                                    {{ $student->pekerjaan_wali == 'PNS/TNI/POLRI' ? 'selected' : '' }}>
                                                    PNS/TNI/POLRI</option>
                                                <option value="Karyawan Swasta"
                                                    {{ $student->pekerjaan_wali == 'Karyawan Swasta' ? 'selected' : '' }}>
                                                    Karyawan Swasta</option>
                                                <option value="Pedagang Kecil"
                                                    {{ $student->pekerjaan_wali == 'Pedagang Kecil' ? 'selected' : '' }}>
                                                    Pedagang Kecil</option>
                                                <option value="Pedagang Besar"
                                                    {{ $student->pekerjaan_wali == 'Pedagang Besar' ? 'selected' : '' }}>
                                                    Pedagang Besar</option>
                                                <option value="Wiraswasta"
                                                    {{ $student->pekerjaan_wali == 'Wiraswasta' ? 'selected' : '' }}>
                                                    Wiraswasta
                                                </option>
                                                <option value="Wirausaha"
                                                    {{ $student->pekerjaan_wali == 'Wirausaha' ? 'selected' : '' }}>
                                                    Wirausaha
                                                </option>
                                                <option value="Buruh"
                                                    {{ $student->pekerjaan_wali == 'Buruh' ? 'selected' : '' }}>Buruh
                                                </option>
                                                <option value="Pensiunan"
                                                    {{ $student->pekerjaan_wali == 'Pensiunan' ? 'selected' : '' }}>
                                                    Pensiunan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ $student->pekerjaan_wali == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                                </option>
                                            </select>
                                            @error('pekerjaan_wali')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row border rounded-md bg-gray-50">
                                            <label for="pendidikan_wali"
                                                class="text-gray-600 my-auto ml-5 basis-1/4 font-semibold">Pendidikan
                                                Wali</label>
                                            <select type="text" {{ $student->pendidikan_wali }}
                                                class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                                                id="pendidikan_wali" placeholder="--1, 3, atau 4--"
                                                name="pendidikan_wali">
                                                <option selected>-- pilih --</option>
                                                <option value="Tidak Sekolah"
                                                    {{ $student->pendidikan_wali == 'Tidak Sekolah' ? 'selected' : '' }}>
                                                    Tidak Sekolah</option>
                                                <option value="Putus SD"
                                                    {{ $student->pendidikan_wali == 'Putus SD' ? 'selected' : '' }}>
                                                    Putus SD</option>
                                                <option value="SD Sederajat"
                                                    {{ $student->pendidikan_wali == 'SD Sederajat' ? 'selected' : '' }}>
                                                    SD Sederajat</option>
                                                <option value="SMP"
                                                    {{ $student->pendidikan_wali == 'SMP' ? 'selected' : '' }}>SMP
                                                </option>
                                                <option value="SMA"
                                                    {{ $student->pendidikan_wali == 'SMA' ? 'selected' : '' }}>SMA
                                                </option>
                                                <option value="D1"
                                                    {{ $student->pendidikan_wali == 'D1' ? 'selected' : '' }}>D1
                                                </option>
                                                <option value="D2"
                                                    {{ $student->pendidikan_wali == 'D2' ? 'selected' : '' }}>D2
                                                </option>
                                                <option value="D3"
                                                    {{ $student->pendidikan_wali == 'D3' ? 'selected' : '' }}>D3
                                                </option>
                                                <option value="D4/S1"
                                                    {{ $student->pendidikan_wali == 'D4/S1' ? 'selected' : '' }}>
                                                    D4/S1</option>
                                                <option value="S2"
                                                    {{ $student->pendidikan_wali == 'S2' ? 'selected' : '' }}>S2
                                                </option>
                                                <option value="S3"
                                                    {{ $student->pendidikan_wali == 'S3' ? 'selected' : '' }}>S3
                                                </option>
                                            </select>
                                            @error('pendidikan_wali')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
