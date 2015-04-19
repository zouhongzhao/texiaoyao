	<div id="header">
	<div id='search_form'>
<ul id="Z_TMAIL_SIDER_V2" class="sw_categorys_nav clearfix">
	<li class="allcategorys">
		<h3 class="title-item-hd"><a href="javascript:void(0);" class=""><s class="icon"></s></a></h3>
		
		<ul class="sublist" style="top: 41px; opacity: 1; display: none; ">
			<?php
			$typeahead = array();
			foreach ($categoryList as $key => $value){
				echo '<li><h3 class="mcate-item-hd">
								<span>'.$key.'</span>
							</h3>';
				echo '<p class="mcate-item-bd">';
				foreach ($value as $cate) {
					array_push($typeahead,$cate['name']);
					echo '<a href="'.$this->createUrl("shop/search",array("category_id" => $cate['id'])).'">'.$cate['name'].'</a>';
				}
				echo '</p></li>';
			}
			$typeahead = '["' . implode('","', $typeahead) . '"]';
			?>
		</ul>
	</li>
	<li class="lin">
<form method='get' action='<?php echo $this->createUrl("shop/search")?>'>
	<?php $input_value = isset($category)?$category:Yii::t('site','texiaoyao')?>
	<input id="channel_q" type="text" name="category_id" value="<?php echo $input_value?>" placeholder="输入病症/药名" class="TXT" data-provide="typeahead" data-source='<?php echo $typeahead;?>'>
	<button type="submit" class="BTN"><?php echo Yii::t('site','search') ?></button>
</form>
</li>
</ul>
</div>
<div id='ajax_load'>

<div class='handle animated' data-toggle="modal" data-target="#myModal">
    <?php echo Yii::t('site','add_new_yao') ?> <sup><?php echo Yii::t('site','new') ?></sup>
</div>

<!-- Modal -->
<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" style="width:60%">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php if(Yii::app()->user->isGuest):?>
    	 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  			<h4 class="modal-title" id="myModalLabel">请先登录</h4>
      </div>
      <div class="modal-body">
 		<span id="jumpTo">5</span>秒后自动跳转到登陆页面
		<script type="text/javascript">
		$('#myModal').on('shown.bs.modal', function (e) {
		 countDown(5,'<?php echo Yii::app()->createUrl("login")?>');
		})
		</script>  
      </div>
    <?php else: ?>
    	
    	 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <ul class="nav nav-tabs" id="myTab">
		  <li class="active"><a href="#create_shop" data-toggle="tab">发布产品</a></li>
		  <li><a href="#create_post" data-toggle="tab">发布资讯</a></li>
		</ul>
      </div>
      <div class="modal-body">
      	

	
	
	<div class="tab-content">
	  <div class="tab-pane active" id="create_shop">
	
     <?php $this->renderPartial('/public/createShop', array(
	'categoryList'=>$categoryList,)); ?>
   
	 	
      </div>
         
	  	
	  <div class="tab-pane" id="create_post">
	  	
	  	<?php $this->renderPartial('/public/createPost'); ?>

	  </div>
	</div>




      </div>
	<?php endif; ?>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
  // $(function () {
    // $('#myTab a:last').tab('show')
  // })
    $(document).ready(function(){
     	$('#myTab a:last').tab('show');
     	// $(document).on("click","#search_form",function(){
     		// alert_d('222222222');
     	// });
    }); // end document.ready
</script>
</div> <!-- end ajax load -->
	</div><!-- header -->