# -*- coding:utf-8 -*-
import requests
from time import sleep
from threading import Thread
import thread
import MySQLdb
import time
from lxml import etree
UPDATE_INTERVAL = 0.01
import codecs  
import chardet
import sys    
default_encoding = 'utf-8'
if sys.getdefaultencoding() != default_encoding: 
    reload(sys) 
    sys.setdefaultencoding(default_encoding)
#
# 数据库变量设置
#
DB_HOST = 'localhost'
DB_USER = "root"
DB_PASSWD = "yqjkb_mallol_texiaoyao"
DB_NAME = "texiaoyao"
DB_CHARSET="utf8"
import re  

 #创建锁，用于访问数据库
lock = thread.allocate_lock()
#Fetch the all string matched. Return a list.  
def regexmatch(rule, str):  
    '''''Fetch the all string matched. Return a list.'''  
    p = re.compile(rule)  
    return p.findall(str)  
#end def regexmatch  
  
  
# decodeHtmlEntity  
def decodeHtmlEntity(s) :  
    '''''decodeHtmlEntity'''  
    if s == '' or not s:  
       return ''  
    result = s  
      
    import locale  
    result = result.decode(locale.getdefaultlocale()[1], "ignore").encode(locale.getdefaultlocale()[1]).replace("xc2xa0", " ")  
      
    return result  
# end def decodeHtmlEntity  
class URLThread(Thread):
    def __init__(self, url, timeout=10, allow_redirects=True):
        super(URLThread, self).__init__()
        self.url = url
        self.timeout = timeout
        self.allow_redirects = allow_redirects
        self.response = None
 
    def run(self):
        try:
            self.response = requests.get(self.url, timeout=self.timeout, allow_redirects=self.allow_redirects)
        except Exception , what:
            print what
            pass
 
def multi_get(uris, timeout=10, allow_redirects=True):
    '''
    uris    uri列表
    timeout 访问url超时时间
    allow_redirects 是否url自动跳转
    '''
    def alive_count(lst):
        alive = map(lambda x : 1 if x.isAlive() else 0, lst)
        return reduce(lambda a, b : a + b, alive)
    threads = [ URLThread(uri, timeout, allow_redirects) for uri in uris ]
    for thread in threads:
        thread.start()
    while alive_count(threads) > 0:
        sleep(UPDATE_INTERVAL)
    return [ (x.url, x.response) for x in threads ]

def isShopExist(name,store):
    print '=====begin======\r\n'
    print name
    print store
    if name:
        sql = "select * from gxc_shop where name = '"+name+"' and store = '"+store+"'"
        cur.execute(sql)
        row1 = cur.fetchone()
        if row1:
            return True
        else:
            return False
    else:
        return True
 #插入数据库
def insert_db(shopList):
    
    '''
    page 采集的产品内容
    cid 该产品的分类id
    '''
    global lock
    sql = "insert into gxc_shop (name,content,price,url,store,creat_time,comment,type,stock,category_id,original_price,drugstore,image,remark) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
    #插入数据，一页20条
    for i in range(0, len(shopList)):
        if(isShopExist(shopList[i]['name'],shopList[i]['store'])):
            print 'exist'
            continue
        else:
            print 'add'
            param = (shopList[i]['name'], shopList[i]['content'],shopList[i]['price'],shopList[i]['url'],shopList[i]['store'],
                        shopList[i]['creat_time'],shopList[i]['comment'],shopList[i]['type'],shopList[i]['stock'],shopList[i]['category_id'],shopList[i]['original_price'],shopList[i]['drugstore'],shopList[i]['image'],shopList[i]['remark'])
            lock.acquire() #创建锁
            cur.execute(sql, param)
            con.commit()
            lock.release() #释放锁
            print '=====end======\r\n'
def get_data_by_keyword(data,url,category):
    newData = []
    html = data.text.encode(data.encoding)
    
    page = etree.HTML(html.lower())
    tree = etree.HTML(html)
    urlArray = ['jianke.com','ehaoyao.com','jxdyf.com','360kad.com','yaofang.cn']
    for item in urlArray:
        if(url.find(item) >= 0):
            urlValue = item
            break
        
    if(urlValue == 'jianke.com'):
        nodes = tree.xpath("//div[@class='prolist']")
        for node in nodes:
            # Fetch all link      
            ls = node.xpath(".//li")
            for l in ls:
                linkNode = l.xpath(".//p[@class='pic']/a")[0]
                url = linkNode.get("href")
                imageNode = l.xpath(".//p[@class='pic']/a/img")[0]
                image = imageNode.get("src")
                nameNode = l.xpath(".//p[@class='info']/span[1]/a")[0]
                name = nameNode.text
                if(name == None):
                    continue
                specialPriceNode = l.xpath(".//p[@class='info']/span[@class='price_s']")[0]
                price = specialPriceNode.text
                price = price.strip() .lstrip('￥')
                NormalPriceNode = l.xpath(".//p[@class='info']/span[@class='price_m']")[0]
                original_price = NormalPriceNode.text
                original_price = original_price.strip() .lstrip('￥')
                shopData = {
                     'name' : name,
                     'content' : '',
                     'price'  : price,
                     'url'  : url,
                     'store'  : '健客网',
                     'creat_time' : time.strftime("%Y-%m-%d %H:%M:%S", time.localtime()) ,
                     'comment' :'',
                     'type'  : '0',
                     'stock'  : '有货',
                     'category_id'  : category[0],
                     'original_price'  : original_price,
                     'drugstore' : 'http://texiaoyao.cn/resources/2013/09/lM1vAAn9.jpg',
                     'image' : image,
                     'remark' : ''
                }
                newData.append(shopData)
        print "A"
    elif(urlValue == 'ehaoyao.com'):
#        nodes = tree.xpath("//div[@class='GoodsSearchWrap']")[0]
#        if(nodes[0].text == None):
#            return newData//*[@id="pdt-25581"]/div/div[2]/table/tbody/tr[1]/td/h6/a
        nodes = tree.xpath("//div[@class='items-gallery ']")
        for node in nodes:
            linkNode = node.xpath(".//div[@class='goodpic']/a")[0]
            url = linkNode.get('href')
            imageNode = node.xpath(".//div[@class='goodpic']/a/img")[0]
            image = imageNode.get("src")
            infoNode = node.xpath(".//div[@class='goodinfo']")[0]
            nameNode = infoNode.xpath(".//td/h6/a")[0]
            name = nameNode.get("title")
            if(name == None):
                continue
            priceNode = infoNode.xpath(".//td")[3]
            priceNode = priceNode.xpath(".//span[@class='price1']")[0]
            price = priceNode.text
            price = price.strip() .lstrip('￥')
            NormalPriceNode = infoNode.xpath(".//td")[4]
            NormalPriceNode = NormalPriceNode.xpath(".//span[@class='mktprice1']")[0]
            original_price = NormalPriceNode.text
            original_price = original_price.strip() .lstrip('￥')
            guigeNode = infoNode.xpath(".//td")[1]
            guige = guigeNode.text #规格
            changjiaNode  = infoNode.xpath(".//td")[2]
            changjia = changjiaNode.text #厂家
            remark = guige+'<br />'+changjia
            shopData = {
                     'name' : name,
                     'content' : '',
                     'price'  : price,
                     'url'  : url,
                     'store'  : '好药师',
                     'creat_time' : time.strftime("%Y-%m-%d %H:%M:%S", time.localtime()) ,
                     'comment' :'',
                     'type'  : '0',
                     'stock'  : '有货',
                     'category_id'  : category[0],
                     'original_price'  : original_price,
                     'drugstore' : 'http://texiaoyao.cn/resources/2013/09/CoPZ7Awc.png',
                     'image' : image,
                     'remark' : remark
                }
            newData.append(shopData)
        print "ehaoyao.com"
    elif(urlValue == 'yaofang.cn'):
        nodes = tree.xpath("//div[@class='pro']")
        domain = 'http://www.yaofang.cn'
        for node in nodes:
            linkNode = node.xpath(".//dl/dt/a")[0]
            url = domain + linkNode.get('href')
            imageNode = node.xpath(".//dl/dt/a/img")[0]
            image = imageNode.get("src")
            nameNode = node.xpath(".//dl/dd[@class='title']/a")[0]
            name = nameNode.get("title")
            if(name == None):
                continue
            try:
                guigeNode = node.xpath(".//dl/dd[@class='gg']")[0]
                changjiaNode  = node.xpath(".//dl/dd[@class='cj']")[0]
                guige = guigeNode.text #规格
                changjia = changjiaNode.text #厂家
                remark = guige+'<br />'+changjia
                remark = str(remark)
            except:
                 remark = ''
           
#            guigeNode = node.xpath(".//dl/dd[@class='gg']")[0]
#            guige = guigeNode.text #规格
#            changjiaNode  = node.xpath(".//dl/dd[@class='cj']")[0]
#            changjia = changjiaNode.text #厂家
#            remark = guige+'<br />'+changjia
#            remark = str(remark)
            specialPriceNode = node.xpath(".//dl/dd[@class='price']/text()")
            price = str(specialPriceNode)
            price = filter(lambda ch: ch in '0123456789.', price)
            price = price.lstrip('5')
            NormalPriceNode = node.xpath(".//dl/dd[@class='scj']/text()")
            original_price = str(NormalPriceNode)
            original_price = filter(lambda ch: ch in '0123456789.', original_price)
            original_price = original_price.lstrip('5')
            
            shopData = {
                     'name' : name,
                     'content' : '',
                     'price'  : price,
                     'url'  : url,
                     'store'  : '药房网',
                     'creat_time' : time.strftime("%Y-%m-%d %H:%M:%S", time.localtime()) ,
                     'comment' :'',
                     'type'  : '0',
                     'stock'  : '有货',
                     'category_id'  : category[0],
                     'original_price'  : original_price,
                     'drugstore' : 'http://texiaoyao.cn/resources/2013/09/bLe6motF.png',
                     'image' : image,
                     'remark' : remark
                }
            newData.append(shopData)
        print 'yaofang.cn'
    elif(urlValue == '360kad.com'):
        nodes = tree.xpath("//ul[@class='Product_Show']")
        for node in nodes:
            # Fetch all link      
            ls = node.xpath(".//li")
            for l in ls:
                linkNode = l.xpath(".//p[@class='pic']/a")[0]
                url = linkNode.get("href")
                imageNode = l.xpath(".//p[@class='pic']/a/img")[0]
                image = imageNode.get("src")
                nameNode = l.xpath(".//p[@class='t']/a")[0]
                name = nameNode.get("title")
                print name
                sys.exit()
                if(name == None):
                    continue
                specialPriceNode = l.xpath(".//div[@class='compare_price']/p[@class='Vip_price']/span[@class='price']")[0]
                price = specialPriceNode.text
                price = price.strip() .lstrip('￥')
                NormalPriceNode = l.xpath(".//div[@class='compare_price']/p[@class='Market_price']/span[@class='price']")[0]
                original_price = NormalPriceNode.text
                original_price = original_price.strip() .lstrip('￥')
                
                shopData = {
                     'name' : name,
                     'content' : '',
                     'price'  : price,
                     'url'  : url,
                     'store'  : '康爱多',
                     'creat_time' : time.strftime("%Y-%m-%d %H:%M:%S", time.localtime()) ,
                     'comment' :'',
                     'type'  : '0',
                     'stock'  : '有货',
                     'category_id'  : category[0],
                     'original_price'  : original_price,
                     'drugstore' : 'http://texiaoyao.cn/resources/2013/09/lM1vAAn9.jpg',
                     'image' : image,
                     'remark' : ''
                }
                print shopData
                sys.exit()
                newData.append(shopData)
        print '360kad.com'
    elif(urlValue == 'jxdyf.com'):
        
        nodes = tree.xpath('//*[@id="bodybox"]/div[2]/div[2]/div[1]/div[1]/h2/font')[0]
        print html
        sys.exit()
        nodes = tree.xpath("//div[@class='flzyzz']")
        for node in nodes:
            # Fetch all link      
            ls = node.xpath(".//li")
            for l in ls:
                linkNode = l.xpath(".//p[1]/a")[0]
                url = linkNode.get("href")
               
                imageNode = l.xpath(".//p[1]/a/img")[0]
                image = imageNode.get("src")
                nameNode = l.xpath(".//h3[1]/a")[0]
                name = nameNode.text
                print name
                sys.exit()
                if(name == None):
                    continue
                
                specialPriceNode = l.xpath(".//p[@class='shop-comm-cen']/strong")[0]
                price = specialPriceNode.text
                price = price.strip() .lstrip('￥')
#                NormalPriceNode = l.xpath(".//div[@class='compare_price']/p[@class='Market_price']/span[@class='price']")[0]
#                original_price = NormalPriceNode.text
#                original_price = original_price.strip() .lstrip('￥')
                specialPriceNode = l.xpath(".//p[@class='shop-comm-cen']/strong")[0]
                price = specialPriceNode.text
                specialPriceNode = l.xpath(".//p[@class='shop-comm-cen']/strong")[0]
                price = specialPriceNode.text
                shopData = {
                     'name' : name,
                     'content' : '',
                     'price'  : price,
                     'url'  : url,
                     'store'  : '健客网',
                     'creat_time' : time.strftime("%Y-%m-%d %H:%M:%S", time.localtime()) ,
                     'comment' :'',
                     'type'  : '0',
                     'stock'  : '有货',
                     'category_id'  : category[0],
                     'original_price'  : original_price,
                     'drugstore' : 'http://texiaoyao.cn/resources/2013/09/lM1vAAn9.jpg',
                     'image' : image,
                     'remark' : ''
                }
                print shopData
                sys.exit()
                newData.append(shopData)
        print 'jxdyf.com'
    else:
        print "D"
    
#    nodes = tree.xpath("//div[@id='menu_hover']")
#     nodes = tree.xpath("//div[@class='prolist']")
#     for node in nodes:
#         # Fetch all link      
#         ls = node.xpath(".//li")
#         for l in ls:
#             print l
#             prelink = l.get("href")
#             print prelink
#             print l.text
#         sys.exit()
#         hrefs = page.xpath(u"//a")
#         for href in hrefs:
#             fo = open("../worksort.txt", "rw+")
#             fo.seek(0, 2)
#             line = fo.write(decodeHtmlEntity(href.text))
#             fo.close()
#             print href
#             print decodeHtmlEntity(href.text)
    return newData
                
if __name__ == '__main__':
    con = None
    urls = []
    try:
        print "我们的祖国"
        sys.exit()
        con = MySQLdb.connect(host=DB_HOST, user=DB_USER,
             passwd=DB_PASSWD, db=DB_NAME, charset=DB_CHARSET)
        cur = con.cursor()
         #查询所有分类
        sql = "SELECT id,name FROM `gxc_category"        
        cur.execute(sql)
        rows = cur.fetchall()
#        print rows
        for row in rows:
            r = multi_get([
                                'http://search.jianke.com/prod?wd='+row[1],#健客
#                                'http://www.jxdyf.com/search-'+row[1]+'.html', #金象
#                                  'http://search.360kad.com/?pageText='+row[1],#康爱多
                                'http://www.ehaoyao.com/gallery--n,'+row[1]+'-grid.html',#好药师
# 'http://www.ehaoyao.com/gallery--n,感冒-grid.html',
# 'http://search.360kad.com/?pageText=感冒',
#'http://www.jxdyf.com/search-感冒.html',
                                'http://www.yaofang.cn/n/public/search/?s_words='+row[1]+'&sort=interrelated', #药房网
                                ], 1, False)
            for url, data in r:
                if data: 
                    insert_db(get_data_by_keyword(data,url,row))
            print row[0]
        time.sleep(3)
        cur.close()
    finally:
        if con:
            con.close()
    
#            print "received this data %s from this url %s" % (data.headers, url)
    

