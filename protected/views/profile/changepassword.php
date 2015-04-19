<?php $this->pageTitle=Yii::app()->name . ' - '.Yii::t("site","Change Password");
$this->breadcrumbs=array(
	Yii::t("site","Profile") => array('/user/profile'),
	Yii::t("site","Change Password"),
);
?>
<div class="page-header">
<h2><?php echo Yii::t("site","Change password"); ?></h2>
</div>
<div class="row">
<div class="span3">
<?php echo $this->renderPartial('menu'); ?>
</div>
<div class="span7">
<div class="form">
	
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'changepassword-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class'=>'well'),
)); ?>

    <p class="note"><?php printf(CHtml::encode(Yii::t('site','Fields with %s are required.')),'<span class="required">*</span>'); ?></p>

	<?php echo CHtml::errorSummary($model); ?>
	

	<?php echo $form->passwordFieldRow($model,'password',array('hint'=>Yii::t('site','Minimal password length 4 symbols.'))); ?>

	<?php echo $form->passwordFieldRow($model,'verifyPassword'); ?>
	

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>Yii::t('site','Save'))); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>