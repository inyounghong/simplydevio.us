
import sys
import urllib2

def main():

    members = sys.argv[1:]
    
    usernames = members[0].split('/')

    string = ''

    x = len(usernames)
    rejectCounter = 0
    
    for username in usernames[0:x-1]:

        if username != 'Previous123Next':
            profileURL = 'http://' +  username + '.deviantart.com'

            profileSource = sourceScraper(profileURL)

            if confirmDonation(profileSource):

                pageviews = pageviewScraper(profileSource)
                time = timeScraper(profileSource)

                answer = int(pageviews/time)

                if answer >= 300:

                    string += "<a href=\"" + profileURL + "\">" + username + "</a> -- "
                    string += str(answer)
                    string += '<br><br>'

                else:
                    string += ''
                    rejectCounter = rejectCounter + 1

            else:

                rejectCounter = rejectCounter + 1
   
        else:
            string += ''
    
    
        print string + 'rejected: ' + str(rejectCounter)


def sourceScraper(URL):
        
    page = urllib2.urlopen(URL)
    data = page.read()
    page.close()

    return data

def pageviewScraper(data):

    cuts = data.split(' </strong> Pageviews</span>')

    profileChunks = cuts[0].split('>')
    a = len(profileChunks)
    pageviews = profileChunks[a-1]

    views = pageviews.replace(",", "");
    
    return float(views)

def timeScraper(data):

    longerSubstring = '<div>Deviant for '

    if longerSubstring in data:
        cuts = data.split(longerSubstring)
        chunks = cuts[1].split('</div>')
        time = chunks[0]

        if "Month" in time:
            chunks = time.split(' ')
            number = chunks[0]

            return float(number)

        elif "Year" in time:
            chunks = time.split(' ')
            number = chunks[0]

            return float(number) * 12

        else:

            return False

        return time

    else:
        return "reject"

    
def confirmDonation(data):

    if '<span class="entry-count" title="' in data: # If they have a text + avatar donation widget

        cuts = data.split('<span class="entry-count" title="') # Only donation widgets with more than 3 are accepted

        if len(cuts) >= 5:
            return True

        else:
            return False

    elif '<div class="pp list c">' in data: # If they have an avatar donation widget

        cuts = data.split('<div class="pp list c">')
        isolate = cuts[1].split('</div>')
        avatars = isolate[0].split('<img class="avatar"')

        if len(avatars) > 5:
            return True

        else:
            return False

    else:
        return True


    
if __name__ == "__main__":
    main()


