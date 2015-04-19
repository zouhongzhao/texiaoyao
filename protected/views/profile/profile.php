<?php $this->pageTitle=Yii::app()->name . ' - '.Yii::t('site',"Profile");
$this->breadcrumbs=array(
	Yii::t('site',"Profile"),
);
?>
<div class="page-header">
<h2><?php echo Yii::t('site','Your profile'); ?></h2>
</div>
<div class="row">
<div class="span3">
<?php echo $this->renderPartial('menu'); ?>
</div>
<div class="span7">
<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="alert alert-success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>
</th>
    <td><?php echo CHtml::encode($model->username); ?>
</td>
</tr>
<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields && $profile) {
			foreach($profileFields as $field) {
				
				// echo "<pre>"; print_r($field); die();
			?>
<tr>
	<th class="label"><?php echo CHtml::encode(Yii::t('site',$field->title)); ?>
</th>
    <td>
    	<?php 
    	// echo $profile->getAttribute($field->title);
    	echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?>
</td>
</tr>
			<?php
			}//$profile->getAttribute($field->varname)
		}
?>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
</th>
    <td><?php echo CHtml::encode($model->email); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?>
</th>
    <td><?php echo date("d.m.Y H:i:s",$model->createtime); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit')); ?>
</th>
    <td><?php echo date("d.m.Y H:i:s",$model->lastvisit); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
</th>
    <td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status));
    ?>
</td>
</tr>
</table>
</div>
