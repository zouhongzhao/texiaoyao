<?php
$this->pageTitle=Yii::app()->name . ' - Login';
?>

<h1><?php echo CHtml::encode(Yii::t('site','登录')); ?></h1>
<!--
 <p><?php echo CHtml::encode(Yii::t('site','Please fill out the following form with your login credentials:')); ?></p>
-->
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class'=>'well'),
    'focus'=>array($model,'username'),
)); ?>

    <p class="note"><?php printf(CHtml::encode(Yii::t('site','带 %s 是必填项.')),'<span class="required">*</span>'); ?></p>

	<?php echo $form->textFieldRow($model,'username'); ?>

	<?php echo $form->passwordFieldRow($model,'password');?>
	<!--
	,array('hint'=>Yii::t('site','Hint: You may login with <tt>demo/demo</tt>'))); ?>
-->
	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>Yii::t('site','登陆'))); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>Yii::t('site','重置'))); ?>
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->
