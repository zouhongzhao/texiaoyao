<?php

$this->pageTitle = empty($_GET['tag'])?$search->string:$_GET['tag'];
$this->addMetaProperty('og:type', 'website');
$this->addMetaProperty('og:url', $this->createUrl('index'));
//$this->addMetaProperty('og:image', Yii::app()->request->getBaseUrl(true).'/images/bootstrap-avatar_normal.png');
$this->addMetaProperty('og:site_name', Yii::app()->name);
//$this->addMetaProperty('og:locale',Yii::app()->fb->locale);
//$this->addMetaProperty('fb:app_id', Yii::app()->fb->appID);

$this->breadcrumbs=array(
    Yii::t('blog','Search'),
);
?>
<div class="page-header">
<?php if(!empty($_GET['tag'])): ?>
<h1>帖子标记  <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>
<?php if(!empty($search->string)): ?>
<h1>帖子搜索 <i><?php echo CHtml::encode($search->string); ?></i></h1>
<?php endif; ?>
</div>
<?php foreach($posts as $post): ?>
<?php
	$pizza = explode('>', $post->content);
	$s = '';
	for ($i = 0; $i < count($pizza); $i++) {
		$piece = explode('<', $pizza[$i]);
		$replace = preg_replace('/('.$search->string.')/i', '<b><span style="background:yellow;">${1}</span></b>', $piece[0]);
		if (count($piece) == 2) {
			$s .= $replace.'<'.$piece[1].'>';
		} else if (count($piece) == 1) {
			$s .= $replace;
		}
	}
	$post->content = $s;

	$this->renderPartial('_view',array(
		'data'=>$post,
		'user'=>array_merge($post->author()->attributes,$post->author()->profile()->attributes)
	));
?>
<?php endforeach; ?>

<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>