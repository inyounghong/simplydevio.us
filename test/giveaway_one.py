
import sys
import urllib2

def main():

    members = sys.argv[1:]
    
    a = len(members)
    username = members[a-1]
    username = username.strip()

    string += username + ' '

    print string

if __name__ == "__main__":
    main()


