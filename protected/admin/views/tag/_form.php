
<div class="form">
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'tag-form',
    'htmlOptions'=>array('class'=>'well'),
)); ?>
 
<?php echo $form->textFieldRow($model, 'name', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'frequency', array('class'=>'span3')); ?>
<div class="form-actions">
 <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'ok', 'label'=>$model->isNewRecord ? Yii::t('blog','Create') : Yii::t('blog','Save'))); ?>
</div>
<?php $this->endWidget(); ?>
</div>