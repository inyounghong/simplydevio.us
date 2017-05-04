import time
from datetime import date
from datetime import timedelta
from datetime import datetime, date, time
import sys
import urllib2


def main():
    name = sys.argv[1]
    string = ''
    watcher_dict = dict()
    months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
    month_numbers = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']

    offset = '0'
    today = date.today()

    while True:

        watcher_url = 'http://' + name + '.deviantart.com/modals/watchers/?offset=' + offset
        page_source = sourceScraper(watcher_url)

        if '" offset="-1">' in page_source:
            chunks = page_source.split('" offset="-1">');

            # For each watcher on the list
            for i in range(len(chunks) -1):
                ldate = chunks[i+1].split('</span>')
                ldate = ldate[0]

                if 'ago' in ldate:
                    ldate = ldate.split(" ")
                    if '1d' in ldate[0]:
                        ldate = today - timedelta(days=1)
                    elif '2d' in ldate[0]:
                        ldate = today - timedelta(days=2)
                    else:
                        ldate = today

                else:
                    ldate_parts = ldate.split(' ');
                    month = ldate_parts[0]
                    day = ldate_parts[1]

                    # If comma, or different year
                    if ',' in day:
                        day = day.replace(',', '')
                        year = ldate_parts[2]
                    else:
                        year = '2014'

                    # Replacing months
                    month = datetime.strptime(month, '%B')
                    month = month.strftime("%m")


                    ldate = date(int(year), int(month), int(day))

                if ldate in watcher_dict:
                    watcher_dict[ldate].append(1)
                else:
                    watcher_dict[ldate] = [1]

            offset = str(int(offset) + 100)

        else:

            break

    sorted_dict = sorted(watcher_dict)
    first_date = sorted_dict[0]

    for x in range(0, (today - first_date).days):
        adate = today - timedelta(days=x)
        if adate not in watcher_dict:
            watcher_dict[adate] = []

    for key in sorted(watcher_dict):
        string += '<div class="date" style="height:' + str(len(watcher_dict[key]) * 5) + 'px"><div class="info">' + str(key) + '<br>' + str(len(watcher_dict[key])) + ' watchers</div></div>'
        print string

def sourceScraper(URL):
    page = urllib2.urlopen(URL)
    data = page.read()
    page.close()
    return data

if __name__ == "__main__":
    main()


