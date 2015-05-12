#!/usr/bin/env python
# -*- coding:utf-8 -*-
#------------------------------------------------------
#file:downloader.py
#desc:download the web page
#author:we.agathe@gmail.com
#------------------------------------------------------
import urllib2
import time
import zlib
import StringIO
import string
import gzip
import traceback
import socket
import sys
default_encoding = 'utf-8'
#---------get---html--------------
def get_source2(source):
    if source.find('p://') > 0:
        try:
            req = urllib2.Request(source)
            req.add_header('Accept-Encoding','gzip')
        except:
            return None

        try:
            retval = urllib2.urlopen(req)
        except:
            return None
        try:
            if retval.headers.has_key('content-encoding'):
                fileobj = StringIO.StringIO()
                fileobj.write(retval.read())
                fileobj.seek(0)
                gzip_file = gzip.GzipFile(fileobj=fileobj)
                context = gzip_file.read()
            else:
                context = retval.read()
        except:
            return None

        return context
    return None

def get_source(source):
    time.sleep(5)
    if source.find('p://') > 0:
        print 88888
        try:
            req = urllib2.Request(source)
            req.add_header('Accept-Encoding','gzip')
        except:
            for i in traceback.format_exception(sys.exc_info()[0],sys.exc_info()[1],sys.exc_info()[2]):
                print i.replace('\n','').strip()
            #return 999
            #return None
        print 333
        
        try:
            opener = urllib2.build_opener()
            retval = opener.open(req)
        except EOFError:
            retval = urllib2.urlopen(req)
        except:
            for i in traceback.format_exception(sys.exc_info()[0],sys.exc_info()[1],sys.exc_info()[2]):
                print i.replace('\n','').strip()
            return None
        
        try:
            context = retval.read()
        except socket.timeout, e:
            print("TIMEOUT!")
            return None
        print 555
        
        try:
            if retval.headers.has_key('content-encoding'):
                context = zlib.decompress(context, 16+zlib.MAX_WBITS)
                print 666
#                 context = context.decode('utf-8')
            else:
                context = retval.read()
                print 777
        except:
            print 888
            return None
#         print context
#         sys.exit()
        return context
    return None

