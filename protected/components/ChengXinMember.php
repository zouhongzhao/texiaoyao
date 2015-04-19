<?php
  // @version $Id: RecentPosts.php 68 2010-08-20 09:43:02Z mocapapa@g.pugpug.org $

class ChengXinMember extends TbPortlet
{
    public $title='诚信会员';
    public $maxPosts=10;

    public function getCXUser()
    {
        return User::model()->findCXUser($this->maxPosts);
    }

    public function init()
    {
            $this->title=CHtml::encode(Yii::t('blog','诚信会员'));
            parent::init();
    }

    public function renderContent()
    {
        $this->render('chengxinMember', array('users'=>$this->cXUser));
    }
}
