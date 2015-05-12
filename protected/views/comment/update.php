<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'更新评论 #'.$model->id,
);
?>

<h1>更新评论 #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>