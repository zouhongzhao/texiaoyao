<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'comment-form',
	'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class'=>'well'),
)); ?>

        <p class="note"><?php printf(CHtml::encode(Yii::t('site', 'Fields with %s are required.')), '<span class="required">*</span>'); ?></p>

	<?php echo $form->textFieldRow($model,'author',array('size'=>60,'maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'email',array('size'=>60,'maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'url',array('size'=>60,'maxlength'=>128)); ?>

	<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50)); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'ok','label'=>$model->isNewRecord ? Yii::t('site','Submit') : Yii::t('site','Save'))); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'icon'=>'repeat','label'=>Yii::t('site','Reset'))); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
