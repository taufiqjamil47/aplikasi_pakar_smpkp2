import cv2 
import pytesseract

pytesseract.pytesseract.tesseract_cmd = 'C:\\Program Files\\Tesseract-OCR\\tesseract.exe'
img = cv2.imread('assets/baca_data.jpg')

# img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
# hImg, wImg, _ = img.shape
# boxes = pytesseract.image_to_boxes(img)
# for b in boxes.splitlines() :
#     # print(b)
#     b = b.split(' ')
#     # print(b)
#     x, y, w, h = int(b[1]), int(b[2]), int(b[3]), int(b[4])
#     cv2.rectangle(img, (x, hImg-y), (w, hImg-h), (0, 0, 255), 1)
#     cv2.putText(img, b[0], (x, hImg-y+25), cv2.FONT_HERSHEY_COMPLEX, 1, (50,50,255),1)
    
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
hImg, wImg, _ = img.shape
conf = r'--oem 3 --psm 6 outputbase digits'
boxes = pytesseract.image_to_data(img, config=conf)
for x, b in enumerate(boxes.splitlines()) :
    if x != 0 :
        b = b.split()
        print(b)
        if len(b) == 12 :
            x, y, w, h = int(b[6]), int(b[7]), int(b[8]), int(b[9])
            cv2.rectangle(img, (x, y), (w+x, h+y), (0, 0, 255), 1)
            cv2.putText(img, b[11], (x, y), cv2.FONT_HERSHEY_COMPLEX, 1, (50,50,255),1)


# img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
# hImg, wImg, _ = img.shape
# conf = r'--oem 3 --psm 6 outputbase digits'
# boxes = pytesseract.image_to_data(img, config=conf)
# for x, b in enumerate(boxes.splitlines()) :
#     if x != 0 :
#         b = b.split()
#         print(b)
#         if len(b) == 12 :
#             x, y, w, h = int(b[6]), int(b[7]), int(b[8]), int(b[9])
#             cv2.rectangle(img, (x, y), (w+x, h+y), (0, 0, 255), 1)
#             cv2.putText(img, b[11], (x, y), cv2.FONT_HERSHEY_COMPLEX, 1, (50,50,255),1)

cv2.imshow('Result', img)
cv2.waitKey(0)