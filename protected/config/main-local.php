<?php return array(
    
    'components' => array(
        'db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=texiaoyao',
            'emulatePrepare' => true,
            'username' => 'texiaoyao',
            'password' => 'Fn49aAx8mCCY6qVE',
            'charset' => 'utf8',
            'schemaCachingDuration' => '3600',
            'enableProfiling' => true,
            'tablePrefix' => 'yao_',
        ),
    ),
    'params' => array(
        'yiiPath' => '/home/www/texiaoyao/public_html/core/framework/',
        'webmasterEmail' => 'admin@texiaoyao.cn',
        'editorEmail' => 'admin@texiaoyao.cn',
        'encryptionKey' => '301ee56e222dd317cfe979dcc9103baf8e877fd3b357176e53952c89082ccb43371ae7446f6d54fe0fa58c5d16781177d8ca77b0c9a15cd8533f35fa',
    ),
);