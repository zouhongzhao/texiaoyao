<?php 
$action = $this->getId().'_'.$this->action->id;
$items=array(
        array('label'=>Yii::t('site','Profile'), 'icon'=>'home', 'url'=>array('/profile/profile'), 'class'=>'profile_profile'),
        array('label'=>Yii::t('site','Edit'), 'icon'=>'book', 'url'=>array('/profile/edit'),'class'=>'profile_edit'),
        array('label'=>Yii::t('site','Create New Product'), 'icon'=>'book', 'url'=>array('/shop/create'),'class'=>'shop_create'),
        array('label'=>Yii::t('site','Bulk import'), 'icon'=>'book', 'url'=>array('/profile/bulkImport'),'class'=>'profile_bulkImport'),
        array('label'=>Yii::t('blog','Create Post'), 'icon'=>'star', 'url'=>array('/post/create'),'class'=>'post_create'),
        array('label'=>Yii::t('blog','Manage Posts'), 'icon'=>'th-list', 'url'=>array('/post/admin'),'class'=>'post_admin'),
        array('label'=>Yii::t('site','Change password'), 'icon'=>'pencil', 'url'=>array('/profile/changepassword'),'class'=>'profile_changepassword'),
        array('label'=>Yii::t('site','Logout'), 'icon'=>'user', 'url'=>array('/profile/logout'),'class'=>'profile_logout')
    );
foreach ($items as $key=>$item) {
	if($action == $item['class']){
		$items[$key]['active'] = true;
	}
}
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>$items,
)); ?>
<!--
<ul class="actions">
<?php 
if(Functions::isAdmin()) {
?>
<li><?php echo CHtml::link(Yii::t('site','Manage User'),array('/admin')); ?></li>
<?php 
} else {
?>
<li><?php echo CHtml::link(Yii::t('site','List User'),array('/user')); ?></li>
<?php
}
?>
</ul>
-->