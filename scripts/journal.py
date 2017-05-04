page_source = sourceScraper('http://sherlockbbc-fic.livejournal.com/15253.html')


def sourceScraper(URL):
    page = urllib2.urlopen(URL)
    data = page.read()
    page.close()
    return data

print 'hello world'