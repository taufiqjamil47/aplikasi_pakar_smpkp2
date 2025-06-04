<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Absensi Hari Ini</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #signatureCanvas {
            touch-action: none;
            /* penting untuk HP agar tidak scroll saat tanda tangan */
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        canvas {
            touch-action: none;
            /* important untuk HP */
        }

        @media (max-width: 650px) {
            table {
                border: 0;
            }

            thead {
                display: none;
            }

            .mobile-stack td {
                display: flex;
                justify-content: space-between;
                padding: 0.5rem 0;
                text-align: left;
                font-size: 0.875rem;
                /* Tailwind text-sm */
            }

            .mobile-stack tr {
                display: block;
                margin-bottom: 1.5rem;
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                padding: 1rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                background-color: white;
            }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">
    @yield('content')
</body>
<script>
    function confirmSignature() {
        if (confirm(
                "⚠️ PERINGATAN!\n\nSetelah menekan tombol ini, absensi akan dikunci dan dianggap final.\nPastikan semua data sudah benar.\n\nLanjutkan tanda tangan?"
            )) {
            // Ubah hidden field ke 1 (artinya: mau tanda tangan)
            document.getElementById('signed-status').value = 1;

            // Disable tombol agar tidak bisa klik ulang
            document.getElementById('btnTandaTangan').disabled = true;
            document.getElementById('btnSimpan').disabled = true;

            // Add loading state
            const btn = document.getElementById('btnTandaTangan');
            btn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Memproses...
                `;

            // Submit form
            document.getElementById('absensiForm').submit();
        }
    }

    // Add fade-in animation to elements
    document.addEventListener('DOMContentLoaded', () => {
        const elements = document.querySelectorAll('.fade-in');
        elements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>

<script>
    // Replace all signature scripts in index.blade.php with this single implementation
    let signaturePad;

    function openSignaturePad() {
        const canvas = document.getElementById('signatureCanvas');
        if (!canvas) {
            alert("Error: Canvas tidak ditemukan. Periksa konsol browser.");
            console.error("Element dengan ID 'signatureCanvas' tidak ada.");
            return;
        }

        // Clear any existing signature pad
        if (signaturePad) {
            signaturePad.clear();
        } else {
            // Initialize only once
            signaturePad = new SignaturePad(canvas, {
                penColor: 'black',
                backgroundColor: 'white'
            });
        }

        document.getElementById('signatureModal').classList.remove('hidden');
    }

    function clearSignature() {
        if (signaturePad) signaturePad.clear();
    }

    function submitSignature() {
        if (!signaturePad || signaturePad.isEmpty()) {
            alert("Silakan tanda tangani terlebih dahulu.");
            return;
        }

        const dataURL = signaturePad.toDataURL();
        const form = document.getElementById('absensiForm');
        const signatureInput = document.createElement('input');
        signatureInput.type = 'hidden';
        signatureInput.name = 'signature_data';
        signatureInput.value = dataURL;
        form.appendChild(signatureInput);

        // Set signed status to 1
        document.getElementById('signed-status').value = 1;

        // Submit the main form
        form.submit();
    }
</script>

</html>
