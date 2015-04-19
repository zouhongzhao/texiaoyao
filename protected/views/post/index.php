<?php
$this->pageTitle = '中国特效药供求网_医药供求平台_最新的医药供求信息' .  '_' .Yii::app()->params['appTitle'];
$this->addMetaProperty('og:title', '医药供求,药品供求,药品供应');
$this->addMetaProperty('og:type', 'website');
$this->addMetaProperty('og:url', $this->createUrl('index'));
//$this->addMetaProperty('og:image', Yii::app()->request->getBaseUrl(true).'/images/bootstrap-avatar_normal.png');
$this->addMetaProperty('og:site_name', Yii::app()->name);
//$this->addMetaProperty('og:locale',Yii::app()->fb->locale);
//$this->addMetaProperty('fb:app_id', Yii::app()->fb->appID);

$this->breadcrumbs=array(
    Yii::t('blog','Posts'),
);
$this->menu = array(
    array('label'=>Yii::t('blog','Create New Post'),'icon'=>'star', 'url'=>array('create')),
    array('label'=>Yii::t('blog','Manage Posts'),'icon'=>'th-list', 'url'=>array('admin')),
);
?>
<!--
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>Yii::app()->name,
)); ?>
    <p>
       <?php echo Yii::app()->params['appDescription'];?>
    </p>
<?php $this->endWidget(); ?>
-->
<?php if(!empty($_GET['tag'])): ?>
	<div class="page-header">
<h2><?php echo sprintf(CHtml::encode(Yii::t('blog','Posts Tagged with %s')),'<i>'.Yii::app()->request->getParam('tag').'</i>'); ?></h2>
</div>
<?php endif; ?>
<?php if(!empty($_POST['SiteSearchForm'])): ?>
<h1>帖子搜索 <i><?php echo CHtml::encode($_POST['SiteSearchForm']['string']); ?></i></h1>
<?php endif; ?>

<!-- <div class="row">
<div class="col-lg-12">
	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" rel="home" href="&lt;?= base_url();?&gt;" title="Buy Sell Rent Everyting">Classified</a>
	</div>
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<div class="col-sm-6 col-md-6">
			<form class="navbar-form" role="search" method="get" id="search-form" name="search-form">
				<div class="btn-group pull-left" style="margin-right:10px;">
						<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">Mumbai&nbsp;<span class="caret"></span></a>
							<div class="dropdown-menu multi">
							<div class="container">
								<div class="row">
									<div class="col-lg-4">
									<ul class="dropdown-menu"><li><a href="#"><strong>Mumbai</strong></a></li></ul>
									</div>
								</div>
							</div>
							</div>		
					</div>
				<div class="input-group">
				    <input type="text" class="form-control" placeholder="2 BHK Flat, Pune Real Estate, Pest Control..." id="query" name="query" value="">
					    <div class="input-group-btn">
				    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
				    </div>
				</div>
			</form>
		</div>
		<div class="col-sm-2 col-md-2">
			<form class="navbar-form navbar-right" role="search">
				<div class="input-group"><a href="#" class="btn btn-warning">Post Your Ads</a></div>
			</form>
		</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a data-toggle="modal" href="#" data-target="#">Login</a></li>
				<li><a data-toggle="modal" href="#" data-target="#">Register</a></li>
			</ul>
	    </div>
	</div>				
</div>
</div> -->
<div class="search-left">
	<form class="well form-search" id="verticalForm" action="/post/index/" method="post">
		<div class="input-prepend">
		<span class="add-on"><i class="icon-search"></i></span>
	<input class="span2" placeholder="输入关键字" name="SiteSearchForm[string]" id="SiteSearchForm_string" type="text">
	</div>
	<button class="btn" type="submit" name="yt0">找找看</button>
	   <input type="hidden" value="<?php echo Yii::app()->getRequest()->getCsrfToken(); ?>" name="YII_CSRF_TOKEN" />
    </form>
	
	
	<!-- <form class="well form-search" id="searchForm" action="/post/search/" method="post">
	<div class="input-prepend">
		<span class="add-on"><i class="icon-search"></i></span>
		<input class="input-medium" placeholder="输入关键字" name="TestForm[textField]" id="TestForm_textField" type="text">
	</div>
	<button class="btn" type="submit" name="yt3">找找看</button>
	</form> -->

</div>
<div class="search-right">
			<a href="<?php echo Yii::app()->createUrl("login")?>" class="idxbtn1"><img src="/systemImages/idxbtn1.jpg" width="145" height="54" alt="开通会员"></a>
			<a href="<?php echo Yii::app()->createUrl("login")?>" class="idxbtn2"><img src="/systemImages/idxbtn2.jpg" width="145" height="54" alt="登录"></a>
			<a href="<?php echo Yii::app()->createUrl("post/create")?>" class="idxbtn3"><img src="/systemImages/idxbtn3.jpg" width="145" height="54" alt="发布信息"></a>
			<a href="<?php echo Yii::app()->createUrl("registration")?>" class="idxbtn4"><img src="/systemImages/idxbtn4.jpg" width="145" height="54" alt="注册"></a>
</div>
<div id="tabbable_gongqiu" class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs head">
    <li class="active"><a href="#tab1" data-toggle="tab">全部供应</a></li>
    <li><a href="#tab2" data-toggle="tab">全部求购</a></li>
     <li><a href="#tab3" data-toggle="tab">发布信息</a></li>
    <li><a href="#tab4" data-toggle="tab">帮助中心</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
     	<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider0,
    'itemView'=>'_list',
    'id'=>'ajaxListView0',
    'pager'=>array(     		 //通过pager设置样式   默认为CLinkPager
	           'header' => '<div class="pagination pagination-centered">',
                    'footer' => '</div>',
                    'nextPageLabel'=>'下一页',
                    'prevPageLabel'=>'上一页',
                    'lastPageLabel'=>'末页',
                    'selectedPageCssClass' => 'active',
                    'hiddenPageCssClass' => 'disabled',
                    'htmlOptions' => array(
                        'class' => '',
                    ), //http://www.chriswpage.com/2013/05/style-yii-pagination-with-bootstrap/#sthash.LZ0TRtXL.dpuf
	        		  ),
    'template'=>"{items}\n{pager}",
)); ?>
    </div>
    <div class="tab-pane" id="tab2">
     	<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider1,
    'itemView'=>'_list',
    'id'=>'ajaxListView1',
    'pager'=>array(     		 //通过pager设置样式   默认为CLinkPager
	           'header' => '<div class="pagination pagination-centered">',
                    'footer' => '</div>',
                    'nextPageLabel'=>'下一页',
                    'prevPageLabel'=>'上一页',
                    'lastPageLabel'=>'末页',
                    'selectedPageCssClass' => 'active',
                    'hiddenPageCssClass' => 'disabled',
                    'htmlOptions' => array(
                        'class' => '',
                    ), //http://www.chriswpage.com/2013/05/style-yii-pagination-with-bootstrap/#sthash.LZ0TRtXL.dpuf
	        		  ),
    'template'=>"{items}\n{pager}",
)); ?>
    </div>
     <div class="tab-pane" id="tab3">
      <p>
      	<?php 
      	echo Yii::app()->user->isGuest?$this->renderPartial('/public/login'):$this->renderPartial('/public/createPost'); ?>
      </p>
    </div>
     <div class="tab-pane" id="tab4">
      <p></p>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function () {
	$(window).scroll(function() {
		var scroller = $('#tabbable_gongqiu');
		if(document.documentElement.scrollTop + document.body.scrollTop > 800){
			$("#tabbable_gongqiu").addClass("tabs-below wrap-fixed");
		}else{
			$("#tabbable_gongqiu").removeClass("tabs-below wrap-fixed");
		}
	})
	//$("#showScoreMessage").html("您的信息输入错误，请重试!").show(300).delay(3000).hide(300);
})
</script> 
