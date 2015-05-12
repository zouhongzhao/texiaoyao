<?php
$this->pageTitle = Yii::app()->params['appTitle'];
$this->addMetaProperty('og:title', 'Blog Posts');
$this->addMetaProperty('og:type', 'website');
$this->addMetaProperty('og:url', $this->createUrl('index'));
//$this->addMetaProperty('og:image', Yii::app()->request->getBaseUrl(true).'/images/bootstrap-avatar_normal.png');
$this->addMetaProperty('og:site_name', Yii::app()->name);
//$this->addMetaProperty('og:locale',Yii::app()->fb->locale);
//$this->addMetaProperty('fb:app_id', Yii::app()->fb->appID);

$this->breadcrumbs=array(
    Yii::t('blog','Posts'),
);
$this->menu = array(
    array('label'=>Yii::t('blog','Create New Post'),'icon'=>'star', 'url'=>array('create')),
    array('label'=>Yii::t('blog','Manage Posts'),'icon'=>'th-list', 'url'=>array('admin')),
);
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>Yii::app()->name,
)); ?>
    <p>
        This is the Yii Blog Demo (see <a href="http://www.yiiframework.com/doc/blog/">Building a Blog System using Yii</a>).
    </p>
<?php $this->endWidget(); ?>

<?php if(!empty($_GET['tag'])): ?>
<h1><?php echo sprintf(CHtml::encode(Yii::t('blog','Posts Tagged with %s')),'<i>'.CHtml::encode($_GET['tag']).'</i>'); ?></h1>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{items}\n{pager}",
)); ?>
