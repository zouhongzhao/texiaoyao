<?php
$this->pageTitle=Yii::app()->name . ' - 登录';
$this->breadcrumbs=array(
	Yii::t('site','login'),
);
?>
<div class="page-header">
<h1><?php echo CHtml::encode(Yii::t('site','login')); ?></h1>
</div>
<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<p><?php echo CHtml::encode(Yii::t('site','Please fill out the following form with your login credentials:')); ?></p>

<div class="form">
	
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class'=>'well'),
    'focus'=>array($model,'username'),
)); ?>

    <p class="note"><?php printf(CHtml::encode(Yii::t('site','Fields with %s are required.')),'<span class="required">*</span>'); ?></p>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'input-medium', 'prepend'=>'<i class="icon-user"></i>')); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'input-medium', 'prepend'=>'<i class="icon-lock"></i>')); ?>

	<div class="control-group">
		<div class="controls">
		<p class="hint">
		<?php echo CHtml::link(Yii::t('site',"Register"),Yii::app()->createUrl('/registration')); ?> | 
		
		<?php echo CHtml::link(Yii::t('site',"Lost Password?"),Yii::app()->createUrl('/recovery/recovery')); ?>
		</p>
		</div>
	</div>
	
	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>Yii::t('site','login'))); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>Yii::t('site','Reset'))); ?>
    </div>

<?php $this->endWidget(); ?>