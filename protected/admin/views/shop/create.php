<?php
$this->breadcrumbs=array(
    Yii::t('blog','创建产品'),
);
?>
<h1><?php echo CHtml::encode(Yii::t('blog','创建产品')) ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
