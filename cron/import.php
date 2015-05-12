<?php
header("Content-Type: text/html; charset=UTF-8");
		$importFilePath = '../upload/excel/';
		$allowTypes = array('xlsx','xls','csv');
		$toImportFiles = array();
		$importFilePath = rtrim($importFilePath, "/")."/";
		if ($handle = opendir($importFilePath)) {
		    while (false !== ($entry = readdir($handle))) {
		    	$files = pathinfo($entry);
				if(!in_array($files['extension'], $allowTypes)){
					continue;
				}
		        array_push($toImportFiles, $entry);
		    }
		    closedir($handle);
		}
		// print_r($toImportFiles);die;
		if(empty($toImportFiles)){
			die();
		}
		echo "date: ".date('Y-m-d H:i:s')."***************************************\r\n";
		 set_include_path('.'. PATH_SEPARATOR .'/home/wwwroot/texiaoyao/public_html/protected/vendors/phpexcel/Classes' . PATH_SEPARATOR . get_include_path());
            require_once 'PHPExcel/IOFactory.php';
			$mysqli = new mysqli('localhost', 'root', '19890312zhz', 'texiaoyao');
			if ($mysqli->connect_error) {
			    die('Connect Error (' . $mysqli->connect_errno . ') '
			            . $mysqli->connect_error);
			}
			if (mysqli_connect_error()) {
			    die('Connect Error (' . mysqli_connect_errno() . ') '
			            . mysqli_connect_error());
			}
			if (!$mysqli->set_charset("utf8")) {  
			    printf("Error loading character set utf8: %s\n", $mysqli->error);  die();
			} else {  
			    printf("Current character set: %s\n", $mysqli->character_set_name()); 
			}
			foreach($toImportFiles as $entry){
				$file_path = $importFilePath . $entry;
				$inputFileType = PHPExcel_IOFactory::identify($file_path);
	            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	            $objReader->setReadDataOnly(true);
	            $objPHPExcel = $objReader->load($file_path);     
	            $objWorksheet = $objPHPExcel->getActiveSheet();
	            $all = "";
				echo $file_path."\r\n";	
	            foreach ($objWorksheet->getRowIterator() as $row) {
	                $cellIterator = $row->getCellIterator();
	                $cellIterator->setIterateOnlyExistingCells(false); 
	                //var_dump($row->getCellIterator());
	                foreach ($cellIterator as $cell) {
	                    $cellValue = filter_var($cell->getValue(), FILTER_SANITIZE_STRING);
	//                     if(empty($cellValue)){
	//                         continue;
	//                     }
	                    $all .= '******'.$cellValue;
	                }
	                $all .= "^^^^^^";
	            }
	            $lines_array = array();
	            $line = explode("^^^^^^", $all);
	            $saveImportDatas = array();
	
	            foreach($line as $l){
	                $l = filter_var($l, FILTER_SANITIZE_STRING);
	                $element = explode("******", trim($l));
	                //$element = array_filter($element,create_function('$v','return !empty($v);'));
	                array_push($saveImportDatas,$element);
	            }
				unset($saveImportDatas[0]);
				foreach ($saveImportDatas as $key => $item) {
					if(!isset($item[1]) || !isset($item[5]) || !isset($item[6]) || !isset($item[7]) || !isset($item[8]) || !isset($item[10])){
						continue;
					}
					$name = $item[1];
					$sku = $item[2];
					$description = $item[3];
					$original_price = $item[4];
					$price = $item[5];
					$store = $item[6];
					$url = $item[7];
					$image = $item[8];
					$stock = $item[9];
					$category_id = $item[10];
					$remark = $item[11];
					if(empty($name) || empty($price) || empty($store) || empty($url) || empty($image) || empty($category_id)){
						continue;
					}
					
					if (!filter_var ($url, FILTER_VALIDATE_URL ) || !filter_var ($image, FILTER_VALIDATE_URL ) || !is_numeric($category_id)) {  
				        continue;
				    }
					$url = addslashes($url);
					$image = addslashes($image);
					
					// $url = 'http://www.jianke.com/product/10622.html';
					$result = $mysqli->query("SELECT id,price FROM yao_shop where url = '{$url}' limit 1");
					while ($row = $result->fetch_assoc()) {
						$id = $row['id'];
						$old_price = $row['price'];
						break;
					}
					$num_rows = $result->num_rows;
					echo $num_rows.'-'.$url."\r\n";
					if($num_rows == 0){
					
						$image = getImage($image,'',1);
						var_dump($image)."\r\n";
						if($image){
							//insert
							echo "insert .... \r\n";
							$sql="INSERT INTO yao_shop (name, sku, description,original_price,price,store,url,image,stock,category_id,remark)
								VALUES
								('".addslashes($name)."','".addslashes($sku)."','".addslashes($description)."','".addslashes($original_price)."','".addslashes($price)."','".addslashes($store)."','".$url."','".$image."','".addslashes($stock)."','".addslashes($category_id)."','".addslashes($remark)."')";
							echo $sql;
								
							if (!$mysqli->real_query($sql))
							{
								  echo 'Error: ' . $mysqli->error;
								  continue;
							}
							echo "success \r\n";
						}
						
					}elseif($price != $old_price){
							//$image = getImage($image,'',1);
							//var_dump($image)."\r\n";
							if($image){
								echo "update .... \r\n";
								$sql="UPDATE yao_shop set name = '".addslashes($name)."', sku = '".addslashes($sku)."', original_price = '".addslashes($original_price)."',price = '".addslashes($price)."',store = '".addslashes($store)."',stock = '".addslashes($stock)."',category_id = '".addslashes($category_id)."' where id = {$id}";
								echo $sql;
									
								if (!$mysqli->real_query($sql))
								{
									  echo 'Error: ' . $mysqli->error;
									  continue;
								}
								echo "success \r\n";
							}
							
					}
					
				}
				unlink($file_path);
				// print_r($saveImportDatas);die;
			}
			mysqli_close($mysqli);
			
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
