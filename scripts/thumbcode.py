import sys
import urllib2


def main():
    input_list = sys.argv[1:]
    string = ''
    username = input_list[0]
    string += ':icon%s: @%s <br>' % (username, username)

    for i in range(1, len(input_list)):
        if len(input_list[i]) == 15 and 'thumb' in input_list[i]:
            string += input_list[i] + ':'

    print string


def sourceScraper(URL):
    page = urllib2.urlopen(URL)
    data = page.read()
    page.close()
    return data

if __name__ == "__main__":
    main()


