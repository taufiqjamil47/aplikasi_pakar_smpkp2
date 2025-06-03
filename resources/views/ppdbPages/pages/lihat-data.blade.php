@extends('ppdbPages.layouts.index')
@section('content')
    <section>
        <div class="container w-[95%] m-auto my-[1.2rem] flex gap-5 flex-wrap items-center mt-4 p-4 bg-white ">
            <div class="py-8 m-auto w-full">
                <div>
                    <div>
                        <div class="container mb-4 non-printable">
                            <div class="container">
                                <div class="flex flex-wrap justify-between">
                                    <div class="flex gap-4 justify-end">
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
                                    <div class="flex gap-4 justify-end">
                                        <a href="#" onclick="window.print()"
                                            class="flex flex-wrap gap-3 py-2 px-4 bg-slate-300 rounded-md hover:bg-slate-200"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                <path
                                                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                            </svg>
                                            Cetak
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="printable">
                            <div class="container">
                                <div class="flex items-center text-center bg-gray-200 p-3">
                                    <h3 class="text-xl font-semibold w-full">FORMULIR PESERTA DIDIK BARU SMP KP 2
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
                                        <div class="basis-1/4">Nama Peserta Didik</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2">
                                            <strong>{{ $student->nama_siswa }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Jenis Kelamin</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->jenis_kelamin }}</strong></div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">NISN</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->nisn }}</strong></div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">NIK</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->nik }}</strong></div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Tempat, Tanggal Lahir</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->tempat_lahir }},
                                                {{ $student->tanggal_lahir }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Agama</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->agama }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Alamat</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->alamat }}
                                                rt{{ $student->rt }}/rw{{ $student->rw }}, Des.{{ $student->desa }},
                                                Kec.{{ $student->kecamatan }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Asal Sekolah</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->asal_sekolah }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Nomor Telepon</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->no_telp }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="container p-4">
                                    <div class="flex justify-center bg-gray-600 text-white font-semibold">
                                        <h4>Berkas Pendukung</h4>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Sebagai Penerima Bantuan ?</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2">
                                            <strong>{{ ($student->pkh != null) | ($student->kks != null) | ($student->pip != null) ? 'YA' : 'TIDAK' }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="container p-4">
                                    <div class="flex justify-center bg-gray-600 text-white font-semibold">
                                        <h4>Data Orang Tua / Wali</h4>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Nama Ayah</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->nama_ayah }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Tahun Lahir Ayah</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->tahun_lahir_ayah }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Pekerjaan Ayah</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->pekerjaan_ayah }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Pendidikan Ayah</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->pendidikan_ayah }}</strong>
                                        </div>
                                    </div>
                                    <div class="border m-4 border-dashed border-gray-600"></div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Nama Ibu</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->nama_ibu }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Tahun Lahir Ibu</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->tahun_lahir_ibu }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Pekerjaan Ibu</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->pekerjaan_ibu }}</strong>
                                        </div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="basis-1/4">Pendidikan Ibu</div>
                                        <div class="basis-1/12">:</div>
                                        <div class="basis-1/2"><strong>{{ $student->pendidikan_ibu }}</strong>
                                        </div>
                                    </div>
                                    @if ($student->nama_wali != null)
                                        <div class="border m-4 border-dashed border-gray-600"></div>
                                        <div class="flex flex-row mt-2">
                                            <div class="basis-1/4">Nama Wali</div>
                                            <div class="basis-1/12">:</div>
                                            <div class="basis-1/2"><strong>{{ $student->nama_wali }}</strong>
                                            </div>
                                        </div>
                                        <div class="flex flex-row">
                                            <div class="basis-1/4">Tahun Lahir Wali</div>
                                            <div class="basis-1/12">:</div>
                                            <div class="basis-1/2"><strong>{{ $student->tahun_lahir_wali }}</strong>
                                            </div>
                                        </div>
                                        <div class="flex flex-row">
                                            <div class="basis-1/4">Pekerjaan Wali</div>
                                            <div class="basis-1/12">:</div>
                                            <div class="basis-1/2"><strong>{{ $student->pekerjaan_wali }}</strong>
                                            </div>
                                        </div>
                                        <div class="flex flex-row">
                                            <div class="basis-1/4">Pendidikan Wali</div>
                                            <div class="basis-1/12">:</div>
                                            <div class="basis-1/2"><strong>{{ $student->pendidikan_wali }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </section>
                        {{-- <div class="container">
                            <div class="flex flex-wrap mt-4 gap-2">
                                <button class="bg-green-500 rounded-[10px] hover:bg-green-400 py-2 px-5 text-white"
                                    type="button" wire:click="submitForm">Simpan</button>
                                <button class="bg-red-500 rounded-[10px] hover:bg-red-400 py-2 px-5 text-white"
                                    type="button" wire:click="back(3)">Back</button>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
