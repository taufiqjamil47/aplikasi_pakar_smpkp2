from PIL import Image
import pytesseract
import sys

if len(sys.argv) < 2:
    print("Usage: python script.py <image_path>")
    sys.exit(1)

image_path = sys.argv[1]

try:
    # Buka gambar menggunakan PIL
    img = Image.open(image_path)

    # Ubah gambar menjadi teks menggunakan Tesseract OCR
    pytesseract.pytesseract.tesseract_cmd = r'C:\\Program Files\\Tesseract-OCR\\tesseract.exe'
    text = pytesseract.image_to_string(img)

    if text is None or text.strip() == "":
        raise Exception("Pemrosesan gambar ke teks mengembalikan nilai kosong.")
    
    # Print teks ke stdout (akan diambil oleh Laravel)
    print(text)

except Exception as e:
    # Print pesan kesalahan ke stdout
    print(f"Error: {str(e)}")
