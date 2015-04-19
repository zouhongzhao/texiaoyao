<?php $this->pageTitle=Yii::app()->name . ' - '.Yii::t('site',"Registration");
$this->breadcrumbs=array(
	Yii::t('site',"Registration"),
);
?>
<div class="page-header">
<h1><?php echo Yii::t('site',"Registration"); ?></h1>
</div>
<div class="alert alert-info">
<p>注：严肃的商业信息有助于您获得别人的信任，结交潜在的商业伙伴，获取更多商业机会！</p>
</div>
<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="alert alert-success alert-dismissable">
	 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class'=>'well'),
    'focus'=>array($model,'username'),
)); ?>

    <p class="note"><?php printf(CHtml::encode(Yii::t('site','Fields with %s are required.')),'<span class="required">*</span>'); ?></p>

	<?php echo $form->textFieldRow($model,'username'); ?>
	<?php echo $form->passwordFieldRow($model,'password'); ?>
	<?php echo $form->passwordFieldRow($model,'verifyPassword'); ?>
	<?php echo $form->textFieldRow($model,'email'); ?>
	
	
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
		
		<?php 
		if ($field->widgetEdit($profile)) {
			//echo '<div class="control-group ">'.$form->labelEx($profile,$field->varname).'<div class="controls">'.$field->widgetEdit($profile).'</div></div>';
			
		} elseif ($field->range) {
			echo $form->dropDownListRow($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo $form->textAreaRow($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			if($field->varname == 'telephone'){
				echo $form->textFieldRow($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'hint'=>'填写真实的联系电话，客户才能找到您'));
			}elseif($field->varname == 'companyName'){
				echo $form->textFieldRow($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'hint'=>'个人用户可以不填'));
			}elseif($field->varname == 'area'){
				echo '<div class="control-group ">
					<label for="Profile_lastname" class="control-label required">所在地区 <span class="required">*</span></label>
					<div class="controls">
						<div id="city_4">
					  		<select class="prov" name="Area[prov]"></select> 
					    	<select class="city" disabled="disabled" name="Area[city]"></select>
					        <select class="dist" disabled="disabled" name="Area[dist]"></select>
						</div>
						</div>
					</div>';
			}else{
				echo $form->textFieldRow($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
			}
			
		}
		 ?>
			<?php
			}
		}
?>

<?php if (Functions::doCaptcha('registration')): ?>
		<div class="control-group ">
			<div class="controls">
			<?php $this->widget('CCaptcha'); ?>
			</div>
		</div>
		<?php echo $form->textFieldRow($model,'verifyCode',array('hint'=>Yii::t('site',"Please enter the letters as they are shown in the image above.").
					'<br/>'.Yii::t('site',"Letters are not case-sensitive."))); ?>
	<?php endif; ?>


    
<div class="control-group">
		<div class="controls">
		<p class="hint">
		<?php echo CHtml::link(Yii::t('site',"已有账号?"),Yii::app()->createUrl('/login')); ?>
		</p>
		</div>
	</div>
 <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>Yii::t('site','Register'))); ?>
 </div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>

<script type="text/javascript">
$(function(){
	$.ajax({
            url: '/registration/getCity/',
            success: function(data){
            	if(data == 'fail'){
            		var prov = '湖北';
            		var city = '武汉';
            	}else{
            		data=eval("("+data+")");
            		var prov = data.region;
            		var city = data.city;
            	}
             	
             	$("#city_4").citySelect({
			    	prov:prov, 
			    	city:city,
					dist:"",
					nodata:"none"
			   }); 
            }
    }); 
	
	
	
	});
</script>