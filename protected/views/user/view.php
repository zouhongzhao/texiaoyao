<?php
$this->breadcrumbs=array(
	Yii::t("site",'Users')=>array('index'),
	$model->username,
);
?>
<h1><?php echo Yii::t("site",'View User').' "'.$model->username.'"'; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link(Yii::t("site",'List User'),array('index')); ?></li>
</ul><!-- actions -->

<?php 

// For all users
	$attributes = array(
			'username',
	);
	
	$profileFields=ProfileField::model()->forAll()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => Yii::t("site",$field->title),
					'name' => $field->varname,
					'value' => $model->profile->getAttribute($field->varname),
				));
		}
	}
	array_push($attributes,
		array(
			'name' => 'createtime',
			'value' => date("d.m.Y H:i:s",$model->createtime),
		),
		array(
			'name' => 'lastvisit',
			'value' => (($model->lastvisit)?date("d.m.Y H:i:s",$model->lastvisit):Yii::t("site",'Not visited')),
		)
	);
			
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));

?>
