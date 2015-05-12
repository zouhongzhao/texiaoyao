<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'post-form',
    'type'=>'horizontal',
    'focus'=>array($model,$model->isNewRecord ? 'title' : 'intro'),
)); ?>

    <p class="note"><?php printf(CHtml::encode(Yii::t('site', 'Fields with %s are required.')), '<span class="required">*</span>'); ?></p>

    <?php echo CHtml::errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>128)); ?>

    <div class="control-group">
        <?php echo CHtml::activeLabelEx($model,'intro',array('class'=>'control-label')); ?>
        <div class="controls">
            <?php $this->widget('application.extensions.ddeditor-bs.DDEditor',array(
                'model'=>$model,
                'attribute'=>'intro',
                'previewRequest'=>'/post/preview',
                'htmlOptions'=>array('rows'=>7,'cssClass'=>'span6','style'=>'font-family:Courier', 'title'=>Yii::t('blog','Enter the intro text (you may use Mardown syntax)') ),
                'additionalSnippets'=>array(
                    Yii::t('onlinehelp','Icons')=>array(
                        '<i class="icon-star"></i>' => Yii::t('onlinehelp','Create New Item'),
                        '<i class="icon-eye-open"></i>' => Yii::t('onlinehelp','View Item'),
                        '<i class="icon-pencil"></i>' => Yii::t('onlinehelp','Update Item'),
                        '<i class="icon-remove"></i>' => Yii::t('onlinehelp','Remove Item'),
                        '<i class="icon-th-list"></i>' => Yii::t('onlinehelp','Manage Items'),
                        '<i class="icon-th-large"></i>' => Yii::t('onlinehelp','List Items'),
                    ),
                    //Yii::t('onlinehelp','App. Pages') => $pages,
                ),
            )); ?>
            <?php echo CHtml::error($model,'content'); ?>    
        </div>
    </div>
               
    <div class="control-group">
        <?php echo CHtml::activeLabelEx($model,'content',array('class'=>'control-label')); ?>
        <div class="controls">
            <?php $this->widget('application.extensions.ddeditor-bs.DDEditor',array(
                'model'=>$model,
                'attribute'=>'content',
                'previewRequest'=>'/post/preview',
                'htmlOptions'=>array('rows'=>7,'cssClass'=>'span6','style'=>'font-family:Courier', 'title'=>Yii::t('blog','Enter the content text (you may use Mardown syntax)') ),
                'additionalSnippets'=>array(
                    Yii::t('onlinehelp','Icons')=>array(
                        '<i class="icon-star"></i>' => Yii::t('onlinehelp','Create New Item'),
                        '<i class="icon-eye-open"></i>' => Yii::t('onlinehelp','View Item'),
                        '<i class="icon-pencil"></i>' => Yii::t('onlinehelp','Update Item'),
                        '<i class="icon-remove"></i>' => Yii::t('onlinehelp','Remove Item'),
                        '<i class="icon-th-list"></i>' => Yii::t('onlinehelp','Manage Items'),
                        '<i class="icon-th-large"></i>' => Yii::t('onlinehelp','List Items'),
                    ),
                    //Yii::t('onlinehelp','App. Pages') => $pages,
                ),
            )); ?>
            <?php echo CHtml::error($model,'content'); ?>    
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model,'tags',array('class'=>'control-label required')); ?>
        <div class="controls">
        <?php $this->widget('CAutoComplete', array(
            'model'=>$model,
            'attribute'=>'tags',
            'url'=>array('suggestTags'),
            'multiple'=>true,
            'htmlOptions'=>array('class'=>'span5'),
        )); ?>
        <p class="hint">Please separate different tags with commas.</p>
        <?php echo $form->error($model,'tags'); ?>
        </div>
    </div>

    <?php echo $form->dropDownListRow($model,'status',Lookup::items('PostStatus')); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'ok', 'label'=>$model->isNewRecord ? Yii::t('blog','Create') : Yii::t('blog','Save'))); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'icon'=>'repeat', 'label'=>Yii::t('site','Reset'))); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
