<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'comment-form',
	'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class'=>'well'),
)); ?>

        <p class="note"><?php printf(CHtml::encode(Yii::t('site', 'Fields with %s are required.')), '<span class="required">*</span>'); ?></p>

	<?php 
	if(Yii::app()->user->isGuest){
		echo $form->textFieldRow($model,'author',array('size'=>60,'maxlength'=>128,'class'=>'span5')); 
	}else{
		echo '<input type="text" id="Comment_author" name="Comment[author]" value="'.$user['username'].'" class="span5 hide">';
	}
	 ?>

	<?php 
	if(Yii::app()->user->isGuest){
		echo $form->textFieldRow($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'span5')); 
	}else{
		echo '<input type="text" id="Comment_email" name="Comment[email]" value="'.$user['email'].'" class="span5 hide">';
	}
	?>

<label class="required" for="Comment_content">评论 <span class="required">*</span></label>
  <?php 
           $this->widget('application.extensions.wdueditor.WDueditor',
                array(
                	 'model'=>$model,
            		'attribute'=>'content',
            		'editorOptions'=>array('maximumWords'=>'500','wordCount'=>true),
                    'toolbars' =>array(
            'FullScreen','Undo', 'Redo','Bold','emotion','background','preview','forecolor',
            'backcolor','autotypeset','customstyle','fontfamily','fontsize','autoFloatEnabled'
        )
                    )
                ); 
          ?>
<span style="display: none" id="Comment_content_em_" class="help-block error">评论 不可为空白.</span>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'ok','label'=>$model->isNewRecord ? Yii::t('site','submit') : Yii::t('site','Save'))); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'icon'=>'repeat','label'=>Yii::t('site','Reset'))); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
