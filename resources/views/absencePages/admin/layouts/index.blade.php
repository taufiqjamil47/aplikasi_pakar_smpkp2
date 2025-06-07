<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presece Admin Panel</title>

    <!-- Performance Optimizations -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Modern Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Simplified Asset Loading -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    @vite(['resources/css/ppdb/app.css', 'resources/css/cdn/toastr.min.css', 'resources/js/ppdb/app.js', 'resources/js/cdn/toastr.min.js'])

    <!-- Tailwind via CDN (for production, consider self-hosting) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        dark: {
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    animation: {
                        'gradient-x': 'gradient-x 8s ease infinite',
                        'fade-in': 'fadeIn 0.3s ease-in',
                    },
                    keyframes: {
                        'gradient-x': {
                            '0%, 100%': {
                                'background-size': '200% 200%',
                                'background-position': 'left center'
                            },
                            '50%': {
                                'background-size': '200% 200%',
                                'background-position': 'right center'
                            }
                        },
                        'fadeIn': {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(10px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom CSS for animations and transitions */
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .nav-item {
            position: relative;
        }

        .nav-item::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #0ea5e9;
            transition: width 0.3s ease;
        }

        .nav-item:hover::after {
            width: 100%;
        }

        .avatar-ring:hover {
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.5);
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }
    </style>

    <style>
        .student-item.disabled {
            opacity: 0.5;
            pointer-events: none;
            display: none !important;
        }

        .draggable {
            cursor: grab;
            user-select: none;
            transition: all 0.2s ease;
        }

        .draggable:active {
            cursor: grabbing;
        }

        .drop-zone {
            min-height: 120px;
            transition: all 0.3s ease;
        }

        .drop-zone.highlight {
            background-color: rgba(99, 102, 241, 0.1);
            border: 2px dashed #6366f1;
        }

        /* Pastikan elemen yang di-drag terlihat */
        .draggable.dragging {
            opacity: 0.5;
            transform: scale(0.98);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Style untuk elemen yang sudah di-drop */
        .dropped-student {
            background-color: white;
            border-left: 4px solid #6366f1;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-gray-800 flex flex-col min-h-screen">
    <!-- Header/Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        @include('absencePages.admin.layouts.navbar')
    </header>

    <div class="flex flex-1">
        @include('absencePages.admin.layouts.sidebar')

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            {{-- content section --}}
            @yield('content')
        </main>
    </div>

    {{-- floating section --}}
    @include('absencePages.admin.layouts.floating')

    {{-- footer section --}}
    @include('absencePages.admin.layouts.footer')
</body>
<!-- Script: Toggle User Menu -->
<script>
    document.getElementById('user-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('user-menu');
        menu.classList.toggle('hidden');
    });
</script>

<!-- Script: Toggle Sidebar -->
<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    });
</script>

<!-- Script: Draggble -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const studentList = document.getElementById('student-list');
        const dropZone = document.getElementById('class-drop-zone');
        let draggedItem = null;
        const selectedStudents = new Set(); // Untuk menyimpan ID siswa yang dipilih

        // Event untuk item yang bisa di-drag
        studentList.querySelectorAll('.student-item').forEach(item => {
            item.addEventListener('dragstart', function(e) {
                draggedItem = this;
                setTimeout(() => {
                    this.classList.add('opacity-50', 'bg-gray-100');
                }, 0);
                e.dataTransfer.setData('text/plain', this.dataset.id);
            });

            item.addEventListener('dragend', function() {
                this.classList.remove('opacity-50', 'bg-gray-100');
                draggedItem = null;
            });
        });

        // Event untuk drop zone
        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('bg-indigo-50', 'border-indigo-300');
        });

        dropZone.addEventListener('dragleave', function() {
            this.classList.remove('bg-indigo-50', 'border-indigo-300');
        });

        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('bg-indigo-50', 'border-indigo-300');

            if (draggedItem) {
                const studentId = draggedItem.dataset.id;
                const studentName = draggedItem.dataset.name;

                // Cek apakah siswa sudah ada di drop zone
                if (selectedStudents.has(studentId)) {
                    return; // Sudah ada, tidak perlu tambahkan lagi
                }

                selectedStudents.add(studentId);

                // Hapus teks default jika ada
                const defaultText = this.querySelector('p.text-gray-400');
                if (defaultText) defaultText.remove();

                // Buat elemen baru untuk siswa yang di-drop
                const studentElement = document.createElement('div');
                studentElement.className =
                    'flex justify-between items-center bg-white p-3 rounded-lg shadow-sm mb-2 border-l-4 border-indigo-500';
                studentElement.dataset.id = studentId;
                studentElement.innerHTML = `
                <div class="flex items-center gap-3">
                    <div class="bg-indigo-100 text-indigo-700 h-10 w-10 rounded-full flex items-center justify-center font-medium">
                        ${studentName.charAt(0)}
                    </div>
                    <div>
                        <p class="font-medium">${studentName}</p>
                        <p class="text-xs text-gray-500">ID: ${studentId}</p>
                    </div>
                </div>
                <button class="remove-student text-red-500 hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

                // Tambahkan ke drop zone
                this.appendChild(studentElement);
                draggedItem.remove();

                // Tambahkan event listener untuk tombol hapus
                studentElement.querySelector('.remove-student').addEventListener('click', function() {
                    studentElement.remove();
                    selectedStudents.delete(studentId);

                    // Tambahkan kembali ke daftar kiri
                    const studentList = document.getElementById('student-list');
                    const newStudentItem = document.createElement('div');
                    newStudentItem.className =
                        'student-item draggable bg-white p-3 rounded-lg shadow-sm flex justify-between items-center';
                    newStudentItem.setAttribute('draggable', 'true');
                    newStudentItem.dataset.id = studentId;
                    newStudentItem.dataset.name = studentName;
                    newStudentItem.innerHTML = `
        <div class="flex items-center gap-3">
            <div class="bg-indigo-100 text-indigo-700 h-10 w-10 rounded-full flex items-center justify-center font-medium">
                ${studentName.charAt(0)}
            </div>
            <div>
                <p class="font-medium">${studentName}</p>
                <p class="text-xs text-gray-500">ID: ${studentId}</p>
            </div>
        </div>
        <div class="text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
            </svg>
        </div>
    `;

                    // Tambahkan event drag lagi
                    newStudentItem.addEventListener('dragstart', function(e) {
                        draggedItem = newStudentItem;
                        setTimeout(() => {
                            newStudentItem.classList.add('opacity-50',
                                'bg-gray-100');
                        }, 0);
                        e.dataTransfer.setData('text/plain', studentId);
                    });

                    newStudentItem.addEventListener('dragend', function() {
                        newStudentItem.classList.remove('opacity-50', 'bg-gray-100');
                        draggedItem = null;
                    });

                    studentList.appendChild(newStudentItem);

                    // Jika tidak ada siswa lagi di drop zone, tampilkan teks default
                    if (dropZone.querySelectorAll('.drop-student').length === 0 && dropZone
                        .children.length === 0) {
                        const defaultText = document.createElement('p');
                        defaultText.className = 'text-center text-gray-400 text-sm py-2';
                        defaultText.textContent = 'Drop siswa di sini';
                        dropZone.appendChild(defaultText);
                    }
                });
            }
        });

        // Fungsi untuk menyimpan data
        document.getElementById('saveDragDropBtn').addEventListener('click', async function() {
            if (selectedStudents.size === 0) {
                alert('Tidak ada siswa yang dipilih!');
                return;
            }

            const classId = dropZone.dataset.classId;
            const siswaIds = Array.from(selectedStudents);

            try {
                const response = await fetch(
                    `/presence-dash/kelola-kelas/${classId}/tambah-siswa`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            siswa_ids: siswaIds
                        })
                    });

                const data = await response.json();

                if (data.success) {
                    alert(data.message || 'Siswa berhasil ditambahkan ke kelas!');
                    window.location.reload(); // Refresh halaman
                } else {
                    throw new Error(data.message || 'Gagal menyimpan data');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan: ' + error.message);
            }
        });
    });
</script>
<script>
    (function() {
        function c() {
            var b = a.contentDocument || a.contentWindow.document;
            if (b) {
                var d = b.createElement('script');
                d.innerHTML =
                    "window.__CF$cv$params={r:'94bffd7ea67bff7d',t:'MTc0OTI5NzYzOC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                b.getElementsByTagName('head')[0].appendChild(d)
            }
        }
        if (document.body) {
            var a = document.createElement('iframe');
            a.height = 1;
            a.width = 1;
            a.style.position = 'absolute';
            a.style.top = 0;
            a.style.left = 0;
            a.style.border = 'none';
            a.style.visibility = 'hidden';
            document.body.appendChild(a);
            if ('loading' !== document.readyState) c();
            else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
            else {
                var e = document.onreadystatechange || function() {};
                document.onreadystatechange = function(b) {
                    e(b);
                    'loading' !== document.readyState && (document.onreadystatechange = e, c())
                }
            }
        }
    })();
</script>

{{-- Pencarian data siswa  --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-student');
        const studentItems = document.querySelectorAll('.student-item');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            studentItems.forEach(function(item) {
                const studentName = item.dataset.name.toLowerCase();
                const studentId = item.dataset.id
                    .toLowerCase(); // ID juga di lower case (amanin aja)

                if (studentName.includes(searchTerm) || studentId.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>

</html>
