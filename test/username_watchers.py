
import sys
import urllib2

def main():
    memberList = sys.argv[1:]
    
    a = len(memberList)
    membername = memberList[a-1]
    membername = membername.strip()
    string = membername + '/'
    
    print string
    
if __name__ == "__main__":
    main()