<?php
$this->breadcrumbs=array(
    Yii::t('blog','Posts')=>array('index'),
    Yii::t('blog','Manage'),
);
$this->menu = array(
    array('label'=>Yii::t('blog','Create New Post'),'icon'=>'star', 'url'=>array('create')),
    array('label'=>Yii::t('blog','Posts Index'),'icon'=>'th-large', 'url'=>array('index')),
);
?>
<h1><?php echo CHtml::encode(Yii::t('blog','Manage Tags')) ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}{update}',
        ),
        array(
            'name'=>'name',
            'type'=>'raw',
            'value'=>'CHtml::encode($data->name)'
        ),
        array(
            'name'=>'frequency',
            'value'=>'CHtml::encode($data->frequency)'
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
        ),
    ),
)); ?>
