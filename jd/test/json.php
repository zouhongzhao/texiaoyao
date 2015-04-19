<?php
require '../JosSdk.php';
$str = '["12345678901234567890",12345678901234567890]';
$r = PhplutilsJSON::decode($str);
var_dump($r);