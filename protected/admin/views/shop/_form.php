
<div class="form">
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'tag-form',
    'htmlOptions'=>array('class'=>'well'),
)); ?>
 
<?php echo $form->textFieldRow($model, 'name', array('class'=>'span3')); ?>
<?php echo $form->textAreaRow($model, 'description', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'price', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'url', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'store', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'creat_time', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'comment', array('class'=>'span3')); ?>
<?php echo $form->dropDownListRow($model, 'type', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'stock', array('class'=>'span3')); ?>
<?php echo $form->dropDownListRow($model, 'category_id', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'original_price', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'image', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'drugstore', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'remark', array('class'=>'span3')); ?>
<div class="form-actions">
 <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'ok', 'label'=>$model->isNewRecord ? Yii::t('blog','Create') : Yii::t('blog','Save'))); ?>
</div>
<?php $this->endWidget(); ?>
</div>