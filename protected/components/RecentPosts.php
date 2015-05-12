<?php
  // @version $Id: RecentPosts.php 68 2010-08-20 09:43:02Z mocapapa@g.pugpug.org $

class RecentPosts extends TbPortlet
{
    public $title='Recent Posts';
    public $maxPosts=10;

    public function getRecentPosts()
    {
        return Post::model()->findRecentPosts($this->maxPosts);
    }

    public function init()
    {
            $this->title=CHtml::encode(Yii::t('blog','Recent Posts'));
            parent::init();
    }

    public function renderContent()
    {
        $this->render('recentPosts', array('posts'=>$this->recentPosts));
    }
}
