<h1><?php echo CHtml::encode(Yii::t('blog', '帖子发出于 {month}', array('{month}'=>date('F, Y', $firstDay)))); ?></h1>

<?php foreach($posts as $post): ?>
<?php $this->renderPartial('_view',array(
	'data'=>$post,
)); ?>
<?php endforeach; ?>

<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
