<?php

class ActivationController extends Controller
{
	public $defaultAction = 'activation';

	
	/**
	 * Activation user account
	 */
	public function actionActivation () {
		$email = Yii::app()->request->getParam('email');
		$activkey = Yii::app()->request->getParam('activkey');
		if ($email&&$activkey) {
			$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));
			if (isset($find)&&$find->status) {
			    $this->render('/user/message',array('title'=>Yii::t('site',"User activation"),'content'=>Yii::t('site',"You account is active.")));
			} elseif(isset($find->activkey) && ($find->activkey==$activkey)) {
				$find->activkey =Functions::encrypting(microtime());
				$find->status = 1;
				$find->save();
			    $this->render('/user/message',array('title'=>Yii::t('site',"User activation"),'content'=>Yii::t('site',"You account is activated.")));
			} else {
			    $this->render('/user/message',array('title'=>Yii::t('site',"User activation"),'content'=>Yii::t('site',"Incorrect activation URL.")));
			}
		} else {
			$this->render('/user/message',array('title'=>Yii::t('site',"User activation"),'content'=>Yii::t('site',"Incorrect activation URL.")));
		}
	}

}