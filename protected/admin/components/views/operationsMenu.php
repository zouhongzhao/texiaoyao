<?php if(count($menu)>0) : ?>
<div class="well" style="max-width: 340px; padding: 8px 0;">
<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array_merge(array(array('label'=>$title)),$menu),
)); ?>
</div>
<?php endif; ?>
