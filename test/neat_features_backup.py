
import sys
import urllib2

class Thumb:
    def __init__(self, number, title, artist, width, height):
        self.number = number
        self.title = title
        self.artist = artist
        self.width = width
        self.height = height


def main():
    thumbs = sys.argv[1:]
    string = '<br><br>'
    desired_height = 200
    good_thumbs = []
    thumb_list = []  # List of generated newest and popular thumbs

    if thumbs[0].isdigit() == False: # If input is not all numbers (if they are names)

        for u in thumbs:
            galleryURL = 'http://' + u + '.deviantart.com/gallery/?catpath=%2F&sort=popularity'
            newestURL = 'http://' + u + '.deviantart.com/gallery/?catpath=%2F'

            try:
                urllib2.urlopen(galleryURL)
                gallerySource = gallerySourceScraper(galleryURL)
                substring = '<div class="message">This section has no deviations yet!</div>'

                if substring in gallerySource:
                    string += u + ' does not have any deviations yet. '

                else:
                    cut = gallerySource.split('id="gmi-ResourceStream"')
                    chunk = cut[1].split('<span class="iconcommentsstats">')
                    if len(chunk) >= 4: # If there are four chunks (three thumbs)
                        thumb_list += bigthumbCounter(3, chunk) # Grab three popular thumbs
                        newestSource = gallerySourceScraper(newestURL)
                        cut = newestSource.split('id="gmi-ResourceStream"')
                        chunk = cut[1].split('<span class="iconcommentsstats">')
                        thumb_list += bigthumbCounter(2, chunk) # Grab two newest thumbs

                    elif len(chunk) == 3:  # If there are three chunks (two thumbs)
                        thumb_list += bigthumbCounter(2, chunk)

                    else: #If there are two chunks (one thumb)
                        thumb_list += bigthumbCounter(1, chunk)

            except urllib2.HTTPError:
                string += u + ', does not exist. '

    if len(thumb_list) == 0: # If no names were used (just thumbs)
        for thumb in thumbs:
            thumb_info = create_thumb(thumb) # creates thumb objects
            if thumb_info != None:
                good_thumbs.append(thumb_info) # adds thumb info to good_thumbs list
    else:
        for thumb in thumb_list:
            thumb_info = create_thumb(thumb) # creates thumb objects
            if thumb_info != None:
                good_thumbs.append(thumb_info) # adds thumb info to good_thumbs list

    string += '<div class="warning">Invalid thumbs: '  + str(len(thumb_list) - len(good_thumbs)) + '</div>'

    artist_slot = {}     # New dictionary that sorts each Thumb of good_thumbs by artist

    for i in range(len(good_thumbs)):
        artist_name = good_thumbs[i].artist
        if not artist_name in artist_slot:
            artist_slot[artist_name] = []
        artist_slot[artist_name].append(good_thumbs[i])

    for artist_name in artist_slot:
        list_of_thumbs = artist_slot[artist_name]
        string += '<br><br>:icon%s: <<i></i>h1>@%s<<i></i>/h1> <br><br>' % (artist_name, artist_name)
        for a in range(len(list_of_thumbs)):
            needed_width = (int(list_of_thumbs[a].width) * desired_height) / int(list_of_thumbs[a].height)
            #string += '<<i></i>div class="la">'
            if int(list_of_thumbs[a].height) > desired_height: # If the thumb is big enough we add the width
                string += '<<i></i>da:deviation id="%s" width="%s">' % (list_of_thumbs[a].number, needed_width)
            else:
                string += '<<i></i>da:thumb id="%s">' % (list_of_thumbs[a].number)
            #string += '<<i></i>div class="twrap"><<i></i>a href="http://www.deviantart.com/art/a-%s">%s<<i></i>/a><<i></i>/div><<i></i>/div><br>' % (list_of_thumbs[a].number, list_of_thumbs[a].title)

    print string


def create_thumb(number): # creates a Thumb object
    try:
        pageSource = pageSourceScraper(number)
        cut = pageSource.split('<meta name="title" content="') # ditch the first half
        chunk = cut[1].split(' by ') #
        title = chunk[0]
        artist = chunk[1].split(' on deviantART">')
        artist = artist[0]

        # finding the width and height
        cut2 = pageSource.split('deviation_width_fullview":')
        if len(cut2) > 1: # If they are not lit thumbs
            chunk2 = cut2[1].split(',"deviation_height_fullview":')
            width = chunk2[0]
            height = chunk2[1].split(',"deviation_cat_topicid"')
            height = height[0]
        else:
            width = str(138)
            height = str(150)

        return Thumb(number, title, artist, width, height)

    except urllib2.HTTPError:
        return None

def pageSourceScraper(number): # Scrapes the page source of an artwork

    pageURL = 'http://www.deviantart.com/art/a-' + number
    page = urllib2.urlopen(pageURL)
    pageSource = page.read()
    page.close()
    return pageSource

def bigthumbCounter(x, b): # Confirms the number of available thumbs and spits out the thumbcodes

    gallery_thumbs = []

    for i in b[0:x]:
        cut2 = i.split('" class="t') # narrow in slice, we want 0
        uchunks = cut2[0].split('-')
        a = len(uchunks)
        urlNum = uchunks[a-1] # URL number is the last index in the array
        gallery_thumbs.append(urlNum)

    return gallery_thumbs

def gallerySourceScraper(URL): # Scrapes any page

    page = urllib2.urlopen(URL)
    gallerySource = page.read()
    page.close()
    return gallerySource



if __name__ == "__main__":
    main()