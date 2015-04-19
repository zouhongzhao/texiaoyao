<div style="max-width: 340px; padding: 8px 0;" class="well">
<ul class="nav nav-list">
    <li class="nav-header"><?php echo CHtml::encode($title); ?></li>
    <li>
<?php

    foreach($tags as $tag=>$weight)
    {
        $link=CHtml::link(CHtml::encode($tag), array('post/index','tag'=>$tag));
        echo CHtml::tag('span', array(
            'class'=>'tag',
            'style'=>"font-size:{$weight}pt",
        ), $link)."\n";
    }
?>
    </li>
</ul>
</div>
