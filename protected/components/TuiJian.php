<?php
  // @version $Id: RecentPosts.php 68 2010-08-20 09:43:02Z mocapapa@g.pugpug.org $

class TuiJian extends TbPortlet
{
    public $title='推荐信息';
    public $maxPosts=10;

    public function getRecentPosts()
    {
        return Post::model()->findPostedTuiJian($this->maxPosts);
    }

    public function init()
    {
            $this->title=CHtml::encode(Yii::t('blog','推荐信息'));
            parent::init();
    }

    public function renderContent()
    {
        $this->render('tuiJian', array('posts'=>$this->recentPosts));
    }
}
