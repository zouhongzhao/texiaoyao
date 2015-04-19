<?php
$this->pageTitle=Yii::app()->name . ' - 在线留言';
$this->breadcrumbs=array(
	Yii::t('site','index'),
);
?>
<div class="page-header">
  <h2>欢迎您提宝贵的意见<small></small></h2>
</div>
        <div id="content">
            <?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'chat/_show',
    'id'=>'ajaxListView',
    'pager'=>array(     		 //通过pager设置样式   默认为CLinkPager
	           'header' => '<div class="pagination pagination-centered">',
                    'footer' => '</div>',
                    'nextPageLabel'=>'下一页',
                    'prevPageLabel'=>'上一页',
                    'lastPageLabel'=>'末页',
                    'selectedPageCssClass' => 'active',
                    'hiddenPageCssClass' => 'disabled',
                    'htmlOptions' => array(
                        'class' => '',
                    ), //http://www.chriswpage.com/2013/05/style-yii-pagination-with-bootstrap/#sthash.LZ0TRtXL.dpuf
	        		  ),
    'template'=>"{items}\n{pager}",
)); ?>
        </div>
        <hr>
        <div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
    'focus'=>array($model,'username'),
)); ?>
    <?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>128)); ?>
    <?php echo  $form->textAreaRow($model, 'content', array('class'=>'span8','rows'=>5));?>
	<br />
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','icon'=>'ok', 'type'=>'primary','label'=>Yii::t('site','submit'))); ?>

<?php $this->endWidget(); ?>
</div>