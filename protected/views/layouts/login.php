<?php $this->beginContent('/layouts/main'); ?>
<div class="row">
	 
    <div class="span8">
           <?php echo $content; ?>
    </div>
    </div>
	    <div class="span4">
        <div id="sidebar">
        	<div class="jumbotron">
  <h3>登录后，您即可享受以下会员服务： </h3>
  <p>发布医药信息，让生意自动找上门<br>
发布公司介绍，提升企业知名度<br>
交商友、看商情，时刻掌握行业最新资讯</p>
  <p><a class="btn btn-primary btn-lg" href="<?php echo Yii::app()->createUrl("registration")?>" role="button">免费注册</a></p>
</div>
           
        </div><!-- sidebar -->
    </div>
    
   

</div>
<?php $this->endContent(); ?>
