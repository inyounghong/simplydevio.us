# Always displays the visitor's name
# Works for both profiles and groups

import sys
import urllib2
from time import strftime

def main():
    username = sys.argv[1]  # page to check

    page = urllib2.urlopen('https://' + username + '.deviantart.com')
    source = page.read()
    page.close()

    cut = source.split('<h2><i class="icon i18"></i>')
    chunk = cut[1].split('class="f"') # Narrows down to include name and time

    # If visitor widget is in Avatar format, there is no time data to check, so just print name
    if '<div class="pppp c">' in chunk[0] or '<div class="pp list">' in chunk[0]:
        name = chunk[0].split('title="')[1];
        name = name.split('"')[0];
        print name
        return

    # If visitor widget is in avatar + name format
    if 'img class="avatar"' in chunk[1]:
        # Group avatar + name
        if 'style="padding:8px 12px">' in chunk[1]:
            name = chunk[1].split('title="')[1].split('"')[0];
        else:
            chunk2 = chunk[1].split('<br />')
            cut2 = cut[1].split('title="')
            cut3 = cut2[1].split('"')
            name = cut3[0]

     # If visitor widget is in Name format
    else:
        # Group avatar + name
        if 'style="padding:8px 12px">' in chunk[1]:
            chunks = chunk[1].split('</a>');
            name = chunks[0].split('">')[-1];
        else:
            line = chunk[1].split('</div>')
            chunk3 = line[1].split('/">')
            names = chunk3[1].split('</a>')
            name = names[0]

    print name

if __name__ == "__main__":
    main()
