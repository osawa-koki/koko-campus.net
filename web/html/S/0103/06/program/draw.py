import cv2
import numpy as np

img = cv2.imread("template.png")

img2 = img.copy()

cv2.circle(img, (200, 200), 50, (255, 0, 0), 3)
cv2.circle(img, (50, 450), 100, (0, 0, 255), 10)
cv2.circle(img, (300, 100), 150, (0, 255, 255), 50)

cv2.imshow("koko's lesson", img2)
cv2.waitKey(0)
cv2.destroyAllWindows()
