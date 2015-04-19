<?php foreach($comments as $comment): ?>
<div class="comment" id="c<?php echo $comment->id; ?>">

	<?php echo CHtml::link("#{$comment->id}", $comment->getUrl($post), array(
		'class'=>'cid',
		'title'=>Yii::t('blog','Permalink to this comment'),
	)); ?>

	<div class="author">
		<?php printf( CHtml::encode(Yii::t('blog', '%s says:')), $comment->authorLink); ?>
	</div>

	<div class="time">
		<?php echo Yii::app()->dateFormatter->formatDateTime($comment->create_time, 'full','short'); ?>
	</div>

	<div class="content">
		<?php echo nl2br(CHtml::encode($comment->content)); ?>
	</div>

</div><!-- comment -->
<?php endforeach; ?>
