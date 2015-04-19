Yii Blog Demo with Bootstrap
============================

This repository contains a version of the [Yii Blog Demo][YiiBlog].

It adds the [Yii bootstrap extension][YiiBootstrap].

It is based on

* [Yii Blogdemo Enhanced][YiiBlogEnhanced] and 
* [Yii Blogdemo Extended][YiiBlogExtended]

## Further Enhancements

* Translated phrases (currently available in English and German)
* `TbPortlet` component
* [DDEditor][ddeditor] extension for Markdown formatting and preview

## Installation

* Clone this repository:

~~~
cd htdocs
git clone https://bitbucket.org/jwerner/yii-blog-bootstrap.git
~~~

* Initialise submodules:

~~~
git submodule init
git submodule update
~~~

* Download [Yii bootstrap][YiiBootstrap] and upack into `protected/extensions`, so that you have a folder `protected/extensions/bootstrap`
* Copy `protected/config/main-local.php.example` to `protected/config/main-local.php`
* Edit this file to your needs


[ddeditor]: https://bitbucket.org/jwerner/yii-ddeditor-bootstrap
[YiiBlog]: http://www.yiiframework.com/doc/blog/ "Building a Blog System using Yii"
[YiiBlogEnhanced]: http://code.google.com/p/yii-blogdemo-enhanced/
[YiiBlogExtended]: http://code.google.com/p/yii-blogdemo-extended/
[YiiBootstrap]: http://www.yiiframework.com/extension/bootstrap/
=======
# texiaoyao
特效药比价网(yii+bootstrap)
