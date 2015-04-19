<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>
<?php if(!empty($search->string)): ?>
<h1>Posts Searched by <i><?php echo CHtml::encode($search->string); ?></i></h1>
<?php endif; ?>

<?php foreach($posts as $post): ?>
<?php
	$pizza = explode('>', $post->content);
	$s = '';
	for ($i = 0; $i < count($pizza); $i++) {
		$piece = explode('<', $pizza[$i]);
		$replace = preg_replace('/('.$search->string.')/i', '<b><span style="background:yellow;">${1}</span></b>', $piece[0]);
		if (count($piece) == 2) {
			$s .= $replace.'<'.$piece[1].'>';
		} else if (count($piece) == 1) {
			$s .= $replace;
		}
	}
	$post->content = $s;

	$this->renderPartial('_view',array(
		'data'=>$post,
	));
?>
<?php endforeach; ?>

<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>