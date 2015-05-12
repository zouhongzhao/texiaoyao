<?php
  // @version $Id: RecentPosts.php 68 2010-08-20 09:43:02Z mocapapa@g.pugpug.org $

class GongQiuInfo extends TbPortlet
{
    public $title='供求信息';
    public $maxPosts=10;

    public function getRecentPosts()
    {
        return Post::model()->findRecentPosts($this->maxPosts);
    }

    public function init()
    {
            $this->title=CHtml::encode(Yii::t('blog','供求信息'));
            parent::init();
    }

    public function renderContent()
    {
        $this->render('gongqiuInfo', array('posts'=>$this->recentPosts));
    }
}
