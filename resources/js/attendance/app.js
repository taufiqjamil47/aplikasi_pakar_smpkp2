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

// Script: Toggle User Menu
document.getElementById('user-menu-button').addEventListener('click', function () {
    const menu = document.getElementById('user-menu');
    menu.classList.toggle('hidden');
});

// Script : Toggle Sidebar
document.getElementById('mobile-menu-button').addEventListener('click', function () {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('-translate-x-full');
});

// Script: Draggble
document.addEventListener('DOMContentLoaded', function () {
    const studentList = document.getElementById('student-list');
    const dropZone = document.getElementById('class-drop-zone');
    let draggedItem = null;
    const selectedStudents = new Set(); // Untuk menyimpan ID siswa yang dipilih

    // Event untuk item yang bisa di-drag
    studentList.querySelectorAll('.student-item').forEach(item => {
        item.addEventListener('dragstart', function (e) {
            draggedItem = this;
            setTimeout(() => {
                this.classList.add('opacity-50', 'bg-gray-100');
            }, 0);
            e.dataTransfer.setData('text/plain', this.dataset.id);
        });

        item.addEventListener('dragend', function () {
            this.classList.remove('opacity-50', 'bg-gray-100');
            draggedItem = null;
        });
    });

    // Event untuk drop zone
    dropZone.addEventListener('dragover', function (e) {
        e.preventDefault();
        this.classList.add('bg-indigo-50', 'border-indigo-300');
    });

    dropZone.addEventListener('dragleave', function () {
        this.classList.remove('bg-indigo-50', 'border-indigo-300');
    });

    dropZone.addEventListener('drop', function (e) {
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
            studentElement.querySelector('.remove-student').addEventListener('click', function () {
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
                newStudentItem.addEventListener('dragstart', function (e) {
                    draggedItem = newStudentItem;
                    setTimeout(() => {
                        newStudentItem.classList.add('opacity-50',
                            'bg-gray-100');
                    }, 0);
                    e.dataTransfer.setData('text/plain', studentId);
                });

                newStudentItem.addEventListener('dragend', function () {
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
    document.getElementById('saveDragDropBtn').addEventListener('click', async function () {
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
                showModal('Sukses', data.message || 'Siswa berhasil ditambahkan ke kelas!', 'success', function () {
                    window.location.reload(); // Refresh halaman setelah modal ditutup
                });
                // alert(data.message || 'Siswa berhasil ditambahkan ke kelas!');
                // window.location.reload(); // Refresh halaman
            } else {
                throw new Error(data.message || 'Gagal menyimpan data');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        }
    });
});

// Fungsi untuk menampilkan modal
function showModal(title, message, type, callback = null) {
    // Hapus modal yang sudah ada jika ada
    const existingModal = document.getElementById('custom-modal');
    if (existingModal) {
        existingModal.remove();
    }

    // Buat elemen modal baru
    const modal = document.createElement('div');
    modal.id = 'custom-modal';
    modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
    modal.innerHTML = `
        <div class="bg-white rounded-lg p-6 max-w-md w-full animate-fade-in">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold" id="modal-title">${title}</h3>
            </div>
            <div class="mb-4" id="modal-message">${message}</div>
        </div>
    `;
    document.body.appendChild(modal);

    // Set timeout untuk menghilangkan modal setelah 3 detik
    setTimeout(() => {
        modal.classList.add('animate-fade-out');

        // Hapus modal setelah animasi selesai
        setTimeout(() => {
            modal.remove();
            if (callback) callback();
        }, 300); // Sesuaikan dengan durasi animasi fade-out
    }, 2000);
}

// Script : Loading Function
(function () {
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
            var e = document.onreadystatechange || function () { };
            document.onreadystatechange = function (b) {
                e(b);
                'loading' !== document.readyState && (document.onreadystatechange = e, c())
            }
        }
    }
})();

// Script : Pencarian data siswa
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-student');
    const studentItems = document.querySelectorAll('.student-item');

    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();

        studentItems.forEach(function (item) {
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

