# Only displays visitors from the last minute
# Defaults to default name (ie visitor) otherwise
# Works for both profiles and groups

import sys
import urllib2
from time import strftime

def main():
    username = sys.argv[1]  # page to check
    default = sys.argv[2]   # ie 'visitor'

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
            time = chunk[1].split("</li>")[0];
        else:
            chunk2 = chunk[1].split('<br />')
            time = chunk2[3].split('</span>')
            time = time[0]

            cut2 = cut[1].split('title="')
            cut3 = cut2[1].split('"')
            name = cut3[0]

     # If visitor widget is in Name format
    else:
        # Group avatar + name
        if 'style="padding:8px 12px">' in chunk[1]:
            chunks = chunk[1].split('</a>');
            name = chunks[0].split('">')[-1];
            time = chunks[1].split("</span>")[3];
        else:
            line = chunk[1].split('</div>')
            cut2 = line[0].split('@ ')
            time = cut2[1]

            chunk3 = line[1].split('/">')
            names = chunk3[1].split('</a>')
            name = names[0]

    # Group visit - just check if Visited Moments ago
    if "Visited here" in time:
        if "Moments ago" in time:
            print name
        else:
            print default
        return

    # Profile page - check minutes
    minutes = time[:-3].split(':')
    minutes = minutes[1]

    if minutes == strftime("%M") or minutes == str(int(strftime("%M")) - 1):
        print name
    else:
        print default

if __name__ == "__main__":
    main()
