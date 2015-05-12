<?php

class RegistrationController extends Controller
{
	public $defaultAction = 'registration';
	


	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return (isset($_POST['ajax']) && $_POST['ajax']==='registration-form')?array():array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}
	/**
	 * Registration user
	 */
	public function actionRegistration() {
		
            $model = new RegistrationForm;
			
            $profile=new Profile;
			
            $profile->regMode = true;
			// ajax validator
			if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
			{
				echo UActiveForm::validate(array($model,$profile));
				Yii::app()->end();
			}
			
		    if (Yii::app()->user->id) {
		    	$this->redirect(Functions::$profileUrl);
		    } else {
		    	if(isset($_POST['RegistrationForm'])) {
		    		
					if(isset($_POST['Area']) && isset($_POST['Profile'])){
						$area = implode(',', $_POST['Area']);
						$_POST['Profile']['area'] = $area;
					}
					$model->attributes=$_POST['RegistrationForm'];
					$profile->attributes=((isset($_POST['Profile'])?$_POST['Profile']:array()));
					if($model->validate()&&$profile->validate())
					{
						$soucePassword = $model->password;
						$model->activkey=Functions::encrypting(microtime().$model->password);
						$model->password=Functions::encrypting($model->password);
						$model->verifyPassword=Functions::encrypting($model->verifyPassword);
						$model->createtime=time();
						$model->lastvisit=((Functions::$loginNotActiv||(Functions::$activeAfterRegister&&Functions::$sendActivationMail==false))&&Functions::$autoLogin)?time():0;
						$model->superuser=0;
						$model->status=((Functions::$activeAfterRegister)?User::STATUS_ACTIVE:User::STATUS_NOACTIVE);
						
						if ($model->save()) {
							$profile->user_id=$model->id;
							$profile->save();
							if (Functions::$sendActivationMail) {
								$activation_url = $this->createAbsoluteUrl('/activation/activation',array("activkey" => $model->activkey, "email" => $model->email));
								Functions::sendMail($model->email,Yii::t('site',"[{site_name}] You registered from ",array('{site_name}'=>Yii::app()->name)),Yii::t('site',"Please activate you account go to {activation_url}",array('{activation_url}'=>$activation_url)));
							}
							
							if ((Functions::$loginNotActiv||(Functions::$activeAfterRegister&&Functions::$sendActivationMail==false))&&Functions::$autoLogin) {
									$identity=new UserIdentity($model->username,$soucePassword);
									$identity->authenticate();
									Yii::app()->user->login($identity,0);
									$this->redirect(Functions::$returnUrl);
							} else {
								if (!Functions::$activeAfterRegister&&!Functions::$sendActivationMail) {
									Yii::app()->user->setFlash('registration',Yii::t('site',"Thank you for your registration. Contact Admin to activate your account."));
								} elseif(Functions::$activeAfterRegister&&Functions::$sendActivationMail==false) {
									Yii::app()->user->setFlash('registration',Yii::t('site',"Thank you for your registration. Please {{login}}.",array('{{login}}'=>CHtml::link(Yii::t('site','Login'),Functions::$loginUrl))));
								} elseif(Functions::$loginNotActiv) {
									Yii::app()->user->setFlash('registration',Yii::t('site',"Thank you for your registration. Please check your email or login."));
								} else {
									Yii::app()->user->setFlash('registration',Yii::t('site',"Thank you for your registration. Please check your email."));
								}
								$this->refresh();
							}
						}
					} else $profile->validate();
				}
			    $this->render('/user/registration',array('model'=>$model,'profile'=>$profile));
		    }
	}

	function actionGetCity()
	{
		if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
	        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	    else if (isset($_SERVER["HTTP_CLIENT_IP"]))
	        $ip = $_SERVER["HTTP_CLIENT_IP"];
	    else if (isset($_SERVER["REMOTE_ADDR"]))
	        $ip = $_SERVER["REMOTE_ADDR"];
	    else
	        $ip = "Unknown";
	    // 淘宝API地址，后边加上IP即可，它会返回json字符串
	    
	    $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
		$headers = @get_headers($url);
		if(strpos($headers[0],'404') == true){
			echo 'fail';die;
		}
	    $ip=json_decode(file_get_contents($url));
	     
	    if((string)$ip->code=='1'){
	        echo 'fail';die;
	    }
	    $data = (array)$ip->data;
		$data['region'] = rtrim($data['region'],'省');
		$data['city'] = rtrim($data['city'],'市');
		echo json_encode($data);
	    // return $data;
	}

}