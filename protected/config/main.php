<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// Set the path of Bootstrap to be the root of the project.
Yii::setPathOfAlias('bootstrap', realpath(dirname(__FILE__).'/../extensions/bootstrap/'));
Yii::setPathOfAlias('redis', realpath(dirname(__FILE__).'/../extensions/yiiredis/'));
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$config = array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'特效药比价网',
    'theme'=>'default',
    'language'=>'zh_cn',
    // 'sourceLanguage' => 'zh_cn',
	'name' => '特效药比价网',
    // preloading 'log' component
    'preload'=>array('bootstrap','log','lc'),
	'localeDataPath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'../i18n/data',
	
    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'zii.widgets.*',
    ),

    'defaultController'=>'shop',
    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'password',
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
//            'ipFilters' => array('127.0.0.1','119.97.214.130','42.121.109.194', '::1'),
            'ipFilters'=>array('119.97.214.130', '::1'),    //将此处的IP改为本机客户端目前使用的IP
        )
    ),
    // application components
    'components'=>array(
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
        ),
//         "redis" => array(
//         		"class" => "redis.ARedisConnection",
//         		"hostname" => "localhost",
//         		"port" => 6380,
//         		"prefix"=>'yao_'
//         ),
        'cache' => array (
        		'class' => 'system.caching.CFileCache',
        		'directoryLevel' => 2,
        ),
        'request'=>array(
        		'enableCsrfValidation'=>true,
        		'enableCookieValidation' => true,
        		'csrfCookie'=>array(
			    	'httpOnly'=>true,
			    ),
        ),
        //session httonly
		'session' => array(
				'sessionName'=>'texiaoyao-web',
		        'cookieParams' => array(
		                'httponly' => true,
		        ),
		),
        // 'coreMessages'=>array(
        	// 'basePath'=>'protected/messages',  
        // ),  
        
        /*
        'db'=>array(
            'connectionString' => 'sqlite:protected/data/blog.db',
            'tablePrefix' => 'tbl_',
        ),
         */
        // uncomment the following to use a MySQL database
        /*
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=yii_blog',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'tbl_',
        ),
        */
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'lc'=>array(
            'class' => 'application.components.LocaleManager',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
       'urlManager'=>array(
            'urlFormat'=>'path',
            'urlSuffix' => '.html', //后缀    
    		'caseSensitive' => true, //设置对大小写不敏感  
            'rules'=>array(
                'post/<id:\d+>/<title:.*?>'=>'post/view',
                'posts/<tag:.*?>'=>'post/index',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
            'showScriptName'=>false
        ),
        'user'=>array(
        	// 'class'=>'WebUser',
        	'stateKeyPrefix'=>'member',//这个是设置前台session的前缀  
            //'class'=>'CWebManager',
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            'loginUrl'=>array('login'),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>require(dirname(__FILE__).'/params.php'),
);
return file_exists(dirname(__FILE__).'/main-local.php')
    ? CMap::mergeArray($config, require('main-local.php'))
    : $config;
