
import sys
import urllib2

def main():
    thumbs = sys.argv[1:]
    string = '<br><br>'

    failed_thumbs = []

    for thumb in thumbs:

        if does_exist(thumb) == False:
            failed_thumbs.append(thumb)
            
    string += '<div class="warning">Invalid thumbs: '  + str(len(failed_thumbs)) + '</div><br>'

    for thumb in thumbs:
        string += create_thumb(thumb)
            
    print string


def does_exist(thumb):
    pageURL = 'http://www.deviantart.com/art/a-' + thumb 

    try:
        pageSourceScraper(pageURL)
        return True
    
    except urllib2.HTTPError:
        return False


def create_thumb(number):
    pageURL = 'http://www.deviantart.com/art/a-' + number 
    pageSource = pageSourceScraper(pageURL)

    cut = pageSource.split('<meta name="title" content="') # ditch the first half
    chunk = cut[1].split(' by ') # 
    title = chunk[0]
    artist = chunk[1].split(' on deviantART">')
    artist = artist[0]
    
    return '<<i></i>div class="la"><<i></i>da:deviation id="%s"><<i></i>div class="mask"><<i></i>/div><<i></i>div class="twrap"><<i></i>a href="%s">%s<<i></i>/a> @%s<<i></i>/div><<i></i>/div><br>' % (number, pageURL, title, artist)


def pageSourceScraper(URL):
    page = urllib2.urlopen(URL)
    pageSource = page.read()
    page.close()
    return pageSource
    

if __name__ == "__main__":
    main()