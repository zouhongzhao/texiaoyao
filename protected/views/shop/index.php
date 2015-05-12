<?php
$this->pageTitle=Yii::app()->name . ' - ' .Yii::app()->params['appTitle'];
$this->breadcrumbs=array(
	Yii::t('site','shop'),
);
?>

<div id="logo_title">
	<div style="text-align:center;">
		<h1><a href=""><img class="center" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_title.png"></a></h1>
	</div>
</div>
<?php $this->renderPartial('_header', array(
	'categoryList'=>$categoryList,
)); ?>
<div id='explanation'>
    <p class="well">
    	<?php echo Yii::t('site','shop_explanation') ?>
    	</p>
</div>
<div id='examples'>
	<span><?php echo Yii::t('site','all_types_texiaoyao') ?></span>
    <div>
    <ul>
        <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"灰指甲"))?>' target="_blank">灰指甲特效药</a>
        </li>
        <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"牙疼"))?>' target="_blank">牙疼特效药</a>
        </li>
         <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"糖尿病"))?>' target="_blank">糖尿病特效药</a>
        </li>
          <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"卢氏甲沟炎"))?>' target="_blank">卢氏甲沟炎特效药</a>
        </li>
          <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"前列腺炎"))?>' target="_blank">前列腺炎的特效药</a>
        </li>
         <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"牛皮癣"))?>' target="_blank">牛皮癣的特效药</a>
        </li>
    </ul>
    <ul>
        <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"感冒"))?>' target="_blank">感冒特效药</a>
        </li>
         <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"沙眼"))?>' target="_blank">沙眼特效药</a>
        </li>
         <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"鹅掌风"))?>' target="_blank">鹅掌风特效药</a>
        </li>
         <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"灭魔疱疹"))?>' target="_blank">灭魔疱疹特效药</a>
        </li>
          <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"湿疹"))?>' target="_blank">湿疹的特效药</a>
        </li>
         <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"脚气"))?>' target="_blank">脚气的特效药</a>
        </li>
    </ul>
    <ul>
        <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"禽流感"))?>' target="_blank">禽流感特效药</a>
        </li>
         <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"肺癌"))?>' target="_blank">肺癌晚期特效药</a>
        </li>
         <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"蓟马"))?>' target="_blank">蓟马特效药</a>
        </li>
         <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"尖锐湿疣"))?>' target="_blank">治疗尖锐湿疣的特效药</a>
        </li>
          <li>
        <a href='<?php echo Yii::app()->createUrl("shop/search",array("category_id"=>"盆腔炎"))?>' target="_blank">盆腔炎的特效药</a>
        </li>
    </ul>
    </div>
</div>
<div class='recent'>
	<span><?php echo Yii::t('site','new_drugs_have_recently_added') ?></span>
    <div>
    <ul>
       <!--  <li>
        <a class='company_logo' href='#' title='Matt Ramos Photography'>
        <img src='#'/>
        </a>
        </li> -->
    </ul>
    </div>
</div>