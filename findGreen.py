from PIL import Image 
from PIL import ImageFont
from PIL import ImageDraw 
import math

file = open('greenery.txt',"w")
for i in range(1,29):
	im = Image.open("pics/"+str(i)+".png")
	pix = im.load()
	w,h = im.size
	count = 0.0

	for x in range(w):
		for y in range(h):
			if pix[x,y][1] > pix[x,y][0] and pix[x,y][1] > pix[x,y][2]:
				count+= 1
				#print pix[x,y]

	result = str(math.ceil(count/(w*h) * 10000)/100)
	print math.ceil(count/(w*h) * 10000)/100,"%"
	#file.write(str(i)+'.png,'+result+'\n')
	file.write(result+'\n')

# draw.text((x, y),"Sample Text",(r,g,b))
# draw = ImageDraw.Draw(im)
# draw.text((100, 100), result, (0,255,50))
# im.save('sample-out.jpg')			

