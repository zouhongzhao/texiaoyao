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
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/styles.css'); ?>
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/blog.css'); ?>
    <!--[if lt IE 9]>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<div class="container">
	<div id="content" style="margin: 0 auto;max-width: 980px;">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
</html>