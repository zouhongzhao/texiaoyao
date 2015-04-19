<ul class="actions">
	<li><?php echo CHtml::link(Yii::t("site",'Manage User'),array('/user/admin')); ?></li>
	<li><?php echo CHtml::link(Yii::t("site",'Manage Profile Field'),array('admin')); ?></li>
<?php 
	if (isset($list)) {
		foreach ($list as $item)
			echo "<li>".$item."</li>";
	}
?>
</ul><!-- actions -->