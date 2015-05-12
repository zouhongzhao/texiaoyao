<?php
$this->breadcrumbs=array(
    Yii::t('blog','更新分类'),
);
?>

<h1><?php printf(CHtml::encode(Yii::t('blog','Update %s')), '<i>'.CHtml::encode($model->name).'</i>'); ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>