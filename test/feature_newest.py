
import sys
import urllib2

def main():
    urlList = sys.argv[1:]

    string = ""
    
    for u in urlList:
        
        string += ':icon' + u + ': :dev' + u + ':<br>'
        
        galleryURL = 'http://' + u + '.deviantart.com/gallery/?catpath=%2F'
        
        page = urllib2.urlopen(galleryURL)
        data = page.read()
        page.close()
        
        cut = data.split('id="gmi-ResourceStream"') # ditch the first half
        chunk = cut[1].split('<span class="iconcommentsstats">') # create index 0,1,2
        
        for i in chunk[0:4]:
            cut2 = i.split('" class="t" title="') # narrow in slice, we want 0
        
            uchunks = cut2[0].split('-')
            a = len(uchunks)
        
            urlNum = uchunks[a-1]
        
            string += ':bigthumb' + urlNum + ': '
        
        string += '<br><br>'
            
    print string

    
if __name__ == "__main__":
    main()