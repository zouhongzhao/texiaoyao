<?php
$this->breadcrumbs=array(
	Yii::t("site",'Profile Fields')=>array('admin'),
	Yii::t("site",'Create'),
);
?>
<h1><?php echo Yii::t("site",'Create Profile Field'); ?></h1>

<?php echo $this->renderPartial('_menu',array(
		'list'=> array(),
	)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>