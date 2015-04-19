<?php $this->beginContent('/layouts/main'); ?>
<div class="row">
	    <div class="span3">
        <div id="sidebar">
           <?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array(
        array('label'=>'产品'),
        array('label'=>'产品列表', 'icon'=>'home', 'url'=>array('shop/admin')),
        array('label'=>'添加产品', 'icon'=>'book', 'url'=>array('shop/create')),
        array('label'=>'分类列表', 'icon'=>'pencil', 'url'=>array('category/admin')),
        array('label'=>'添加分类', 'icon'=>'pencil', 'url'=>array('category/create')),
        array('label'=>'资讯'),
        array('label'=>'所有文章', 'icon'=>'user', 'url'=>array('post/admin')),
        array('label'=>'添加文章', 'icon'=>'cog', 'url'=>array('post/create')),
        //array('label'=>'分类目录', 'icon'=>'flag', 'url'=>array('post/add')),
        array('label'=>'标签', 'icon'=>'flag', 'url'=>array('tag/admin')),
        array('label'=>'添加标签', 'icon'=>'flag', 'url'=>array('tag/create')),
        array('label'=>'评论'),
        array('label'=>'所有评论', 'icon'=>'user', 'url'=>array('comment/index')),
       	array('label'=>'用户'),
        array('label'=>'所有用户', 'icon'=>'user', 'url'=>array('user/admin')),
        array('label'=>'添加用户', 'icon'=>'user', 'url'=>array('user/create')),
        array('label'=>'我的个人资料', 'icon'=>'user', 'url'=>array('user/view')),
        array('label'=>'设置'),
        array('label'=>'常规', 'icon'=>'user', 'url'=>array('site/general')),
        array('label'=>'系统', 'icon'=>'cog', 'url'=>array('site/system')),
    ),
)); ?>
        </div><!-- sidebar -->
    </div>
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
            <?php // echo '<pre>'; CVarDumper::dump($_SESSION); echo '</pre>'; ?>
        </div><!-- content -->
    </div>

</div>
<?php $this->endContent(); ?>
