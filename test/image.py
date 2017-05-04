# Full version image creator - for Simply only

import sys
import urllib2
from time import strftime

def main():
	username = 'simplysilent' #sys.argv[1]

	page = urllib2.urlopen('http://' + username + '.deviantart.com')
	source = page.read()
	page.close()

	cut = source.split('<i class="icon i18"></i> Visitors</h2>')
	chunk = cut[1].split('class="f"') # Narrows down to include name and time

	# If visitor widget is in list format
	if '<div style="float: right;">' in chunk[1]:
	    chunk2 = chunk[1].split('</div>')
	    cut2 = chunk2[0].split('@ ')
	    time = cut2[1]

	    chunk3 = chunk2[1].split('/">')
	    names = chunk3[1].split('</a>')
	    name = names[0]

	# If visitor widget is in avatar + name format
	else:
	    chunk2 = chunk[1].split('<br />')
	    time = chunk2[3].split('</span>')
	    time = time[0]

	minutes = time[:-3].split(':')
	minutes = minutes[1]

	cut2 = cut[1].split('title="')
	cut3 = cut2[1].split('"')
	name = cut3[0]

	if minutes == strftime("%M") or minutes == str(int(strftime("%M")) - 1):
	    print name
	else:
	    print 'visitor'

if __name__ == "__main__":
    main()