@extends('ppdbPages.layouts.index')
@section('content')
    <section>
        <div
            class="transition-all duration-500 ease-in-out container w-[90%] sm:w-[95%] my-3 m-auto bg-greyIsh p-[1rem] rounded-[10px]">
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col gap-2 md:flex-row justify-around transition-all duration-300 ease-in-out">
                @csrf
                {{-- <div class="flex flex-row md:flex-row justify-around transition-all duration-300 ease-in-out"> --}}
                <label for="image-input"
                    class="bg-green-300 hover:bg-green-500 cursor-pointer rounded-lg p-3 justify-center text-center">
                    Pilih
                    formulir
                    <input type="file" id="image-input" name="image" accept="image/*" style="display: none">
                </label>
                <button type="submit" id="process-input"
                    class=" flex justify-center items-center gap-2 bg-blue-300 hover:bg-blue-500 cursor-pointer rounded-lg p-3 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-gear" viewBox="0 0 16 16">
                        <path
                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                        <path
                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                    </svg>
                    Pindai Gambar
                    <div id="loading"
                        class="loading absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
                </button>
                {{-- </div> --}}
            </form>
            <div class="flex flex-col sm:flex-row justify-center">
                <div id="preview-container"
                    class="w-full max-h-max md:w-[50%] rounded-t-lg sm:rounded-t-none sm:rounded-l-[10px] p-3 border-blue-300 border-b-2 sm:border-b-0 sm:border-r-2">
                    <img id="preview-image" src="{{ asset('storage/images/' . basename($imagePath)) }}" alt="Preview">
                </div>
                <div id="resultContainer"
                    class="w-full md:w-[50%] rounded-b-lg sm:rounded-b-none sm:rounded-r-[10px] p-3 overflow-y-auto">
                    @if (isset($error))
                        <div>
                            <h2>Error:</h2>
                            <p>{{ $error }}</p>
                        </div>
                    @else
                        @isset($text)
                            @php
                                $responseData = json_decode($text->getContent(), true);
                            @endphp
                            <div
                                class="flex bg-green-200 text-green-700 p-3 rounded-t-lg text-center text-lg items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                                </svg>
                                <h2>Hasil setelah dipindai</h2>
                            </div>
                            <form action="{{ route('store') }}" method="POST">
                                @csrf
                                <div class="px-1 bg-slate-500">
                                    @foreach ($responseData as $key => $value)
                                        <div class="flex flex-row bg-gray-50 h-7">
                                            <label for="{{ $key }}"
                                                class="text-xs md:text-base font-light text-gray-600 my-auto ml-2 basis-1/4 ">{{ $key }}</label>
                                            <input type="text"
                                                class="grow p-1 text-gray-600 placeholder:italic placeholder-slate-300 placeholder:text-sm focus:outline-none focus:border-sky-500"
                                                id="{{ $key }}" placeholder="-- {{ $key }} --"
                                                value="{{ is_array($value) ? json_encode($value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8') }}"
                                                name="{{ $key }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div
                                    class="flex bg-green-200 text-green-700 p-3 rounded-b-lg text-center text-lg items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-lightbulb" viewBox="0 0 16 16">
                                        <path
                                            d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6m6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1" />
                                    </svg>
                                    <h2>apakah data sudah sesuai?</h2>
                                </div>
                                <div class="bg-white rounded-lg mt-4 p-4">
                                    <h2 class="mb-3 text-orange-500">jika didapati data belum sesuai! silahkan edit secara
                                        manual pada
                                        kolom
                                        sebelah
                                        kanan,
                                        lalu
                                        silahkan
                                        tekan submit dibawah untuk menyimpan data</h2>
                                    <button type="submit"
                                        class="bg-green-200 text-green-800 hover:bg-green-300 p-3 rounded-lg w-full">Submit</button>
                                </div>
                            </form>
                        @endisset
                    @endif
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            var zoomLevel = 1;
            var dragStart, dragEnd, dragDelta, initialOffset;

            $("#preview-image").on("wheel", function(event) {
                event.preventDefault();
                zoomLevel += event.originalEvent.deltaY * -0.01;
                zoomLevel = Math.min(Math.max(0.5, zoomLevel), 3); // Adjust min/max zoom levels
                $("#preview-image").css({
                    transform: "scale(" + zoomLevel + ")",
                });
            });

            $("#preview-image").on("mousedown", function(event) {
                dragStart = {
                    x: event.clientX,
                    y: event.clientY
                };
                initialOffset = $("#preview-image").offset();
                $(document).on("mousemove", handleDrag);
                $(document).on("mouseup", function() {
                    $(document).off("mousemove", handleDrag);
                });
            });

            function handleDrag(event) {
                dragEnd = {
                    x: event.clientX,
                    y: event.clientY
                };
                dragDelta = {
                    x: dragEnd.x - dragStart.x,
                    y: dragEnd.y - dragStart.y,
                };
                $("#preview-image").offset({
                    left: initialOffset.left + dragDelta.x,
                    top: initialOffset.top + dragDelta.y,
                });
            }
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function processData() {
            var loading = document.getElementById("loading");
            var button = document.getElementById("process-input");

            // Tampilkan elemen loading
            loading.style.display = "block";

            // Matikan tombol selama proses
            button.disabled = true;

            // Simulasikan proses yang membutuhkan waktu
            setTimeout(function() {
                // Sembunyikan elemen loading setelah proses selesai
                loading.style.display = "none";

                // Aktifkan kembali tombol
                button.disabled = false;
            }, 3000); // Ganti dengan waktu proses sesuai kebutuhan
        }

        function handleImageSelection(input) {
            const file = input.files[0];
            if (file) {
                // Lakukan pengolahan atau kirim ke server menggunakan AJAX
                const formData = new FormData();
                formData.append('image', file);

                // Contoh penggunaan AJAX dengan fetch
                fetch('{{ route('upload') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Lakukan sesuatu dengan data hasil pemrosesan
                        console.log(data);
                    })
                    .catch(error => {
                        // Tangani kesalahan jika ada
                        console.error(error);
                    });
            }
        }

        function processImage() {
            var loadingElement = document.getElementById('loading');
            var buttonDisabled = document.getElementById('process-input');
            if (loadingElement) {
                loadingElement.style.display = 'block'; // Tampilkan elemen loading
                buttonDisabled.style.disabled = true;
            }

            // Contoh penggunaan AJAX dengan fetch
            fetch('{{ route('upload') }}', {
                    method: 'POST',
                    body: new FormData(),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Lakukan sesuatu dengan data hasil pemrosesan (jika diperlukan)
                    console.log(data);
                    document.getElementById('loading').style.display = 'none';
                    for (const [key, value] of Object.entries(data)) {
                        const inputElement = document.getElementById(key);
                        if (inputElement) {
                            // Jika elemen input dengan id yang sesuai ditemukan
                            inputElement.value = value;
                        }
                    }
                })
                .catch(error => {
                    // Tangani kesalahan jika ada
                    console.error(error);
                    document.getElementById('loading').style.display = 'none';
                });

        }

        function processForm() {
            // Ambil elemen input file
            var inputFile = document.getElementById('image-input');

            // Periksa apakah ada file yang dipilih
            if (inputFile.files.length > 0) {
                // Formulir akan dikirim, gambar yang dipilih tetap ditampilkan
                return true;
            } else {
                // Tidak ada file yang dipilih, form tidak dikirim
                alert('Pilih gambar terlebih dahulu!');
                return false;
            }
        }
    </script>
    <script>
        const imageInput = document.getElementById('image-input');
        const previewImage = document.getElementById('preview-image');
        const previewContainer = document.getElementById('preview-container');

        let isDragging = false;
        let startX, startY, offsetX = 0,
            offsetY = 0;

        imageInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });

        // Tambahkan event listener untuk zoom in dan zoom out
        let scale = 1;

        previewContainer.addEventListener('wheel', function(e) {
            e.preventDefault();

            if (e.deltaY < 0 && scale < 3) {
                scale += 0.1;
            } else if (e.deltaY > 0 && scale > 0.2) {
                scale -= 0.1;
            }

            previewImage.style.transform = `scale(${scale}) translate(${offsetX}px, ${offsetY}px)`;
        });

        // Tambahkan event listener untuk menggeser gambar
        previewImage.addEventListener('mousedown', function(e) {
            isDragging = true;
            startX = e.clientX - offsetX;
            startY = e.clientY - offsetY;
        });

        document.addEventListener('mousemove', function(e) {
            if (isDragging) {
                offsetX = e.clientX - startX;
                offsetY = e.clientY - startY;

                previewImage.style.transform = `scale(${scale}) translate(${offsetX}px, ${offsetY}px)`;
            }
        });

        document.addEventListener('mouseup', function() {
            isDragging = false;
        });

        // Mengatasi masalah ketika mouse keluar dari area gambar saat masih di-klik
        document.addEventListener('mouseleave', function() {
            isDragging = false;
        });

        document.getElementById('image-input').addEventListener('change', function(event) {
            var previewContainer = document.getElementById('preview-container');
            var previewImage = document.getElementById('preview-image');

            // Hanya melanjutkan jika ada berkas yang dipilih
            if (event.target.files.length > 0) {
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Menampilkan pratinjau gambar
                    previewImage.src = e.target.result;
                };

                // Membaca berkas sebagai URL data
                reader.readAsDataURL(file);

                // Menampilkan elemen pratinjau
                previewContainer.style.display = 'block';
            } else {
                // Menyembunyikan elemen pratinjau jika tidak ada berkas yang dipilih
                previewContainer.style.display = 'none';
            }
        });

        var reader; // Deklarasikan variabel di sini

        document.getElementById('image-input').addEventListener('change', function(event) {
            var previewContainer = document.getElementById('preview-container');
            var previewImage = document.getElementById('preview-image');

            // Hanya melanjutkan jika ada berkas yang dipilih
            if (event.target.files.length > 0) {
                var file = event.target.files[0];
                reader = new FileReader(); // Inisialisasi variabel di sini

                reader.onload = function(e) {
                    // Menampilkan pratinjau gambar
                    previewImage.src = e.target.result;
                    // Menyimpan URL gambar pratinjau dalam sesi
                    sessionStorage.setItem('previewImageUrl', e.target.result);
                };

                // Membaca berkas sebagai URL data
                reader.readAsDataURL(file);

                // Menampilkan elemen pratinjau
                previewContainer.style.display = 'block';
            } else {
                // Menyembunyikan elemen pratinjau jika tidak ada berkas yang dipilih
                previewContainer.style.display = 'none';
                // Menghapus URL gambar pratinjau dari sesi jika tidak ada berkas yang dipilih
                sessionStorage.removeItem('previewImageUrl');
            }
        });

        // Setelah form berhasil dikirim, perbarui pratinjau jika ada URL gambar dalam sesi
        document.getElementById('process-input').addEventListener('click', function() {
            var previewImageUrl = sessionStorage.getItem('previewImageUrl');
            if (previewImageUrl) {
                // Mengatur URL gambar pratinjau setelah formulir dikirim
                document.getElementById('preview-image').src = previewImageUrl;
            }
        });
    </script>
@endsection
