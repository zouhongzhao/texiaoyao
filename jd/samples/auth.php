<?php

/**
 * 授权换token过程
 * @qq  347513004 
 *
 */
include 'common/config.php';

if (isset($_GET['code'])) {
    try {
        $token = $jos->fetchAccessToken($_GET['code'], $_GET['state']);
        $_SESSION['token'] = $token;
        echo '<pre>';
        print_r($token);
    } catch (JosApiException $e) {
        header('location:auth.php');
    }
} else {
    $authUrl = $jos->getAuthorizeUrl();
    echo <<<HTML
    <h1>
	<a href="{$authUrl}">点击去京东登录授权</a>
</h1>
    <p>默认回调地址是http://localhost/jos-php-sdk/samples/auth.php</p>
HTML;
}