<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
    Yii::t('site','About'),
);
$parser = new CMarkdownParser;
$readme = file_get_contents(Yii::app()->basePath.'/../README.md');
?>

<h2><?php echo CHtml::encode(Yii::t('site', 'About {appName}', array('{appName}'=>Yii::app()->name))); ?></h2>

<code><?php echo realpath(Yii::app()->basePath.'/../README.md'); ?></code>

<?php echo $parser->safeTransform($readme); ?>
