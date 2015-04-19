<!doctype html>
<html>
<head>
    <?php Yii::app()->controller->widget('ext.seo.widgets.SeoHead', array(
        'defaultDescription'=>Yii::app()->params['appDescription'],
        'httpEquivs'=>array('Content-Type'=>'text/html; charset=utf-8', 'Content-Language'=>'en-US'),
        'title'=>array('class'=>'ext.seo.widgets.SeoTitle', 'separator'=>' :: '),
    )); ?>
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico">
	<?php Yii::app()->bootstrap->registerAllCss(); ?>
	<?php Yii::app()->bootstrap->registerCoreScripts(); ?>
    <!--[if lt IE 9]>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body id="top">

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    //'type'=>'inverse',
    'brand'=>CHtml::encode(Yii::app()->name),
    'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>Yii::t('site','Home'), 'url'=>Yii::app()->createUrl('/post/index'),
                        'active'=>Yii::app()->controller->id === 'post' && Yii::app()->controller->action->id === 'index'),
                array('label'=>Yii::t('site','About'), 'url'=>array('site/page','view'=>'about')),
                array('label'=>Yii::t('site','Contact'), 'url'=>array('site/contact')),
            ),
            'htmlOptions'=>array('class'=>'pull-left'),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>Yii::t('site','Login'), 'url'=>Yii::app()->createUrl('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>Yii::t('site','Logout ({username})',array('{username}'=>Yii::app()->user->name)), 'url'=>Yii::app()->createUrl('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('site','Language'),'url'=>'#','items'=>array(
                    array('label'=>Yii::app()->locale->getLanguage('en'),'url'=>array('/site/selectLanguage','lc'=>'en')),
                    array('label'=>Yii::app()->locale->getLanguage('de'),'url'=>array('/site/selectLanguage','lc'=>'de')),
                )),
            ),
            'htmlOptions'=>array('class'=>'pull-right'),
        ),
    ),
)); ?>

<div class="container" style="padding-top: 60px;">

    <?php echo $content; ?>

    <hr />

    <footer>
        <p class="copy">
            <?php echo Yii::app()->params['copyrightInfo']; ?>
        </p>

    </footer>

</div>

<?php // Yii::app()->clientScript->registerScriptFile('http://s7.addthis.com/js/250/addthis_widget.js#pubid=REPLACE_ME', CClientScript::POS_END); ?>

</body>
</html>
