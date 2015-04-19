<?php
$this->breadcrumbs=array(
    $model->title=>$model->url,
    Yii::t('blog','Update'),
);
$this->menu = array(
    array('label'=>Yii::t('blog','View this Post'),'icon'=>'search', 'url'=>array('view','id'=>$model->id)),
    array('label'=>Yii::t('blog','Posts Index'),'icon'=>'th-large', 'url'=>array('index')),
    array('label'=>Yii::t('blog','Manage Posts'),'icon'=>'th-list', 'url'=>array('admin')),
);
?>
<div class="page-header">
<h1><?php printf(CHtml::encode(Yii::t('blog','Update %s')), '<i>'.CHtml::encode($model->title).'</i>'); ?></h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
