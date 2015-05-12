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
<h1><?php echo CHtml::encode(Yii::t('blog','Manage Posts')) ?></h1>

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
            'name'=>'title',
            'type'=>'raw',
            'value'=>'CHtml::link(CHtml::encode($data->title), $data->url)'
        ),
        array(
            'name'=>'status',
            'value'=>'Post::model()->statusOptions[$data->status]',
            'filter'=>Post::model()->statusOptions,
        ),
        array(
            'name'=>'create_time',
            'type'=>'datetime',
            'filter'=>false,
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
        ),
    ),
)); ?>
