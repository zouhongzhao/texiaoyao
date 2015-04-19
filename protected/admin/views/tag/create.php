<?php
$this->breadcrumbs=array(
    Yii::t('blog','Create Tag'),
);
$this->menu = array(
    array('label'=>Yii::t('blog','Posts Index'),'icon'=>'th-large', 'url'=>array('index')),
    array('label'=>Yii::t('blog','Manage Posts'),'icon'=>'th-list', 'url'=>array('admin')),
);
?>
<h1><?php echo CHtml::encode(Yii::t('blog','Create Tag')) ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
