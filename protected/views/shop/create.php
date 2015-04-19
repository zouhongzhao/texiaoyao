<?php $this->pageTitle=Yii::app()->name . ' - '.Yii::t('site',"Create New Product");
$this->breadcrumbs=array(
	Yii::t('site',"Create New Product"),
);
?>
<div class="page-header">
<h2><?php echo Yii::t('site','Create New Product'); ?></h2>
</div>
<div class="row">
<div class="span3">
<?php echo $this->renderPartial('/profile/menu'); ?>
</div>
<div class="span7">
<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="alert alert-success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
 <?php $this->renderPartial('/public/createShop', array(
	'categoryList'=>$categoryList,)); ?>
</div>
