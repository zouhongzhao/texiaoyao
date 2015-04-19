<div style="max-width: 340px; padding: 8px 0;">
<?php $pendingCommentCount = Comment::model()->pendingCommentCount; ?>
<?php $items = array(
        array('label'=>Yii::t('blog','Create New Post'), 'icon'=>'star', 'url'=>array('post/create'), 'visible'=>!Yii::app()->user->isGuest),
        array('label'=>Yii::t('blog','Manage Posts'), 'icon'=>'th-list', 'url'=>array('post/admin'), 'visible'=>!Yii::app()->user->isGuest),
        array('label'=>Yii::t('blog','Approve Comments'). ' (' . $pendingCommentCount . ')', 'icon'=>'ok', 'url'=>array('comment/index'), 'visible'=>$pendingCommentCount>0),
        array('label'=>Yii::t('site','Logout'), 'icon'=>'share', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest),
    );
foreach($items as $item) {
    if($item['visible']==false)
        continue;
    $url = CHtml::normalizeUrl( $item['url'] );
    $label = $item['label'];
    if(isset($item['icon']))
        $label = '<i class="icon-'.$item['icon'].'"></i> '.$label;
    echo '<li><a href="'.$url.'">'.$label.'</a></li>';
}
?>
</div>
