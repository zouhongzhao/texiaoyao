<div class="ddeditor">
<?php $this->widget('bootstrap.widgets.TbMenu',array(
    'type'=>'pills',
    'stacked'=>false,
    'items'=>array(
        array('label'=>Yii::t('ddeditor','B'),'url'=>'javascript:void(0)','linkOptions'=>array('id'=>$editorId.'-editor-bold')),
        array('label'=>Yii::t('ddeditor','I'),'url'=>'javascript:void(0)','linkOptions'=>array('id'=>$editorId.'-editor-italic')),
        array('label'=>Yii::t('ddeditor','Headings'), 'items'=>array(
            array('label'=>'H1', 'url'=>'#','linkOptions'=>array('class'=>$editorId.'-editor-h')),
            array('label'=>'H2', 'url'=>'#','linkOptions'=>array('class'=>$editorId.'-editor-h')),
            array('label'=>'H3', 'url'=>'#','linkOptions'=>array('class'=>$editorId.'-editor-h')),
            array('label'=>'H4', 'url'=>'#','linkOptions'=>array('class'=>$editorId.'-editor-h')),
        )),
        array('label'=>Yii::t('ddeditor','URL'),'url'=>'javascript:void(0)','linkOptions'=>array('id'=>$editorId.'-editor-link')),
        array('label'=>Yii::t('ddeditor','IMG'),'url'=>'javascript:void(0)','linkOptions'=>array('id'=>$editorId.'-editor-img')),
        array('label'=>Yii::t('ddeditor','List'),'encodeLabel'=>false,'url'=>'javascript:void(0)','linkOptions'=>array('id'=>$editorId.'-editor-li')),
        array('label'=>Yii::t('ddeditor','HR'),'url'=>'javascript:void(0)','linkOptions'=>array('id'=>$editorId.'-editor-hr')),
        array('label'=>Yii::t('ddeditor','Code'),'url'=>'javascript:void(0)','linkOptions'=>array('id'=>$editorId.'-editor-code')),
        array('label'=>Yii::t('ddeditor','Code2'), 'items'=>array(
            // ABAP, CPP, CSS, DIFF, DTD, HTML, JAVA, JAVASCRIPT, MYSQL, PERL, PHP, PYTHON, RUBY, SQL, XML
            array('label'=>'HTML', 'url'=>'#','linkOptions'=>array('class'=>$editorId.'-editor-code2')),
            array('label'=>'PHP', 'url'=>'#','linkOptions'=>array('class'=>$editorId.'-editor-code2')),
        )),
        array('label'=>Yii::t('ddeditor','Preview'),'url'=>'javascript:void(0)','linkOptions'=>array('id'=>$editorId.'-editor-preview'),'visible'=>!$hidePreviewButton),
    ),
)); ?>
<?php
if(sizeof($additionalSnippets)>0) {
    $snippetsDropdowns = array();
    $n=0;
    foreach($additionalSnippets as $name=>$additionalSnippet) {
        $snippetDropdowns = array(
            'label'=>$name, 'url'=>'javascript:void(0)', 'items'=>array()
        );
        //array(),'linkOptions'=>array('id'=>$editorId.'-editor-addS-'.$n, 'class'=>'snippets'));
        foreach($additionalSnippet as $value=>$text) {
            $snippetDropdowns['items'][] = array('label'=>$text,'url'=>'#','linkOptions'=>array('data-value'=>$value,'class'=>$editorId."-editor-addS-".$n));
        }
        $snippetsDropdowns[] = $snippetDropdowns;
        $n++;
    }
    $this->widget('bootstrap.widgets.TbMenu',array(
        'type'=>'pills',
        'stacked'=>false,
        'items'=>$snippetsDropdowns
    ));
}
?>

<?php if(isset($model) and isset($attribute)) : ?>
<?php echo CHtml::activeTextArea($model,$attribute,$htmlOptions); ?>
<?php else : ?>
<?php echo CHtml::textArea($name,$value,$htmlOptions); ?>
<?php endif; ?>
<div id="<?php echo $editorId; ?>-preview" class="preview"><?php echo Yii::t('ddeditor','Loading Preview...'); ?></div>
</div>
