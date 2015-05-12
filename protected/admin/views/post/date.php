<h1>Posts Issued on <i><?php echo CHtml::encode(date('F j, Y',$theDay)); ?></i></h1>

<?php foreach($posts as $post): ?>
<?php $this->renderPartial('_view',array(
	'data'=>$post,
)); ?>
<?php endforeach; ?>

<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>