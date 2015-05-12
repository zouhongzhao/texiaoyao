<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h1>Ooops!</h1>

<strong><?php echo CHtml::encode(Yii::t('site','Error #{errorCode}',array('{errorCode}'=>$code))); ?></strong><br /><br />

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
