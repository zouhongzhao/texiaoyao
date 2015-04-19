<center>
<!-- $Id: clock.php 72 2010-02-07 01:20:18Z mocapapa@g.pugpug.org $ -->
<?php
  $clockOffsetX = 36;
  $clockOffsetY = 2;
?>
<div style="position: relative;">
  <img src="<?php echo Yii::app()->request->baseUrl;?>/systemImages/analog-clock-base.png">
    <div class="hourHand" style="width:104px;height:104px;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/systemImages/analog-clock-hands.png);background-repeat:no-repeat;top:<?php echo $clockOffsetY;?>px;left:<?php echo $clockOffsetX;?>px;position:absolute;"></div>
    <div class="minuteHand" style="width:104px;height:104px;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/systemImages/analog-clock-hands.png);background-repeat:no-repeat;top:<?php echo $clockOffsetY;?>px;left:<?php echo $clockOffsetX;?>px;position:absolute;"></div>
    <div class="secondHand" style="width:104px;height:104px;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/systemImages/analog-clock-hands.png);background-repeat:no-repeat;top:<?php echo $clockOffsetY;?>px;left:<?php echo $clockOffsetX;?>px;position:absolute;"></div>
</div>
<script type="text/javascript">
   /*<![CDATA[*/
   $(document).ready(function() {
       animation();
       setInterval(function(){
           animation();
         }, 1000);
       function animation() {
	 var currentTime = new Date();
	 var s = currentTime.getSeconds();
	 var m = currentTime.getMinutes();
	 var h = Math.floor(5*(currentTime.getHours()%12)+m/12);
	 $('.hourHand').css('background-position', -h*104+'px 0px');
	 $('.minuteHand').css('background-position', -m*104+'px -104px');
	 $('.secondHand').css('background-position', -s*104+'px -208px');
       }
     });
/*]]>*/
</script>
</center>
