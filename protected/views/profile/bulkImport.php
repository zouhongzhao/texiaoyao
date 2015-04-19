<?php $this->pageTitle=Yii::app()->name . ' - '.Yii::t('site',"Bulk import");
$this->breadcrumbs=array(
	Yii::t('site',"Bulk import"),
);
?>
<div class="page-header">
<h2><?php echo Yii::t('site','Bulk import'); ?></h2>
</div>
<div class="row">
<div class="span3">
<?php echo $this->renderPartial('menu'); ?>
</div>
<div class="span7">
<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="alert alert-success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>


 <form class="form-create-post" id="upload_file_form" method="post" enctype="multipart/form-data">
        <fieldset>   
           <div class="control-group">
            <label for="shop_file" class="control-label">文件</label>
            <div class="controls">
              <input type="file" id="shop_file" name="xls_file" class="input-file">
            </div>
          </div>
          
            <div class="form-actions">
			<button type="submit" class="btn btn-primary btn-large">导入</button>
			</div>
        </fieldset>
       <input type="hidden" value="<?php echo Yii::app()->getRequest()->getCsrfToken(); ?>" name="YII_CSRF_TOKEN" />
      </form>

</div>
<div id="form-content">
		<table id="form">
			<tbody><tr>
				<td style="vertical-align: top !important" width="33%">
					<p><br>
						<span class="text-warning">(支持的格式: .csv|.xls|.xlsx)</span>
						<br>
						<span class="text-warning">文件不能大于10M</span>
						<br>
						<span class="text-warning">产品缩略图尺寸最好为150x100左右</span>
					</p>
					<p>
						<a href="http://texiaoyao.cn/upload/sample/category.txt" class="sample-download">下载产品分类 (.txt)(必须填这里面的id,不然前台按分类搜索就找不到产品)</a>
					</p>
					<p>
						<a href="http://texiaoyao.cn/upload/sample/sample.csv" class="sample-download">下载示例文件 (.csv)</a>					</p>
					<p>
						<a href="http://texiaoyao.cn/upload/sample/sample.xls" class="sample-download">下载示例文件 (.xls)</a>					</p>
					<p>
						<a href="http://texiaoyao.cn/upload/sample/sample.xlsx" class="sample-download">下载示例文件 (.xlsx)</a>					</p>

				</td>
			</tr>
			<tr>
				<td colspan="3">
					<p><img src="http://texiaoyao.cn/upload/sample/sample.png"></p>
				</td>
			</tr>
		</tbody></table>
	</div>
<script type="text/javascript"> 
   
$(document).ready(function(){ 
$("#upload_file_form").submit(function() {
	var fileObj = $('#shop_file');
        var filepath=fileObj.val();
   var extStart=filepath.lastIndexOf(".");
 
   var ext=filepath.substring(extStart,filepath.length).toUpperCase();
 // alert(ext);
   if(ext!=".XLS"&&ext!=".XLSX"&&ext!=".CSV"){
 
	   alert("文件限于xls,xlsx,csv格式");
	   fileObj.focus();
	   if ( $.browser.msie) {  //判断浏览器
	     this_.select();
             document.execCommand("delete");
	   }else{
			fileObj.val("");
	   }
	   return false;
   }
 
   var file_size = 0;          
                if ( $.browser.msie) {      
                   var img=new Image();
   						img.src=filepath;   
						 
							if(img.fileSize > 0){
								 
								if(img.fileSize>10*1024){   
									
								alert("文件不能大于10MB。");
								fileObj.focus();
								
							      this_.select();
                                  document.execCommand("delete");
								  return false ;
								}
								 
								}
								 
                } else {
					 
                    file_size = this_.files[0].size;   
					 
                    console.log(file_size/1024/1024 + " MB");     
 
					var size = file_size / 1024;  
					alert(size);
					if(size > 10){  
						alert("上传的文件大小不能超过10M！");  
						fileObj.focus();
						fileObj.val("");
						return false ;
					}
				}
       return true;
}); 
}); 
</script>