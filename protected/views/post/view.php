<?php
$this->breadcrumbs=array(
	$model->title,
);
$this->menu = array(
    array('label'=>Yii::t('blog','Update Post'),'icon'=>'pencil', 'url'=>array('update','id'=>$model->id)),
    array('label'=>Yii::t('blog','Posts Index'),'icon'=>'th-large', 'url'=>array('index')),
    array('label'=>Yii::t('blog','Manage Posts'),'icon'=>'th-list', 'url'=>array('admin')),
);
$this->metaKeywords = $model->tags;
//$this->metaDescription = 'This is a sample page description';
//$this->addMetaProperty('fb:app_id',Yii::app()->params['fbAppId']);
$this->canonical = $model->url; // canonical URLs should always be absolute

?>

<?php $this->renderPartial('_view', array(
	'data'=>$model,
	'user'=>array_merge($model->author()->attributes,$model->author()->profile()->attributes)
)); ?>

<div id="comments">
	<?php if($model->commentCount>=1): ?>
		<h3>
			<?php echo $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'; ?>
		</h3>

		<?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>

    <h3><?php echo CHtml::encode(Yii::t('blog', 'Leave a Comment')); ?></h3>

	<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/comment/_form',array(
			'model'=>$comment,
			'user'=>$model->author()->attributes,
		)); ?>
	<?php endif; ?>

</div><!-- comments -->

<script>
  // $(function () {
    // $('#myTab a:last').tab('show')
  // })
    $(document).ready(function(){
		$.ajax({
           url:"/index.php/post/insertViews",
	       type:"post",
	       dateType:"json",
	       data: {
                id:'<?php echo $model->id?>'
            },
           success: function(data){
            	console.log(data);
           }
        }); 
	    
    }); // end document.ready
</script>
