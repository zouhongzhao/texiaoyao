<div class="well" style="max-width: 340px; padding: 8px 0;">
<ul class="nav nav-list portlet">
    <li class="nav-header"><?php echo CHtml::encode(Yii::t('blog',$this->title)); ?></li>
</ul>
<center>
<ul class="Calendar">
<?php
   // @version $Id: calendar.php 14 2010-01-12 04:08:29Z mocapapa@g.pugpug.org $
   if (isset(Yii::app()->params['calendarLocale']) && Yii::app()->params['calendarLocale'] == 'China')
     include_once('generate_calendar_Japan.php');
   else
     include_once('generate_calendar.php');
echo generate_calendar($year, $month, $days, $len, $url, 0, $pnc);
?>
</ul>
</center>
</div>
