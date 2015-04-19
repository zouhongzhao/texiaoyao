<?php
$this->breadcrumbs=array(
    Yii::t('blog','Update'),
);
$this->menu = array(
    array('label'=>Yii::t('blog','View this Post'),'icon'=>'search', 'url'=>array('view','id'=>$model->id)),
    array('label'=>Yii::t('blog','Posts Index'),'icon'=>'th-large', 'url'=>array('index')),
    array('label'=>Yii::t('blog','Manage Posts'),'icon'=>'th-list', 'url'=>array('admin')),
);
?>

<h1><?php printf(CHtml::encode(Yii::t('blog','Update %s')), '<i>'.CHtml::encode($model->name).'</i>'); ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>