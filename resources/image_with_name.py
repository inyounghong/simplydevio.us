# Full version image creator - Displays visitor when name is not available

import sys
import urllib2
from time import strftime

def main():
    username = sys.argv[1]

    page = urllib2.urlopen('http://' + username + '.deviantart.com')
    source = page.read()
    page.close()

    cut = source.split('<i class="icon i18"></i> Visitors</h2>')
    cut[1] = cut[1].replace('<table align="center" class="f">', '')
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
        # If group widget in name only format
        if 'Visited here' in chunk2[1] and '<div class="text">' in chunk2[0]:
            time = chunk2[1].split('">')
            time = time[0][:-2]

            chunk3 = chunk2[0].split('</a>');
            chunk4 = chunk3[len(chunk3) - 2].split('/">')
            name = chunk4[1]

        elif 'Visited here' in chunk2[1] and '<div class="text">' not in chunk2[0]:
            time = chunk2[1].split('">')
            time = time[0][:-2]
            cut2 = cut[1].split('title="')
            cut3 = cut2[1].split('"')
            name = cut3[0]
        else:
            time = chunk2[3].split('</span>')
            time = time[0]
            cut2 = cut[1].split('title="')
            cut3 = cut2[1].split('"')
            name = cut3[0]

    minutes = time[:-3].split(':')
    minutes = minutes[1]
    if minutes[0] == '0':
       minutes = minutes[1:]

    print name

if __name__ == "__main__":
    main()