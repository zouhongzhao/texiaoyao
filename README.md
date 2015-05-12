# texiaoyao
特效药比价网(yii+bootstrap)
>自己业余时间做的,因为上线了2年,没什么效果,也没多少精力去推广,所以就共享了出来。
>主要用到了Yii+Bootstrap+Jquery+python+redis采集

>##已实现的功能
>1,多语言(中文和英文)
  
>2,前后台,注册登录以及会员管理中心
  
>3,产品的采集(python+lxml+redis)  在cron/spider-roach目录下

##<a id="user-content-demo" class="anchor" href="#demo" aria-hidden="true"><span class="octicon octicon-link"></span></a>Demo
<p>For a live preview of the current theme, see <a href="http://texiaoyao.cn/">http://texiaoyao.cn/</a>.</p>


前台:
![image](https://github.com/zouhongzhao/texiaoyao/raw/master/front.png)
后台：
![image](https://github.com/zouhongzhao/texiaoyao/raw/master/admin.png)


##安装步骤
>
####一:ubuntu nginx服务器:
>1,vim /etc/nginx/site-enable/texiaoyao.conf
  
>2,添加如下内容
	
	server {
	    listen 80;
	    server_name  texiaoyao.cn www.texiaoyao.cn;
	    #if ($host != 'bbs.texiaoyao.cn') {
	    #   rewrite ^/(.*)$ http://bbs.texiaoyao.cn/$1 permanent;
	    #}
	
	    root   /home/www/texiaoyao/public_html;
	    index index.html index.htm index.php default.html default.htm default.php;
	    error_log /home/logs/texiaoyao.log;
	    set $yii_bootstrap "index.php";
	
	    charset utf-8;
	
	    location / {
	        index  index.html $yii_bootstrap;
	        try_files $uri $uri/ /$yii_bootstrap?$args;
	    }
	
	    location ~ ^/(protected|framework|themes/\w+/views) {
	        deny  all;
	    }
	
	    #avoid processing of calls to unexisting static files by yii
	    location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
	        try_files $uri =404;
	    }
	
	    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
	    #
	    location ~ \.php {
	     fastcgi_pass unix:/var/run/php5-fpm.sock;
	        fastcgi_index index.php;
	        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
	        include fastcgi_params;
	
	        }
	
	    # prevent nginx from serving dotfiles (.htaccess, .svn, .git, etc.)
	    location ~ /\. {
	        deny all;
	        access_log off;
	        log_not_found off;
	    }
	}

>3,service nginx restart

####二:配置文件:
>protected/config/main-local.php
  
>在这里修改数据库用户名密码以及yii core路径.
