
            <ol>
            	<?php foreach($posts as $post):?>
  	  		 <li><a href="<?php echo $post->url;?>"><?php echo $post->title;?></a></li>
  	  	<?php endforeach; ?>
             
            </ol>