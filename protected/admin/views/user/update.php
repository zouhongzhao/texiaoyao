<?php
$this->breadcrumbs=array(
	(Yii::t("site",'Users'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(Yii::t("site",'Update')),
);
?>

<h1><?php echo  Yii::t("site",'Update User')." ".$model->id; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(Yii::t("site",'Create User'),array('create')),
			CHtml::link(Yii::t("site",'View User'),array('view','id'=>$model->id)),
		),
	)); 

	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile)); ?>