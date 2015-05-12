<?php
$this->breadcrumbs=array(
    Yii::t('blog','分类')=>array('index'),
    Yii::t('blog','管理'),
);

?>
<h1><?php echo CHtml::encode(Yii::t('blog','管理分类')) ?></h1>

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
            'name'=>'pname',
            'value'=>'CHtml::encode($data->pname)'
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
        ),
    ),
)); ?>
