<?php
  // @version $Id: Highslide.php 45 2010-01-27 09:33:16Z mocapapa@g.pugpug.org $

class Highslide extends CApplicationComponent
{
	public $enable;

	public function __construct()
	{
	}

	public function init()
	{
		parent::init();
		if ($this->enable) {
		// js
			$cs=Yii::app()->clientScript;
			$cs->registerCoreScript('jquery');
			$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/highslide/highslide.js', CClientScript::POS_HEAD);
			$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/highslide/highslide_eh.js', CClientScript::POS_HEAD);
			$params = array(
					'BASEURL'=>Yii::app()->request->baseUrl,
                            'HTTPHOST'=>$_SERVER['HTTP_HOST']
					);
			$script = 'var PARAMS = eval('.CJavaScript::jsonEncode($params).');';
			$cs->registerScript('widget-params', $script, CClientScript::POS_BEGIN);

			$script = 'hs.graphicsDir = PARAMS.BASEURL+\'/js/highslide/graphics/\';'."\n";
			$script .= 'hs.outlineType = \'rounded-white\';'."\n";
			$script .= 'hs.showCredits = false;';
			$cs->registerScript('hislide-middle', $script, CClientScript::POS_BEGIN);
			$script = 'addHighSlideAttribute();';
			$cs->registerScript('hislide-end', $script, CClientScript::POS_END);
		// css
			$cs->registerCSSFile(Yii::app()->request->baseUrl.'/js/highslide/highslide.css');
		}
	}
}
