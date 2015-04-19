<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';
	public $layout='login';
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;
			
			// collect user input data
			
			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
					
					$this->lastViset();
					if (strpos(Yii::app()->user->returnUrl,'/index.php')!==false)
						$this->redirect(Functions::$returnUrl);
					else
						$this->redirect(Yii::app()->user->returnUrl);
				}
			}
			// display the login form
			$this->render('/user/login',array('model'=>$model));
		} else
			$this->redirect(Functions::$returnUrl);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}

	public function actionNameIsExits(){
		$username=Yii::app()->request->getParam('username');
		$user = User::model()->notsafe()->findAllByAttributes(array('username'=>$username));
		if(empty($user)){
			echo 'false';
		}else{
			echo 'true';
		}
	}
}