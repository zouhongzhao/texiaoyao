<?php

class UserMenu extends TbPortlet
{
    public $title;

    public function init()
    {
            $this->title=CHtml::encode(Yii::t('site','User:').' '.Yii::app()->user->name);
            parent::init();
    }

    public function renderContent()
    {
            $this->render('userMenu',array('title'=>$this->title));
    }
}
