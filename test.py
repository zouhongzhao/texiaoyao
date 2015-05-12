# -*- coding: utf-8 -*-
import lxml
import time
import os
#import pycurl
import StringIO
import urllib
#import cookielib
import urllib2,json
if __name__ == '__main__':
    url = 'http://www.xiaojo.com/bot/chata.php'
    values = { 'chat':'你是谁'}
    data = urllib.urlencode(values)
    req = urllib2.Request(url, data)
    response = urllib2.urlopen(req)
    result = response.read()
    print result