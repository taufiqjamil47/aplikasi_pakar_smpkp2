import cv2
import numpy as np
import pytesseract
import os

per = 25
formDotSet = [
        # Data Peserta Didik
        [(966, 54),(1198, 96), 'text', 'Nomor Pendaftaran'],
        [(504, 148),(1098, 177), 'text', 'Nama Peserta'],
        [(503, 187),(606, 214), 'text', 'Jenis Kelamin'],
        [(503, 225),(828, 251), 'text', 'NISN'],
        [(503, 263),(951, 290), 'text', 'NIK'],
        [(503, 340),(828, 367), 'text', 'Tempat Lahir'],
        [(860, 340),(1097, 367), 'text', 'Tanggal Lahir'],
        [(503, 379),(607, 406), 'text', 'Agama'],
        [(503, 471),(1096, 500), 'text', 'Alamat'],
        [(879, 509),(960, 538), 'text', 'RT'],
        [(1011, 509),(1105, 538), 'text', 'RW'],
        [(503, 548),(1098, 578), 'text', 'Desa'],
        [(503, 586),(1098, 615), 'text', 'Kecamatan'],
        [(503, 624),(1098, 654), 'text', 'Kabupaten'],
        [(503, 663),(1098, 692), 'text', 'Provinsi'],
        
        # Data Tambahan
        [(503, 739),(952, 769), 'text', 'No. Telp'],
        [(503, 778),(1098, 807), 'text', 'Asal SD'],
        [(503, 855),(1105, 883), 'text', 'PIP/PKH/KKS'],
        [(503, 1617),(614, 1643), 'text', 'Tinggi Badan'],
        [(503, 1652),(614, 1678), 'text', 'Berat Badan'],
        [(503, 1687),(614, 1714), 'text', 'Anak Ke'],
        [(828, 1642),(935, 1670), 'text', 'Ukuran Baju'],
        
        # Data ayah
        [(503, 922),(1096, 949), 'text', 'Nama Ayah'],
        [(859, 958),(1105, 982), 'text', 'Tahun Lahir Ayah'],
        [(503, 993),(613, 1019), 'text', 'Pekerjaan Ayah'],
        [(503, 1049),(613, 1079), 'text', 'Pendidikan Ayah'],
        
        # Data Ibu
        [(503, 1153),(1096, 1178), 'text', 'Nama Ibu'],
        [(859, 1188),(1105, 1213), 'text', 'Tahun Lahir Ibu'],
        [(503, 1223),(613, 1249), 'text', 'Pekerjaan Ibu'],
        [(503, 1281),(613, 1307), 'text', 'Pendidikan Ibu'],
        
        # Data Ibu
        [(503, 1382),(1096, 1407), 'text', 'Nama Wali'],
        [(859, 1417),(1105, 1443), 'text', 'Tahun Lahir Wali'],
        [(503, 1452),(613, 1478), 'text', 'Pekerjaan Wali'],
        [(503, 1510),(613, 1536), 'text', 'Pendidikan Wali'],
    ]

pytesseract.pytesseract.tesseract_cmd = 'C:\\Program Files\\Tesseract-OCR\\tesseract.exe'


imgQ = cv2.imread('assets/formPD/dataTrue.jpg')
h, w, c = imgQ.shape

orb = cv2.ORB_create(1000)
kp1, des1 = orb.detectAndCompute(imgQ, None)

path = 'assets/formPD'
myPictList = os.listdir(path)

for j, y in enumerate(myPictList):
    img = cv2.imread(os.path.join(path, y))

    kp2, des2 = orb.detectAndCompute(img, None)
    bf = cv2.BFMatcher(cv2.NORM_HAMMING)
    matches = bf.match(des2, des1)
    matches = sorted(matches, key=lambda x: x.distance)
    good = matches[:int(len(matches) * (per / 100))]
    imgMatch = cv2.drawMatches(img, kp2, imgQ, kp1, good[:100], None, flags=2)

    srcPoints = np.float32([kp2[m.queryIdx].pt for m in good]).reshape(-1, 1, 2)
    dstPoints = np.float32([kp1[m.trainIdx].pt for m in good]).reshape(-1, 1, 2)

    M, _ = cv2.findHomography(srcPoints, dstPoints, cv2.RANSAC, 5.0)
    imgScan = cv2.warpPerspective(img, M, (w, h))

    imgShow = imgScan.copy()
    imgMask = np.zeros_like(imgShow)

    myData = []
    print(f'Extracting Data From Forms {j}')

    for x, r in enumerate(formDotSet):
        cv2.rectangle(imgMask, ((r[0][0]), r[0][1]), ((r[1][0]), r[1][1]), (0, 255, 0), cv2.FILLED)
        imgShow = cv2.addWeighted(imgShow, 0.99, imgMask, 0.1, 0)

        imgCrop = imgScan[r[0][1]:r[1][1], r[0][0]:r[1][0]]

        if r[2] == 'text':
            extracted_text = pytesseract.image_to_string(imgCrop).strip()
            print('{} : {}'.format(r[3], extracted_text))
            myData.append(extracted_text)
            
        cv2.putText(imgShow, str(myData[x]), (r[0][0], r[0][1]),
                    cv2.FONT_HERSHEY_PLAIN, 2.5, (0, 0, 255), 4)
    with open(' OutputData.csv', 'a+') as f:
        for data in myData:
            f.write((str(data)+','))
        
        f.write('\n')

    imgShow = cv2.resize(imgShow, (w // 3, h // 3))
    print(myData)
    cv2.imshow(y + "2", imgShow)
    cv2.waitKey(0)