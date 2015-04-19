<?php if(count($comments)==0) : ?>
    <li><?php echo CHtml::encode(Yii::t('blog','No comments yet.')); ?></li>
<?php else : ?>
    <?php foreach($comments as $comment): ?>
    <li><?php echo $comment->authorLink; ?>&nbsp;on&nbsp;<?php echo CHtml::link(CHtml::encode($comment->post->title), $comment->getUrl()); ?></li>
    <?php endforeach; ?>
<?php endif; ?>

