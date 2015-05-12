<?php 
$url = 'http://www.syt.cn/img/2014/2/11/640348_60X60.jpg';

getImage($url,'',1);
function getImage($url,$filename='',$type=0){
	 $imgArr = array('gif','bmp','png','ico','jpg','jepg');  
	$dir = '/home/wwwroot/texiaoyao/public_html/upload/product/'; 
	if(!$url) return false;  
    
    if(!$filename) {
      $ext=strtolower(end(explode('.',$url)));     
      if(!in_array($ext,$imgArr)) return false;  
      $filename=date("dMYHis").'.'.$ext;     
    }     
    //文件保存路径 
    if($type){
  $ch=curl_init();
  $timeout=5;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
  $img=curl_exec($ch);
  curl_close($ch);
    }else{
     ob_start(); 
     readfile($url);
     $img=ob_get_contents(); 
     ob_end_clean(); 
    }
    $size=strlen($img);
    //文件大小 
    $filename = $dir . $filename;
    $fp2=@fopen($filename,'a');
    fwrite($fp2,$img);
    fclose($fp2);
    return $filename;
}


?>