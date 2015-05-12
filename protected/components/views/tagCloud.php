<style>

a{color:#444;text-decoration:none;}a:hover{color:red;}

#tagscloud{width:240px;height:250px;position:relative;font-size:12px;color:#333;margin:20px auto 0;text-align:center;}
#tagscloud a{position:absolute;top:0px;left:0px;color:#333;font-family:Arial;text-decoration:none;}
#tagscloud a:hover{color:#fff;padding:5px;display:block;background:#D02F53;}
#tagscloud a.tagc1{margin:0 10px 15px 0;line-height:18px;width:65px;text-align:center;font-size:12px;padding:1px 5px;white-space:nowrap;display:inline-block;border-radius:3px;background:#666;color:#fff;}
#tagscloud a.tagc2{margin:0 10px 15px 0;line-height:18px;width:60px;text-align:center;font-size:12px;padding:1px 5px;white-space:nowrap;display:inline-block;border-radius:3px;background:#F16E50;color:#fff;}
#tagscloud a.tagc5{margin:0 10px 15px 0;line-height:18px;width:70px;text-align:center;font-size:12px;padding:1px 5px;white-space:nowrap;display:inline-block;border-radius:3px;background:#006633;color:#fff;}
</style>

<div style="max-width: 340px; padding: 8px 0;" class="well">
<ul class="nav nav-list">
    <li class="nav-header"><?php echo CHtml::encode($title); ?></li>
    <li>
    <div id="tagscloud">
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
</div>
    </li>
    
</ul>
</div>
<script src='<?php echo Yii::app()->baseUrl.'/js/tagscloud.js'?>' language='javascript'></script>
