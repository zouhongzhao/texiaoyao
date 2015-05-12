<div class="well" style="max-width: 340px; padding: 8px 0;">
    <ul class="nav nav-list portlet">
        <li class="nav-header"><?php echo CHtml::encode(Yii::t('blog',$this->title)); ?></li>
    </ul>
    <?php $url = $this->getController()->createUrl('post/search'); ?>
    <?php $form = $this->controller->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'verticalForm',
        'action'=>$url,
        'type'=>'search',
        'htmlOptions'=>array('class'=>'well'),
    )); ?>
    <?php echo $form->textFieldRow($model,'string', array('class'=>'span2')) ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('blog','Go'))); ?>
    <?php $this->getController()->endWidget(); ?>
</div>
