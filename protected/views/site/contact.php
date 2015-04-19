<?php
$this->pageTitle=Yii::app()->name . ' - '.Yii::t('site','contact');
$this->breadcrumbs=array(
    Yii::t('site','contact'),
);
?>
<div class="page-header">
<h1><?php echo CHtml::encode(Yii::t('site','contact')); ?></h1>
</div>
<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
<?php echo Yii::t('site','contact_tips');?>
</p>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
    'focus'=>array($model,'name'),
)); ?>
 

    <p class="note"><?php printf(CHtml::encode(Yii::t('site', 'Fields with %s are required.')), '<span class="required">*</span>'); ?></p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'name',array('class'=>'span5')); ?>

    <?php echo $form->textFieldRow($model,'email',array('class'=>'span5')); ?>

    <?php echo $form->textFieldRow($model,'subject',array('class'=>'span5','maxlength'=>128)); ?>

    <?php echo $form->textAreaRow($model,'body',array('rows'=>6, 'class'=>'span5')); ?>

    <?php if(extension_loaded('gd')): ?>
        <div>
        <?php $this->widget('CCaptcha'); ?>
        <?php echo $form->textFieldRow($model,'verifyCode',
            array(
                'hint'=>Yii::t('site','input_verifyCode')
        )); ?>
    <?php endif; ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'icon'=>'ok', 'type'=>'primary','label'=>Yii::t('site','submit'))); ?>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->

<?php endif; ?>
