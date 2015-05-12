#!/usr/bin/env python
#-*- coding: utf-8 -*-
#------------------------------------------------------
#file:scheduler.py
#desc:the scheduler of spider
#author:we.agathe@gmail.com
#------------------------------------------------------
from Utility import DQueue,Record,Categoryids
from base import BaseSpider,url_maps,BaseDb
from pipeline import *
import time
import signal
import base
from settings import getRedis,get_Maps
default_encoding = 'utf-8'
if sys.getdefaultencoding() != default_encoding: 
    reload(sys) 
    sys.setdefaultencoding(default_encoding)
class test_spider(BaseSpider):
    def Rules(self): 
        print 'test ok!'
drugstoreurl = [
#                 'http://search.jianke.com/prod'
                 'http://www.jxdyf.com/search',
                 'http://search.360kad.com',
                'http://www.ehaoyao.com/search',
                 'http://www.yaofang.cn/n/public/search'
                ]
class product(BaseSpider):
    def Rules(self):
        #linkbase
        linkbase = getRedis()
        #linkbase.flushdb()
        db = BaseDb()
        db.connectdb()
        db.getAllCategorys()
        
        category_links = Categoryids(linkbase)
        url_list = DQueue(linkbase,'url_list')
#         category_links.set('aaaasw222','zhz')
#         print category_links.get('zhz')
#         sys.exit(0)
        for store in drugstoreurl:
            url_set = Record(linkbase, store)
            #print url_list.len()
            #sys.exit()
            #for i in xrange(30):
                #url = url_list.pop()
                #url_set.delete(url,store)
                #url_set.delete(url,'crawled_set')
                #print url_list.len()
#              print url_list.len()
            if(url_list.len() == 0):
                for item in base.category_ids:
                    if(store == 'http://search.jianke.com/prod'):
                        url = store+'?wd='+item['name']+'&catagoryid='+str(item['id'])
                    elif(store == 'http://www.jxdyf.com/search'):
                        url = store+'/'+item['name']+'.html?catagoryid='+str(item['id'])
                    elif(store == 'http://search.360kad.com'):
                        url = store+'?pageText='+item['name']+'&catagoryid='+str(item['id'])
                    elif(store == 'http://www.ehaoyao.com/search'):
                        url = store+'/search/'+item['name']+'?catagoryid='+str(item['id'])
                    elif(store == 'http://www.yaofang.cn/n/public/search'):
                        url = store+'?s_words='+item['name']+'&sort=interrelated&catagoryid='+str(item['id'])
                    
                    url_list.push(url)
            #url_list.pop()
            #print url_list.len()
            #sys.exit(0)
            base.url_maps = get_Maps()
            signal.signal(60, self.reload_handler)
            list = {
                    'url':url_list,
                    'url_set':url_set,
                    'category_links':category_links
                    }
            self.AddRules(list, 'Parse_url', 'url', 1)
        #sys.exit()

    def scheduling(self):
        """调度策略"""
#         start_url = 'http://www.yaofang.cn/n/public/search/?s_words=%E5%87%8F%E8%82%A5&sort=interrelated'
#         url_list.push(start_url)
        while 1:
            time.sleep(2)
            print 111
            # url_list.push(start_url)

    def reload_handler(self,signum,frame):
        tmp = get_Maps()
        if tmp:
            base.url_maps = tmp
            print 'reload the maps config file ok ...'
            print base.url_maps
        else:
            print 'reload the maps config file failed ...'


class news(BaseSpider):
    def Rules(self):
        #linkbase
        linkbase = getRedis(2)
        #linkbase.flushdb()
        db = BaseDb()
        db.connectdb()
        db.getAllCategorys()
        
        category_links = Categoryids(linkbase)
        url_list = DQueue(linkbase,'url_news')
#         category_links.set('aaaasw222','zhz')
#         print category_links.get('zhz')
#         sys.exit(0)
        for store in drugstoreurl:
            url_set = Record(linkbase, store)
            #print url_list.len()
            #sys.exit()
            #for i in xrange(30):
                #url = url_list.pop()
                #url_set.delete(url,store)
                #url_set.delete(url,'crawled_set')
                #print url_list.len()
#              print url_list.len()
            if(url_list.len() == 0):
                for item in base.category_ids:
                    if(store == 'http://search.jianke.com/prod'):
                        url = store+'?wd='+item['name']+'&catagoryid='+str(item['id'])
                    elif(store == 'http://www.jxdyf.com/search'):
                        url = store+'/'+item['name']+'.html?catagoryid='+str(item['id'])
                    elif(store == 'http://search.360kad.com'):
                        url = store+'?pageText='+item['name']+'&catagoryid='+str(item['id'])
                    elif(store == 'http://www.ehaoyao.com/search'):
                        url = store+'/search/'+item['name']+'?catagoryid='+str(item['id'])
                    elif(store == 'http://www.yaofang.cn/n/public/search'):
                        url = store+'?s_words='+item['name']+'&sort=interrelated&catagoryid='+str(item['id'])
                    
                    url_list.push(url)
            #url_list.pop()
            #print url_list.len()
            #sys.exit(0)
            base.url_maps = get_Maps()
            signal.signal(60, self.reload_handler)
            list = {
                    'url':url_list,
                    'url_set':url_set,
                    'category_links':category_links
                    }
            self.AddRules(list, 'Parse_url', 'url', 10)
        #sys.exit()

    def scheduling(self):
        """调度策略"""
#         start_url = 'http://www.yaofang.cn/n/public/search/?s_words=%E5%87%8F%E8%82%A5&sort=interrelated'
#         url_list.push(start_url)
        while 1:
            time.sleep(2)
            print 111
            # url_list.push(start_url)

    def reload_handler(self,signum,frame):
        tmp = get_Maps()
        if tmp:
            base.url_maps = tmp
            print 'reload the maps config file ok ...'
            print base.url_maps
        else:
            print 'reload the maps config file failed ...'
