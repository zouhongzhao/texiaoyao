<?php
class RecentComments extends TbPortlet
{
    public $title;
    public $maxComments=10;

    public function getRecentComments()
    {
            return Comment::model()->findRecentComments($this->maxComments);
    }

    public function init()
    {
            $this->title=CHtml::encode(Yii::t('blog','Recent Comments'));
            parent::init();
    }

    public function renderContent()
    {
            $this->render('recentComments', array('comments'=>$this->recentComments));
    }
}
