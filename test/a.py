
import sys
import urllib2

def main():
    urlList = sys.argv[1:]
    
    # url = 'http://simplysilent.deviantart.com/art/Surreal-Journal-CSS-424171754' # write the url here
    outputString = ''
    for u in urlList:

        uchunks = u.split(':')
        
        artist = uchunks[0]
        
        outputString +=  artist

    print outputString

    
if __name__ == "__main__":
    main()