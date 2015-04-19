<?php

/**
 * 商品列表
 * @qq  347513004 
 *
 */
include 'common/config.php';

if (! isset($_SESSION['token'])) {
    exit('请先登录授权');
}

$req = new WareInfoByInfoRequest();
$req->setPage(1);
$req->setPageSize(20);
$resp = $jos->execute($req, $_SESSION['token']->access_token);
echo '<pre>';
print_r($resp);