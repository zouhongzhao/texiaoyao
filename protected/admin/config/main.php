<?php

// 这里使用了一个扩展，故定义了一个别名
Yii::setPathOfAlias('bootstrap', realpath(dirname(__FILE__).'/../../extensions/bootstrap/'));
// 下面是分离前后台需要增加的
$backend=dirname(dirname(__FILE__));
$frontend=dirname($backend);
Yii::setPathOfAlias('backend', $backend);

// 下面是通用配置
$config = array(
		'basePath' => $frontend,
		'controllerPath' => $backend.'/controllers',
		'viewPath' => $backend.'/views',
		'runtimePath' => $backend.'/runtime',
		'name'=>'后台管理程序',
		'sourceLanguage' => 'zh_cn',
// preloading 'log' component
		 'preload'=>array('bootstrap','log','lc'),

// autoloading model and component classes
		'import'=>array(
			// 'application.models.*',
			// 'application.components.*',
			'backend.models.*',
			'zii.widgets.*',
			'backend.components.*'
			),
		'defaultController'=>'site',
		'modules'=>array(
			//  Gii tool
			'gii'=>array(
				'class'=>'system.gii.GiiModule',
				'password'=>'password',
				'generatorPaths'=>array(
		                'bootstrap.gii',
			),
			),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//				'ipFilters'=>array('127.0.0.1','::1'),
			'ipFilters'=>array('119.97.214.130', '::1'),    //将此处的IP改为本机客户端目前使用的IP
			),

			// application components
		'components'=>array(
			 'bootstrap'=>array(
	            'class'=>'bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
			),
			// uncomment the following to enable URLs in path-format
			/*
			'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
			'<controller:\w+>/<id:\d+>'=>'<controller>/view',
			'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
			'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			),
			*/

			'errorHandler'=>array(
			// use 'site/error' action to display errors
						'errorAction'=>'site/error',
			),
			'log'=>array(
						'class'=>'CLogRouter',
						'routes'=>array(
									array(
														'class'=>'CFileLogRoute',
														'levels'=>'error, warning',
									),
									// uncomment the following to show log messages on web pages
									array(
														'class'=>'CWebLogRoute',
									),
								),
			),
			'urlManager'=>array(
	            'showScriptName' => true, 'urlSuffix'=>'/'
	        ),
			'user' => array(
				    //'class' => 'AdminWebUser', //后台登录类实例
				    'stateKeyPrefix' => 'admin', //后台session前缀
				    "guestName" => "游客"
				),
			),

			// application-level parameters that can be accessed
			// using Yii::app()->params['paramName']
				'params'=>array(
			// this is used in contact page
						'adminEmail'=>'admin@texiaoyao.cn',
						'loginType'=>'',
						'copyrightInfo'=>'Copyright &copy; '.date('Y').'
			by Texiaoyao. All Rights Reserved. <a target="_blank" href="http://www.miitbeian.gov.cn/">鄂ICP备13000850号-</a>1',
			),
			);
		
return file_exists(dirname(__FILE__).'/../../config/main-local.php')
    ? CMap::mergeArray($config, require(dirname(__FILE__).'/../../config/main-local.php'))
    : $config;
	
