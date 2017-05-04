
import sys
import urllib2

def main():
    urlList = sys.argv[1:]
    
    # url = 'http://simplysilent.deviantart.com/art/Surreal-Journal-CSS-424171754' # write the url here
    outputString = ''
    for u in urlList:
        #usock = urllib2.urlopen(url[0])
        usock = urllib2.urlopen(u)
        data = usock.read()
        usock.close()

        string = data.split("dev-view-deviation")
        widthString = string[2].split('width="')
        widthValue = widthString[1].split('"')
        
        content = widthValue[4].split(' by ')
        
        uchunks = u.split('-')
        urlNum = uchunks[4].strip()
        #i = len(uchunks)
        #urlNum = uchunks[i]
        
        width = widthValue[0]
        height = widthValue[2]
        widthNum = int(width)
        heightNum = int(height)
        
        setWidth = 300
        
        newHeight = (setWidth * heightNum) / widthNum
        
        # print uchunks[4]
        
        outputString +=  "<<i></i>div class=\"la\"><<i></i>da:deviation id=\"" + urlNum + "\"><<i></i>div class=\"twrap\"><<i></i>p>" + content[0] + "<<i></i>/p> :dev" + content[1] + ":<<i></i>/div><<i></i>/div>"
        
        
    print "<br>" + outputString
    
if __name__ == "__main__":
    main()