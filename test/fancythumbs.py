
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

    good_thumbs = [x for x in thumbs if x not in failed_thumbs]
 
    total = len(good_thumbs)
    number_per_column = total / 2

    string += '<div class="text"><<i></i>div class="feature cols"><<i></i>div class="col"><br><br>'

    for thumb in good_thumbs[0:number_per_column]:
        string += create_thumb(thumb)

    string += '<br><<i></i>/div><<i></i>div class="col"><br><br>'

    for thumb in good_thumbs[number_per_column:total]:
        string += create_thumb(thumb)
            
    print string


def does_exist(thumb):

    try:
        pageURL = 'http://www.deviantart.com/art/a-' + thumb
        urllib2.urlopen(pageURL)
        return True
    
    except urllib2.HTTPError:
        return False


def create_thumb(number):
    pageURL = 'http://www.deviantart.com/art/a-' + number
    pageSource = pageSourceScraper(number)

    cut = pageSource.split('<meta name="title" content="') # ditch the first half
    chunk = cut[1].split(' by ') # 
    title = chunk[0]
    artist = chunk[1].split(' on deviantART">')
    artist = artist[0]
    
    return '<<i></i>div class="la"><<i></i>da:deviation id="%s"><<i></i>div class="mask"><<i></i>/div><<i></i>div class="twrap"><<i></i>a href="%s">%s<<i></i>/a> @%s<<i></i>/div><<i></i>/div><br>' % (number, pageURL, title, artist)


def pageSourceScraper(number):
    pageURL = 'http://www.deviantart.com/art/a-' + number
    page = urllib2.urlopen(pageURL)
    pageSource = page.read()
    page.close()
    return pageSource


def is_substring(substring, source):
    if substring in source:
        string += 'This deviant does not have any deviations yet.'  
        return True
    else:
        return False
    

if __name__ == "__main__":
    main()