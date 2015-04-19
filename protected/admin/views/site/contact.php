<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
    Yii::t('site','Contact'),
);
?>

<h1><?php echo CHtml::encode(Yii::t('blog','Contact Us')); ?></h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
    'focus'=>array($model,'name'),
)); ?>
 

    <p class="note">Fields with <span class="required">*</span> are required.</p>

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
                'hint'=>Yii::t('blog','Please enter the letters as they are shown in the image above.').' '.
                    Yii::t('blog','Letters are not case-sensitive.')
        )); ?>
    <?php endif; ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'icon'=>'ok', 'type'=>'primary','label'=>Yii::t('site','Submit'))); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
