<?php foreach($posts as $post): ?>
<li>
<?php echo CHtml::link(CHtml::encode($post->title),$post->url); ?>
&nbsp;on&nbsp;
<?php echo CHtml::link(date('M j', $post->create_time), array('post/PostedOnDate', 'time'=>$post->create_time)); ?>
</li>
<?php endforeach; ?>
