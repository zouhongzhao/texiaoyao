
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#month_renqi" data-toggle="tab">月人气排行</a></li>
  <li><a href="#all_reiqi" data-toggle="tab">总人气排行</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane fade in active" id="month_renqi">
  	  <ol>
  	  	<?php foreach($posts['month'] as $month):?>
  	  		 <li><a href="<?php echo $month->url;?>"><?php echo $month->title;?></a></li>
  	  	<?php endforeach; ?>
            </ol>
  </div>
  <div class="tab-pane fade" id="all_reiqi">
  	  <ol>
  	  	<?php foreach($posts['all'] as $all):?>
  	  		 <li><a href="<?php echo $all->url;?>"><?php echo $all->title;?></a></li>
  	  	<?php endforeach; ?>
            </ol>
  </div>
</div>