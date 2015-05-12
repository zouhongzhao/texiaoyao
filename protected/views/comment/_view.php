<?php
$deleteJS = <<<DEL
$('.container').on('click','.time a.delete',function() {
    var th=$(this),
        container=th.closest('div.comment'),
        id=container.attr('id').slice(1);
    if(confirm('Are you sure you want to delete comment #'+id+'?')) {
        $.ajax({
            url:th.attr('href'),
            type:'POST'
        }).done(function(){container.slideUp()});
    }
    return false;
});
DEL;
Yii::app()->getClientScript()->registerScript('delete', $deleteJS);
?>
<div class="comment" id="c<?php echo $data->id; ?>">

    <?php echo CHtml::link("#{$data->id}", $data->url, array(
        'class'=>'cid',
        'title'=>'永久链接到这个评论',
    )); ?>

    <div class="author">
        <?php echo $data->authorLink; ?> says on
        <?php echo CHtml::link(CHtml::encode($data->post->title), $data->post->url); ?>
    </div>

    <div class="time">
        <?php if($data->status==Comment::STATUS_PENDING): ?>
        <span class="pending"><?php echo CHtml::encode(Yii::t('blog','Pending approval')); ?></span>&nbsp;
            <?php echo CHtml::linkButton('<i class="icon-ok"></i>&nbsp;'.Yii::t('blog','Approve'), array(
                'submit'=>array('comment/approve','id'=>$data->id),
                'class'=>'btn btn-success btn-mini',

            )); ?>
        <?php endif; ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'label'=>Yii::t('blog','Update'),
            'buttonType'=>'link',
            'url'=>array('comment/update','id'=>$data->id),
            //'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size'=>'mini', // null, 'large', 'small' or 'mini'
            'icon'=>'pencil',
        )); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'label'=>Yii::t('blog','Delete'),
            'buttonType'=>'link',
            'url'=>array('comment/delete','id'=>$data->id),
            'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size'=>'mini', // null, 'large', 'small' or 'mini'
            'icon'=>'remove',
            'htmlOptions'=>array('class'=>'delete'),
        )); ?>
        <?php echo CHtml::encode(Yii::t('blog','written on {create_time}',array('{create_time}'=>Yii::app()->dateFormatter->formatDateTime($data->create_time, 'full','short')))); ?>
    </div>

    <div class="content">
        <?php echo nl2br(CHtml::encode($data->content)); ?>
    </div>

</div><!-- comment -->
