<?php
  // @version $Id: RecentPosts.php 68 2010-08-20 09:43:02Z mocapapa@g.pugpug.org $

class RenQiBang extends TbPortlet
{
    public $title='人气排行';
    public $maxPosts=10;

    public function getRecentPosts()
    {
    	$array = array();
    	$array['month'] = Post::model()->findPostedInMonth($this->maxPosts);
		$array['all'] = Post::model()->findPostedInAll($this->maxPosts);
		return $array;
    }

    public function init()
    {
            $this->title=CHtml::encode(Yii::t('blog','人气排行'));
            parent::init();
    }
	
	protected function renderDecoration()
	{
		if($this->title!==null)
                {
                        echo '<ul class="nav nav-list portlet">'."\n";
                        echo '<li class="nav-header">'.CHtml::encode($this->title).'</li>'."\n";
		}
	}
	
    public function renderContent()
    {
        $this->render('renqibang', array('posts'=>$this->recentPosts));
    }
}
