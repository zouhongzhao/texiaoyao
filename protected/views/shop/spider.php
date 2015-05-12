<?php
$this->pageTitle=Yii::app()->name . ' - ' .'爬虫搜索';
$this->breadcrumbs=array(
	Yii::t('site','shop'),
);
?>
<style type="text/css">
	.load_container {width: 90%; margin: 0 auto; overflow: hidden;}

/* STOP ANIMATION */

.stop {
	-webkit-animation-play-state:paused;
	-moz-animation-play-state:paused;
}

/* Loading Circle */
.ball {
	background-color: rgba(0,0,0,0);
	border:5px solid rgba(0,183,229,0.9);
	opacity:.9;
	border-top:5px solid rgba(0,0,0,0);
	border-left:5px solid rgba(0,0,0,0);
	border-radius:50px;
	box-shadow: 0 0 35px #2187e7;
	width:50px;
	height:50px;
	margin:0 auto;
	-moz-animation:spin .5s infinite linear;
	-webkit-animation:spin .5s infinite linear;
}

.ball1 {
	background-color: rgba(0,0,0,0);
	border:5px solid rgba(0,183,229,0.9);
	opacity:.9;
	border-top:5px solid rgba(0,0,0,0);
	border-left:5px solid rgba(0,0,0,0);
	border-radius:50px;
	box-shadow: 0 0 15px #2187e7; 
	width:30px;
	height:30px;
	margin:0 auto;
	position:relative;
	top:-50px;
	-moz-animation:spinoff .5s infinite linear;
	-webkit-animation:spinoff .5s infinite linear;
}

@-moz-keyframes spin {
	0% { -moz-transform:rotate(0deg); }
	100% { -moz-transform:rotate(360deg); }
}
@-moz-keyframes spinoff {
	0% { -moz-transform:rotate(0deg); }
	100% { -moz-transform:rotate(-360deg); }
}
@-webkit-keyframes spin {
	0% { -webkit-transform:rotate(0deg); }
	100% { -webkit-transform:rotate(360deg); }
}
@-webkit-keyframes spinoff {
	0% { -webkit-transform:rotate(0deg); }
	100% { -webkit-transform:rotate(-360deg); }
}
	
</style>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl."/css/spider.css"?>" />
<div id="spider-page">
  <form id="searchForm" class="navbar-search" method="post">
    <fieldset>
    <input id="s" type="text" />
    <input type="submit" value="Submit" id="submitButton" />
    <div id="searchInContainer">
      <input type="radio" name="check" value="web" id="searchWeb" />
      <label for="searchWeb"><?php echo Yii::t('site','Search The Web')?></label>
      <input type="radio" name="check" value="site" id="searchSite"  />
      <label for="searchSite" id="siteNameLabel"><?php echo Yii::t('site','search')?></label>
    
    </div>
    <ul class="icons">
      <li class="web" title="<?php echo Yii::t('site','Web')?>" data-searchType="web"><?php echo Yii::t('site','web')?></li>
      <li class="images" title="<?php echo Yii::t('site','Images')?>" data-searchType="images"><?php echo Yii::t('site','Images')?></li>
      <li class="news" title="<?php echo Yii::t('site','News')?>" data-searchType="news"><?php echo Yii::t('site','News')?></li>
      <li class="videos" title="<?php echo Yii::t('site','Videos')?>" data-searchType="video"><?php echo Yii::t('site','Videos')?></li>
    </ul>
    </fieldset>
  </form>
    <div class="load_container" style="display: none">
		<div class="ball"></div>
		<div class="ball1"></div>
    </div>
  <div id="resultsDiv">
  </div>
</div>
<script src="<?php echo Yii::app()->baseUrl."/js/spider.js"?>"></script>