<div class="container lg:w-[80%] sm:w-full m-auto my-[1.2rem] gap-5 items-center mt-4 lg:p-4 sm:px-0 bg-white">
    <h2 class="text-2xl font-semibold my-4 text-center">Form Input Data Siswa</h2>
    {{-- Step Progress Bar Start --}}
    <div class="container px-3">
        <div class="mx-full px-0 md:mx-20">
            <!-- progressbar -->
            <div class="flex items-center">
                {{-- Step Bar 1 --}}
                <div class="flex items-center text-gray-500 relative">
                    <a href="#step-1" type="button">
                        <div
                            class="{{ $currentStep != 1 ? '' : 'activeBar' }} {{ $currentStep >= 1 ? 'activeBar' : '' }} rounded-full transition duration-500 ease-in-out h-10 w-10 md:h-12 md:w-12 py-3 border-2 border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-bookmark">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                        <div
                            class="hidden md:block absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase {{ $currentStep != 1 ? '' : 'activeBar' }} {{ $currentStep >= 1 ? 'activeBar' : '' }}">
                            Identitas Diri</div>
                    </a>
                </div>

                {{-- Step Bar 2 --}}
                <div
                    class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300 {{ $currentStep != 2 ? '' : 'activeBar' }} {{ $currentStep >= 2 ? 'activeBar' : '' }}">
                </div>
                <div
                    class="flex items-center text-gray-500 relative {{ $currentStep != 2 ? '' : 'activeBar' }} {{ $currentStep >= 2 ? 'activeBar' : '' }}">
                    <a href="#step-2" type="button">
                        <div
                            class="{{ $currentStep != 2 ? '' : 'activeBar' }} {{ $currentStep >= 2 ? 'activeBar' : '' }} rounded-full transition duration-500 ease-in-out h-10 w-10 md:h-12 md:w-12 py-3 border-2 border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor"
                                class="bi bi-card-heading" viewBox="0 0 16 16">
                                <path
                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path
                                    d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z" />
                            </svg>
                        </div>
                        <div
                            class="hidden md:block absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500 {{ $currentStep != 2 ? '' : 'activeBar' }} {{ $currentStep >= 2 ? 'activeBar' : '' }}">
                            Berkas Pendukung</div>
                    </a>
                </div>

                {{-- Step Bar 3 --}}
                <div
                    class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300 {{ $currentStep != 3 ? '' : 'activeBar' }} {{ $currentStep >= 3 ? 'activeBar' : '' }}">
                </div>
                <div
                    class="flex items-center text-gray-500 relative {{ $currentStep != 3 ? '' : 'activeBar' }} {{ $currentStep >= 3 ? 'activeBar' : '' }}">
                    <a href="#step-3" type="button">
                        <div
                            class="{{ $currentStep != 3 ? '' : 'activeBar' }} {{ $currentStep >= 3 ? 'activeBar' : '' }} rounded-full transition duration-500 ease-in-out h-10 w-10 md:h-12 md:w-12 py-3 border-2 border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor"
                                class="bi bi-people" viewBox="0 0 16 16">
                                <path
                                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                            </svg>
                        </div>
                        <div
                            class="hidden md:block absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500 {{ $currentStep != 3 ? '' : 'activeBar' }} {{ $currentStep >= 3 ? 'activeBar' : '' }}">
                            Data Orang Tua</div>
                    </a>
                </div>

                {{-- Step Bar 4 --}}
                <div
                    class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300 {{ $currentStep != 4 ? '' : 'activeBar' }} {{ $currentStep == 4 ? 'activeBar' : '' }}">
                </div>
                <div class="flex items-center text-gray-500 relative {{ $currentStep != 4 ? '' : 'activeBar' }}">
                    <a href="#step-4" type="button" disabled="disabled">
                        <div
                            class="{{ $currentStep != 4 ? '' : 'activeBar' }} rounded-full transition duration-500 ease-in-out h-10 w-10 md:h-12 md:w-12 py-3 border-2 border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-database">
                                <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                            </svg>
                        </div>
                        <div
                            class="hidden md:block absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500 {{ $currentStep != 4 ? '' : 'activeBar' }}">
                            Diterima</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Step Progress Bar End --}}


    {{-- Step Form --}}
    <div class="w-[95%] md:w-[60%] m-auto items-center mt-10 overflow-x-auto pb-5">
        {{-- Step 1 Wizard Form --}}
        <div class="{{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
            <div class="container">
                <h3 class="text-2xl md:text-3xl font-semibold mb-5">Step 1 - Data Siswa</h3>
                <div class="grid gap-2">
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="nama_siswa"
                            class="text-xs md:text-base font-light md:font-semibold text-gray-600 my-auto ml-5 basis-1/4 ">Nama
                            Siswa</label>
                        <input type="text" wire:model="nama_siswa"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="nama_siswa" placeholder="--nama siswa--">
                        @error('nama_siswa')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="jenis_kelamin"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Jenis
                            Kelamin</label>
                        <select type="text" wire:model="jenis_kelamin"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="jenis_kelamin">
                            <option>-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="nisn"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">NISN</label>
                        <input type="text" wire:model="nisn"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="nisn" maxlength="10" placeholder="--999xxxxxxx--" />
                        @error('nisn')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="nik"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">NIK</label>
                        <input type="text" wire:model="nik"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="nik" maxlength="16" placeholder="--320xxxxxxxxxxxxx--" />
                        @error('nik')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="tempat_lahir"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Tempat
                            Lahir</label>
                        <input type="text" wire:model="tempat_lahir"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="tempat_lahir" placeholder="--tempat--" />
                        @error('tempat_lahir')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="tanggal_lahir"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Tanggal
                            Lahir</label>
                        <input type="date" wire:model="tanggal_lahir"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="tanggal_lahir" />
                        @error('tanggal_lahir')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="agama"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Agama</label>
                        <select type="text" wire:model="agama"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="agama" name="agama">
                            <option selected>-- Pilih --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('agama')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="alamat"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Alamat</label>
                        <input type="text" wire:model="alamat"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="alamat" placeholder="--alamat--" />
                        @error('alamat')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="rt"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">RT</label>
                        <input type="text" wire:model="rt"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="rt" placeholder="--rt--" />
                        @error('rt')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="rw"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">RW</label>
                        <input type="text" wire:model="rw"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="rw" placeholder="--rw--" />
                        @error('rw')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="desa"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Desa</label>
                        <input type="text" wire:model="desa"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="desa" placeholder="--desa--" />
                        @error('desa')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="kecamatan"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Kecamatan</label>
                        <input type="text" wire:model="kecamatan"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="kecamatan" placeholder="--kecamatan--" />
                        @error('kecamatan')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="container">
                        <div class="flex flex-wrap mt-4">
                            <button class="bg-blue-500 rounded-[10px] hover:bg-blue-400 py-2 px-5 text-white"
                                wire:click="firstStepSubmit" type="button">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Step 2 Wizard Form --}}
        <div class="{{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
            <div class="container">
                <h3 class="text-2xl md:text-3xl font-semibold mb-5">Step 2 - berkas dan lain-lain</h3>
                <div class="grid gap-2">
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="no_telp"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">No
                            HP</label>
                        <input type="text" wire:model="no_telp"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="no_telp" placeholder="--08xxxxxxxxx--" />
                        @error('no_telp')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="asal_sekolah"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Asal
                            Sekolah</label>
                        <input type="text" wire:model="asal_sekolah"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="asal_sekolah" placeholder="--asal sekolah--" />
                        @error('asal_sekolah')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="pkh"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">PKH</label>
                        <input type="text" wire:model="pkh"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="pkh" placeholder="--pkh--" />
                        @error('pkh')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="kks"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">KKS</label>
                        <input type="text" wire:model="kks"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="kks" placeholder="--kks--" />
                        @error('kks')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="pip"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">PIP</label>
                        <input type="text" wire:model="pip"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="pip" placeholder="--pip--" />
                        @error('pip')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="tinggi_badan"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Tinggi
                            Badan</label>
                        <input type="text" wire:model="tinggi_badan"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="tinggi_badan" placeholder="--140 cm--" />
                        @error('tinggi_badan')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="berat_badan"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Berat
                            Badan</label>
                        <input type="text" wire:model="berat_badan"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="berat_badan" placeholder="--40 kg--" />
                        @error('berat_badan')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="anak_ke"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Anak
                            Ke</label>
                        <input type="text" wire:model="anak_ke"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="anak_ke" placeholder="--1, 3, atau 4--" />
                        @error('anak_ke')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="ukuran_baju"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Ukuran
                            Baju</label>
                        <select type="text" wire:model="ukuran_baju"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="ukuran_baju" name="ukuran_baju">
                            <option selected>--pilih--</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                        @error('ukuran_baju')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="container">
                        <div class="flex flex-wrap mt-4 gap-2">
                            <button class="bg-blue-500 rounded-[10px] hover:bg-blue-400 py-2 px-5 text-white"
                                type="button" wire:click="secondStepSubmit">Next</button>
                            <button class="bg-red-500 rounded-[10px] hover:bg-red-400 py-2 px-5 text-white"
                                type="button" wire:click="back(1)">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Step 3 Wizard Form --}}
        <div class="{{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            <div class="container">
                <h3 class="text-2xl md:text-3xl font-semibold mb-5">Step 3 - Data orang tua/wali</h3>
                <div class="grid gap-2">
                    <div class="flex justify-center bg-gray-600 text-white font-semibold">
                        <h4>Identitas Orang Tua</h4>
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="nama_ayah"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Nama
                            Ayah</label>
                        <input type="text" wire:model="nama_ayah"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="nama_ayah" placeholder="--nama ayah--" />
                        @error('nama_ayah')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="tahun_lahir_ayah"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Tahun
                            Lahir Ayah</label>
                        <input type="text" wire:model="tahun_lahir_ayah"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="tahun_lahir_ayah" placeholder="1988--" />
                        @error('tahun_lahir_ayah')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="pekerjaan_ayah"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Pekerjaan
                            Ayah</label>
                        <select type="text" wire:model="pekerjaan_ayah"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="pekerjaan_ayah" placeholder="--1, 3, atau 4--" name="pekerjaan_ayah">
                            <option selected>-- pilih --</option>
                            <option value="Tidak Bekerja">Tidak Bekerja</option>
                            <option value="Petani">Petani</option>
                            <option value="Peternak">Peternak</option>
                            <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Pedagang Kecil">Pedagang Kecil</option>
                            <option value="Pedagang Besar">Pedagang Besar</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Wirausaha">Wirausaha</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Pensiunan">Pensiunan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('pekerjaan_ayah')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="pendidikan_ayah"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Pendidikan
                            Ayah</label>
                        <select type="text" wire:model="pendidikan_ayah"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="pendidikan_ayah" placeholder="--1, 3, atau 4--" name="pendidikan_ayah">
                            <option selected>-- pilih --</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="Putus SD">Putus SD</option>
                            <option value="SD Sederajat">SD Sederajat</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4/S1">D4/S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        @error('pendidikan_ayah')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="nama_ibu"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Nama
                            Ibu</label>
                        <input type="text" wire:model="nama_ibu"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="nama_ibu" placeholder="--nama ibu--" />
                        @error('nama_ibu')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="tahun_lahir_ibu"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Tahun
                            Lahir Ibu</label>
                        <input type="text" wire:model="tahun_lahir_ibu"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="tahun_lahir_ibu" placeholder="--1982--" />
                        @error('tahun_lahir_ibu')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="pekerjaan_ibu"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Pekerjaan
                            Ibu</label>
                        <select type="text" wire:model="pekerjaan_ibu"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="pekerjaan_ibu" name="pekerjaan_ibu">
                            <option selected>-- pilih --</option>
                            <option value="Tidak Bekerja">Tidak Bekerja</option>
                            <option value="Petani">Petani</option>
                            <option value="Peternak">Peternak</option>
                            <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Pedagang Kecil">Pedagang Kecil</option>
                            <option value="Pedagang Besar">Pedagang Besar</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Wirausaha">Wirausaha</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Pensiunan">Pensiunan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('pekerjaan_ibu')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="pendidikan_ibu"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Pendidikan
                            Ibu</label>
                        <select type="text" wire:model="pendidikan_ibu"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="pendidikan_ibu" name="pendidikan_ibu">
                            <option selected>-- pilih --</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="Putus SD">Putus SD</option>
                            <option value="SD Sederajat">SD Sederajat</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4/S1">D4/S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
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
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Nama
                            Wali</label>
                        <input type="text" wire:model="nama_wali"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="nama_wali" placeholder="--nama wali--" />
                        @error('nama_wali')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="tahun_lahir_wali"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Tahun
                            Lahir Wali</label>
                        <input type="text" wire:model="tahun_lahir_wali"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="tahun_lahir_wali" placeholder="--1982--" />
                        @error('tahun_lahir_wali')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="pekerjaan_ibu"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Pekerjaan
                            Wali</label>
                        <select type="text" wire:model="pekerjaan_wali"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="pekerjaan_wali" name="pekerjaan_wali">
                            <option selected>-- pilih --</option>
                            <option value="Tidak Bekerja">Tidak Bekerja</option>
                            <option value="Petani">Petani</option>
                            <option value="Peternak">Peternak</option>
                            <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Pedagang Kecil">Pedagang Kecil</option>
                            <option value="Pedagang Besar">Pedagang Besar</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Wirausaha">Wirausaha</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Pensiunan">Pensiunan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('pekerjaan_wali')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row border rounded-md bg-gray-50">
                        <label for="pendidikan_wali"
                            class="text-gray-600 my-auto ml-5 basis-1/4 text-xs md:text-base font-light md:font-semibold">Pendidikan
                            Wali</label>
                        <select type="text" wire:model="pendidikan_wali"
                            class="border-l grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm rounded-r-md focus:outline-none focus:border-sky-500"
                            id="pendidikan_wali" name="pendidikan_wali">
                            <option selected>-- pilih --</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="Putus SD">Putus SD</option>
                            <option value="SD Sederajat">SD Sederajat</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4/S1">D4/S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        @error('pendidikan_wali')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="container">
                        <div class="flex flex-wrap mt-4 gap-2">
                            <button class="bg-blue-500 rounded-[10px] hover:bg-blue-400 py-2 px-5 text-white"
                                type="button" wire:click="thridStepSubmit">Next</button>
                            <button class="bg-red-500 rounded-[10px] hover:bg-red-400 py-2 px-5 text-white"
                                type="button" wire:click="back(2)">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Step 4 Wizard Form --}}
        <div class="{{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
            <div>
                <div>
                    <h3 class="text-2xl md:text-3xl font-semibold mb-5">Step 4 - Result</h3>
                    <section>
                        <div class="container border border-1 p-3 rounded-[10px]">
                            <div class="flex items-center text-center bg-gray-200 p-3">
                                <h3 class="text-xl font-semibold">FORMULIR PESERTA DIDIK BARU SMP KP 2
                                    MAJALAYA TAHUN
                                    PELAJARAN
                                    2024-2025
                                </h3>
                            </div>
                            <div class="flex justify-center bg-gray-600 text-white font-semibold">
                                <h4>Identitas Peserta Didik</h4>
                            </div>
                            <div class="container p-4">
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Nama Peserta Didik</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $nama_siswa }}</strong></div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Jenis Kelamin</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $jenis_kelamin }}</strong></div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">NISN</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $nisn }}</strong></div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">NIK</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $nik }}</strong></div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Tempat, Tanggal Lahir</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $tempat_lahir }},
                                            {{ $tanggal_lahir }}</strong>
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Agama</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $agama }}</strong>
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Alamat</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $alamat }}
                                            rt{{ $rt }}/rw{{ $rw }}, Des.{{ $desa }},
                                            Kec.{{ $kecamatan }}</strong>
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Asal Sekolah</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $asal_sekolah }}</strong>
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Nomor Telepon</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $no_telp }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="container p-4">
                                <div class="flex justify-center bg-gray-600 text-white font-semibold">
                                    <h4>Berkas Pendukung</h4>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Sebagai Penerima Bantuan ?</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2">
                                        <strong>{{ ($pkh != null) | ($kks != null) | ($pip != null) ? 'YA' : 'TIDAK' }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="container p-4">
                                <div class="flex justify-center bg-gray-600 text-white font-semibold">
                                    <h4>Data Orang Tua / Wali</h4>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Nama Ayah</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $nama_ayah }}</strong>
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Tahun Lahir Ayah</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $tahun_lahir_ayah }}</strong>
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Pekerjaan Ayah</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $pekerjaan_ayah }}</strong>
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Pendidikan Ayah</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $pendidikan_ayah }}</strong>
                                    </div>
                                </div>
                                <div class="border m-4 border-dashed border-gray-600"></div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Nama Ibu</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $nama_ibu }}</strong>
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Tahun Lahir Ibu</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $tahun_lahir_ibu }}</strong>
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Pekerjaan Ibu</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $pekerjaan_ibu }}</strong>
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/2">Pendidikan Ibu</div>
                                    <div class="basis-1/12">:</div>
                                    <div class="basis-1/2"><strong>{{ $pendidikan_ibu }}</strong>
                                    </div>
                                </div>
                                @if ($nama_wali != null)
                                    <div class="border m-4 border-dashed border-gray-600"></div>
                                    <div class="flex flex-row mt-2">
                                        <div class="basis-1/2">Nama Wali</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $nama_wali }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/2">Tahun Lahir Wali</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $tahun_lahir_wali }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/2">Pekerjaan Wali</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $pekerjaan_wali }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/2">Pendidikan Wali</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $pendidikan_wali }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </section>
                    <div class="container">
                        <div class="flex flex-wrap mt-4 gap-2">
                            <button class="bg-green-500 rounded-[10px] hover:bg-green-400 py-2 px-5 text-white"
                                type="button" wire:click="submitForm">Simpan</button>
                            <button class="bg-red-500 rounded-[10px] hover:bg-red-400 py-2 px-5 text-white"
                                type="button" wire:click="back(3)">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Step Form --}}
</div>
