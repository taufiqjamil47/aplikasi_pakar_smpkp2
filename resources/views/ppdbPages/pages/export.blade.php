@extends('ppdbPages.layouts.index')
@section('content')
    <section>
        <div class="container lg:w-[65%] sm:w-[70%] m-auto my-[1.2rem] flex gap-3 flex-wrap items-center mt-4 p-4 bg-white">
            <div class="py-3 m-auto w-full">
                <div class="my-2 flex sm:flex-row flex-col gap-2">
                    <div class="basis-1/4 text-center m-auto">
                        <label for="periode">Pilih Periode:</label>
                    </div>
                    <div class="basis-1/2 m-auto">
                        <select name="periode" id="periode"
                            class="border w-full p-1 grow text-gray-600 rounded-md focus:outline-none focus:border-sky-500">
                            <option selected>-- pilih periode --</option>
                            @foreach ($periods as $period)
                                <option value="{{ $period }}">{{ $period }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-row basis-9 text-center m-auto gap-2">
                        <button id="exportPerPeriode"
                            class="bg-green-300 hover:bg-green-400 px-4 py-2 rounded-[10px]">Export</button>
                        <button id="tampilkanData"
                            class="bg-blue-300 hover:bg-blueColor px-4 py-2 rounded-[10px]">Lihat</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container lg:w-[60%] sm:w-[90%] m-auto my-[1.2rem] flex gap-3 flex-wrap items-center mt-4 p-4 bg-white">
            <div class="py-3 m-auto w-full">
                <div id="studentData">
                </div>
            </div>
        </div>

        {{-- Script --}}
        <script>
            // AJAX request untuk mengambil data siswa berdasarkan periode yang dipilih
            document.getElementById("tampilkanData").addEventListener("click", function() {
                var selectedPeriode = document.getElementById("periode").value;
                $.ajax({
                    url: "{{ route('students.show') }}",
                    type: "get",
                    data: {
                        periode: selectedPeriode
                    },
                    success: function(data) {
                        $("#studentData").html(data);
                    }
                });
            });

            document.getElementById("exportPerPeriode").addEventListener("click", function() {
                var selectedPeriodeExport = document.getElementById("periode").value;
                var token = "{{ csrf_token() }}";
                console.log("Tombol Export diklik");
                $.ajax({
                    url: "{{ route('export-data') }}",
                    type: "get",
                    data: {
                        _token: token,
                        periode: selectedPeriodeExport // Mengirim nilai periode yang dipilih
                    },
                    xhrFields: {
                        responseType: 'blob' // Mengharapkan respons berupa blob (file)
                    },
                    success: function(data) {
                        // Mengecek tipe data respons
                        if (data.type ===
                            // "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                            const blob = data;

                            // Mengatur nama file sesuai dengan periode
                            const filename = `daftar_pd_ppdb_${selectedPeriodeExport}.xlsx`;

                            const url = window.URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.href = url;
                            a.download = filename;
                            document.body.appendChild(a);
                            a.click();
                            window.URL.revokeObjectURL(url);
                        } else {
                            // Respons tidak sesuai dengan yang diharapkan
                            console.log('Respons tidak sesuai');
                        }
                    },
                    error: function(error) {
                        console.log('data tidak bisa di export ', error);
                    }
                });
            });
        </script>
    </section>
@endsection
