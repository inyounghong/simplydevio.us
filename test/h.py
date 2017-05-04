
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
        
        
        
        string = data.split('dev-view-deviation')
    
       
        
        widthString = string[2].split('width="')
        widthValue = widthString[1].split('"')
        
        content = widthValue[4].split(' by ')
        
        uchunks = u.split('-')
        
        # urlNum = uchunks[4].strip()
        a = len(uchunks)
        
        urlNum = uchunks[a-1]
        
        width = widthValue[0]
        height = widthValue[2]
        widthNum = int(width)
        heightNum = int(height)
        
        setWidth = 300
        
        newHeight = (setWidth * heightNum) / widthNum
        
        
        
        outputString +=  "<div class=\"la\"><da:deviation id=\"" + urlNum + "\"><div class=\"twrap\"><p>" + content[0] + "</p>:dev" + content[1] + ":</div></div>"
        #outputString += data
        print outputString
    #print 
    
if __name__ == "__main__":
    main()