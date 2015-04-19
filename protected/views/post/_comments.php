<?php foreach($comments as $comment): ?>
<div class="comment" id="c<?php echo $comment->id; ?>">

	<?php echo CHtml::link("#{$comment->id}", $comment->getUrl($post), array(
		'class'=>'cid',
		'title'=>Yii::t('blog','永久链接到这个评论'),
	)); ?>

	<div class="author">
		<?php printf( CHtml::encode(Yii::t('blog', '%s 说:')), $comment->authorLink); ?>
	</div>

	<div class="time">
		<?php echo Yii::app()->dateFormatter->formatDateTime($comment->create_time, 'full','short'); ?>
	</div>

	<div class="content">
		<?php
            $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
            echo $comment->content;
            $this->endWidget();
        ?>
	</div>

</div><!-- comment -->
<?php endforeach; ?>
