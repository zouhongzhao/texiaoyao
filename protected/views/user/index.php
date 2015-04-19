<?php
$this->breadcrumbs=array(
	Yii::t('site',"Users"),
);
?>

<h1><?php echo Yii::t('site',"List User"); ?></h1>
<?php if(Functions::isAdmin()) {
	?><ul class="actions">
	<li><?php echo CHtml::link(Yii::t('site','Manage User'),array('/user/admin')); ?></li>
	<li><?php echo CHtml::link(Yii::t('site','Manage Profile Field'),array('profileField/admin')); ?></li>
</ul><!-- actions --><?php 
} ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
		),
		array(
			'name' => 'createtime',
			'value' => 'date("d.m.Y H:i:s",$data->createtime)',
		),
		array(
			'name' => 'lastvisit',
			'value' => '(($data->lastvisit)?date("d.m.Y H:i:s",$data->lastvisit):Yii::t("site","Not visited"))',
		),
	),
)); ?>
