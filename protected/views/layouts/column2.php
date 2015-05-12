<?php $this->beginContent('/layouts/main'); ?>
<div class="row">
	    <div class="span3">
        <div id="sidebar">
            <?php $this->widget('GongQiuInfo', array(
						                'maxPosts'=>Yii::app()->params['recentPostCount'],
						            	)); 
              if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); 
           ?>
             	<!-- <?php if(!Yii::app()->user->isGuest) $this->widget('OperationsMenu'); ?> -->
             <?php
	            // if($this->beginCache('gongqiu-widget', array('duration'=>3600))){
	             	$this->widget('TuiJian');
	           		$this->widget('ChengXinMember');
					$this->widget('RenQiBang');
					$this->widget('TagCloud', array(
			                'maxTags'=>Yii::app()->params['tagCloudCount'],
				             ));
		            $this->widget('RecentComments', array(
	                	'maxComments'=>Yii::app()->params['recentCommentCount'],
	            		));
				// }
				// $this->endCache();
			 ?>
           
        </div><!-- sidebar -->
    </div>
    
    
    <div class="span9">
        <div id="content">
            <?php $this->widget('bootstrap.widgets.TbAlert', array(
                    'block'=>true, // display a larger alert block?
                    'fade'=>true, // use transitions?
                    'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
                    'alerts'=>array( // configurations per alert type
                        'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
                    ),
                )); ?>
            <?php echo $content; ?>
            <?php // echo '<pre>'; CVarDumper::dump($_SESSION); echo '</pre>'; ?>
        </div><!-- content -->
    </div>

</div>
<?php $this->endContent(); ?>
