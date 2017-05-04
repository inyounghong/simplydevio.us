
import sys
import urllib2

class Thumb:
    def __init__(self, number, title, artist, width, height, html):
        self.number = number
        self.title = title
        self.artist = artist
        self.width = width
        self.height = height
        self.html = html


def main():
    thumbs = sys.argv[1:]

    string = '<br><br>'

    good_thumbs = []

    for thumb in thumbs:
        thumb_info = create_thumb(thumb)
        if thumb_info != None:
            good_thumbs.append(thumb_info) # Add legitimate thumbs to list good_thumbs

    string += '<div class="warning">Invalid thumbs: '  + str(len(thumbs) - len(good_thumbs)) + '</div><br>'

    good_thumbs = sorted(good_thumbs, key=lambda x: (float(x.width)/float(x.height)))

    string += '<<i></i>div class="feature">'

    for i in range(len(good_thumbs)):
        string += good_thumbs[i].html


    print string


def create_thumb(number):
    try:
        pageURL = 'http://www.deviantart.com/art/a-' + number
        pageSource = pageSourceScraper(number)
        cut = pageSource.split('<meta name="title" content="') # ditch the first half
        chunk = cut[1].split(' by ') #
        title = chunk[0]
        artist = chunk[1].split(' on deviantART">')
        artist = artist[0]

        # finding the width and height
        cut2 = pageSource.split('deviation_width_fullview":')
        chunk2 = cut2[1].split(',"deviation_height_fullview":')
        width = chunk2[0]
        height = chunk2[1].split(',"deviation_cat_topicid"')
        height = height[0]

        html = '<<i></i>div class="la"><<i></i>da:deviation id="%s"><<i></i>div class="twrap"><<i></i>a href="%s">%s<<i></i>/a> by @%s<<i></i>/div><<i></i>/div><br>' % (number, pageURL, title, artist)

        return Thumb(number, title, artist, width, height, html)

    except urllib2.HTTPError:
        return None

def pageSourceScraper(number):
    pageURL = 'http://www.deviantart.com/art/a-' + number
    page = urllib2.urlopen(pageURL)
    pageSource = page.read()
    page.close()
    return pageSource



if __name__ == "__main__":
    main()