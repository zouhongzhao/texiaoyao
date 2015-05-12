<?php
echo phpinfo();
$num = 10;
function aa(){
	$num = $num*10;
}
aa();
echo $num;

$date = "08/27/2010";
Print ereg_replace("([0-9]+)/([0-9]+)/([0-9]+)", "\\2/\\1/\\3", $date);


$string = "This is a test";
echo str_replace(" is", " was", $string);
echo ereg_replace("( )is", "\\1was", $string);
echo ereg_replace("(( )is)", "\\2was", $string);
?>