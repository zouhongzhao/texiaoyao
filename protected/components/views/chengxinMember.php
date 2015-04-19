<div class="list-group">
<?php foreach($users as $user): ?>
	<a href="#" class="list-group-item"><?php echo $user->username;?></a> <br />
<?php endforeach; ?>

  <!-- <a href="#" class="list-group-item active">
    Cras justo odio
     <span class="badge">14</span>
  </a> -->
</div>