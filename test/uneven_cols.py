
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
    BIG_DIM = 1
    SMALL_DIM = 1.5
    dimensions = [BIG_DIM, SMALL_DIM, SMALL_DIM]


    string = '<br><br>'

    good_thumbs = []

    for thumb in thumbs:
        thumb_info = create_thumb(thumb)
        if thumb_info != None:
            good_thumbs.append(thumb_info)

    string += '<div class="warning">Invalid thumbs: '  + str(len(thumbs) - len(good_thumbs)) + '</div><br>'

    string += '<<i></i>div class="feature"><br><br>';

    good_thumbs = sorted(good_thumbs, key=lambda x: (float(x.width)/float(x.height)))

    chunk_number = len(good_thumbs) / len(dimensions)
    good_thumbs = good_thumbs[:chunk_number * len(dimensions)]

    all_dimensions = dimensions * chunk_number
    all_dimensions.sort()

    thumb_slot = {}

    for i in range(len(good_thumbs)):
        if not all_dimensions[i] in thumb_slot:
            thumb_slot[all_dimensions[i]] = []
        thumb_slot[all_dimensions[i]].append(good_thumbs[i])

    for a in range(chunk_number):
        if a % 2 == 0:
            string += '<<i></i>div class="big"><br>'
            string += thumb_slot[BIG_DIM][0].html
            thumb_slot[BIG_DIM] = thumb_slot[BIG_DIM][1:]
            string += '<<i></i>/div><br><br>'
            string += '<<i></i>div class="small"><br>'
            for b in range(2):
                string += thumb_slot[SMALL_DIM][0].html
                thumb_slot[SMALL_DIM] = thumb_slot[SMALL_DIM][1:]

        else:
            string += '<<i></i>div class="small"><br>'
            for b in range(2):
                string += thumb_slot[SMALL_DIM][0].html
                thumb_slot[SMALL_DIM] = thumb_slot[SMALL_DIM][1:]
            string += '<<i></i>/div><br><br>'
            string += '<<i></i>div class="big"><br>'
            string += thumb_slot[BIG_DIM][0].html
            thumb_slot[BIG_DIM] = thumb_slot[BIG_DIM][1:]

        string += '<<i></i>/div><br><br><<i></i>div class="clear"><br><br>'


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

        html = '<<i></i>div class="la"><<i></i>da:deviation id="%s"><<i></i>div class="mask"><<i></i>/div><<i></i>div class="twrap"><<i></i>a href="%s">%s<<i></i>/a> @%s<<i></i>/div><<i></i>/div><br>' % (number, pageURL, title, artist)

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