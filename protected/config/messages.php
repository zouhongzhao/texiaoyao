<?php
// This is hopefully a config array for the messages
return array(
    'sourcePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',  //root dir of all source
    'messagePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'messages',  //root dir of message translations
    'languages'  => array('en','zh'),  //array of lang codes to translate to, e.g. es_mx
    'fileTypes' => array('php','js',), //array of extensions no dot all others excluded
    'exclude' => array( //list of paths or files to exclude
        '.svn',
        '.git',
        'yiic',
        'yiic.php',
        '/extensions/bootstrap/gii/bootstrap/templates',
        '/extensions/JMSyntaxHighlighter',
        '/extensions/jqplot',
        '/extensions/simpleWorkflow',
        '/gii',
        '/messages',
        '/vendors'
    ),  
    //'translator' => 'Yii:t',  //this is the default but lets be complete
);
?>
