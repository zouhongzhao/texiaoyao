<?php
$this->breadcrumbs=array(
	Yii::t("site",'Users')=>array('admin'),
	Yii::t("site",'Create'),
);
?>
<h1><?php echo Yii::t("site","Create User"); ?></h1>

<?php 
	echo $this->renderPartial('_menu',array(
		'list'=> array(),
	));
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>