<?php

Yii::import('zii.widgets.CPortlet');


class OperationsMenu extends CWidget
{
    public $title;
    public $menu=array();

    //public $decorationCssClass='portlet well';
	public function init()
	{
        $this->title=CHtml::encode(Yii::t('site','Operations'));
        if(property_exists(Yii::app()->controller,'menu'))
            $this->menu = Yii::app()->controller->menu;
		parent::init();
	}

	public function run()
	{
		$this->render('operationsMenu',array('title'=>$this->title,'menu'=>$this->menu));
	}
}
