
import sys
import urllib2

def main():
    memberList = sys.argv[1:]
    
    '''u = "http://www.google.com"
    newList = urllib2.urlopen(u)
    data = newList.read()
    newList.close()'''
    
    a = len(memberList)
    membername = memberList[a-1]
    membername = membername.strip()
    string = ':icon' + membername + ':'
    
    print string
    
if __name__ == "__main__":
    main()