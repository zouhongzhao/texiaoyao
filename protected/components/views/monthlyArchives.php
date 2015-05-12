<div class="well" style="max-width: 340px; padding: 8px 0;">
<ul class="nav nav-list portlet">
    <li class="nav-header"><?php echo CHtml::encode($this->title); ?></li>
<?php foreach ($this->findAllPostDate() as $month=>$val): ?>
<li>
<?php echo CHtml::link("$month ($val)", array('post/PostedInMonth',
					      'time'=>strtotime($month),
					      'pnc'=>'c'));  ?>
</li>
<?php endforeach; ?>
</ul>
</div>
