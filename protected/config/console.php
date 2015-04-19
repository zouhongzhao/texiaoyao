<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
$config = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
);
return file_exists(dirname(__FILE__).'/console-local.php')
    ? CMap::mergeArray($config, require('console-local.php'))
    : $config;

