<?php $this->pageTitle=Yii::app()->name . ' - '.Yii::t("site","Restore");
$this->breadcrumbs=array(
	Yii::t("site","Login") => array('/user/login'),
	Yii::t("site","Restore"),
);
?>

<div class="page-header">
<h1><?php echo Yii::t("site","Restore"); ?></h1>
</div>
<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
	<div class="alert alert-success alert-dismissable">
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
	</div>
<?php else: ?>

<div class="form">
	<?php /** @var BootActiveForm $form */
$widget = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>
 
<?php echo $widget->textFieldRow($form, 'login_or_email', array('class'=>'span3','hint'=>Yii::t("site","Please enter your login or email address."))); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t("site","Restore"))); ?>
 
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>