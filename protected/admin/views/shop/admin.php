<?php
$this->breadcrumbs=array(
    Yii::t('blog','产品')=>array('index'),
    Yii::t('blog','管理'),
);

?>
<h1><?php echo CHtml::encode(Yii::t('blog','管理产品')) ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}',
        ),
        array(
            'name'=>'name',
            'type'=>'raw',
            'value'=>'CHtml::encode($data->name)'
        ),
        array(
            'name'=>'description',
            'value'=>'CHtml::encode($data->description)'
        ),
        array(
            'name'=>'price',
            'value'=>'CHtml::encode($data->price)'
        ),
        array(
            'name'=>'url',
            'value'=>'CHtml::encode($data->url)'
        ),
        array(
            'name'=>'store',
            'value'=>'CHtml::encode($data->store)'
        ),
        array(
            'name'=>'creat_time',
            'value'=>'CHtml::encode($data->creat_time)'
        ),
        array(
            'name'=>'comment',
            'value'=>'CHtml::encode($data->comment)'
        ),
        array(
            'name'=>'type',
            'value'=>'CHtml::encode($data->type)'
        ),
        array(
            'name'=>'stock',
            'value'=>'CHtml::encode($data->stock)'
        ),
        array(
            'name'=>'category_id',
            'value'=>'CHtml::encode($data->category_id)'
        ),
        array(
            'name'=>'original_price',
            'value'=>'CHtml::encode($data->original_price)'
        ),
        array(
            'name'=>'image',
            'value'=>'CHtml::encode($data->image)'
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
        ),
    ),
)); ?>