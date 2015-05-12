<?php
$this->breadcrumbs=array(
    Yii::t('blog','Posts')=>array('index'),
    Yii::t('blog','Create Post'),
);
$this->menu = array(
    array('label'=>Yii::t('blog','Posts Index'),'icon'=>'th-large', 'url'=>array('index')),
    array('label'=>Yii::t('blog','Manage Posts'),'icon'=>'th-list', 'url'=>array('admin')),
);
?>
<div class="page-header">
<h1><?php echo CHtml::encode(Yii::t('blog','Create Post')) ?></h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
