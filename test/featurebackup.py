
import sys
import urllib2

def main():
    length = len(sys.argv)
    commandNumber = length - 1

    urlList = sys.argv[1:commandNumber]
    numberOfThumbs = sys.argv[commandNumber]


    string = "" + str(numberOfThumbs)
    
    for u in urlList:
        
        galleryURL = 'http://' + u + '.deviantart.com/gallery/?catpath=%2F&sort=popularity'

        try:
            urllib2.urlopen(galleryURL)
        
            gallerySource = gallerySourceScraper(galleryURL)

            string += ':icon' + u + ': :dev' + u + ':<br>'
        
            substring = '<div class="message">This section has no deviations yet!</div>'

            if substring in gallerySource:

                string += 'This deviant does not have any deviations yet.'  

            else:

                cut = gallerySource.split('id="gmi-ResourceStream"') # ditch the first half
                chunk = cut[1].split('<span class="iconcommentsstats">') # create index 0,1,2

                
                if len(chunk) >= 4: # If there are four chunks (three thumbs)
                    string += bigthumbCounter(3, chunk)

                #elif len(chunk) == 3:  # If there are three chunks (two thumbs)
                    #string += bigthumbCounter(2, chunk)

                else: #If there are two chunks (one thumb)
                    for i in range(1,4):
                        if i == len(chunk):
                            string += bigthumbCounter(i, chunk)
                        else:
                            string += 'you failed'
        
        except urllib2.HTTPError:

            string += 'Incorrect username!sdfsdf The deviant, ' + u + ', does not exist.'   

        string += '<br><br>'
            
    print string


def bigthumbCounter(x, b): # Confirms the number of available thumbs and spits out the thumbcodes

    bigthumb = ''

    for i in b[0:x]:
        
        cut2 = i.split('" class="t') # narrow in slice, we want 0
    
        uchunks = cut2[0].split('-')
        a = len(uchunks)
    
        urlNum = uchunks[a-1] # URL number is the last index in the array
        bigthumb += ':bigthumb' + urlNum + ': '
    
    return bigthumb

def gallerySourceScraper(URL):
        
    page = urllib2.urlopen(URL)
    gallerySource = page.read()
    page.close()

    return gallerySource


    
if __name__ == "__main__":
    main()