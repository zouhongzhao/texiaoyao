<?php
/**
 * 
 */
class Functions {
	
		
	public static $user_page_size = 10;
	
	/**
	 * @var int
	 * @desc items on page
	 */
	public static $fields_page_size = 10;
	
	/**
	 * @var string
	 * @desc hash method (md5,sha1 or algo hash function http://www.php.net/manual/en/function.hash.php)
	 */
	public static $hash='md5';
	
	/**
	 * @var boolean
	 * @desc use email for activation user account
	 */
	public static $sendActivationMail=false;
	
	/**
	 * @var boolean
	 * @desc allow auth for is not active user
	 */
	public static $loginNotActiv=false;
	
	/**
	 * @var boolean
	 * @desc activate user on registration (only $sendActivationMail = false)
	 */
	public static $activeAfterRegister=true;
	
	/**
	 * @var boolean
	 * @desc login after registration (need loginNotActiv or activeAfterRegister = true)
	 */
	public static $autoLogin=true;
	
	public static $registrationUrl = array("/registration");
	public static $recoveryUrl = array("/recovery/recovery");
	public static $loginUrl = array("/login");
	public static $logoutUrl = array("/logout");
	public static $profileUrl = array("/profile");
	public static $returnUrl = array("/profile");
	public static $returnLogoutUrl = array("/login");
	
	public static $fieldsMessage = '';
	
	/**
	 * @var array
	 * @desc User model relation from other models
	 * @see http://www.yiiframework.com/doc/guide/database.arr
	 */
	public static $relations = array();
	
	/**
	 * @var array
	 * @desc Profile model relation from other models
	 */
	public static $profileRelations = array();
	
	/**
	 * @var boolean
	 */
	public static $captcha = array('registration'=>true);
	
	
	/**
	 * @var array
	 * @desc Behaviors for models
	 */
	public static $componentBehaviors=array();
	
	
	public function getBehaviorsFor($componentName){
        if (isset(self::$componentBehaviors[$componentName])) {
            return self::$componentBehaviors[$componentName];
        } else {
            return array();
        }
	}
	
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
		/**
	 * @return hash string.
	 */
	public static function encrypting($string="") {
		$hash = self::$hash;
		$hash = 'md5';
		if ($hash=="md5")
			return md5($string);
		if ($hash=="sha1")
			return sha1($string);
		else
			return hash($hash,$string);
	}
	
		/**
	 * Send mail method
	 */
	public static function sendMail($email,$subject,$message) {
    	$adminEmail = Yii::app()->params['adminEmail'];
	    $message = wordwrap($message, 70);
	    $message = str_replace("\n.", "\n..", $message);
		$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
		// $mailer->Host = 'smtp.mallol.cn';
		// $mailer->IsSMTP();
		$mailer->From = $adminEmail;
		$mailer->AddAddress($email, "收件人");
		// $mailer->AddReplyTo($email);
		// $mailer->AddAddress('qiang@example.com');
		$mailer->FromName = Yii::app()->params['appTitle'];
		$mailer->SMTPDebug = true;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = $subject;
		$mailer->Body = $message;
		var_dump($mailer->Send());
	    // return mail($email,'=?UTF-8?B?'.base64_encode($subject).'?=',$message,$headers);
	}
	
	
	/**
	 * @param $place
	 * @return boolean 
	 */
	public static function doCaptcha($place = '') {
		if(!extension_loaded('gd'))
			return false;
		if (in_array($place,  self::$captcha))
			return self::$captcha[$place];
		return false;
	}
	
	/**
	 * Return admin status.
	 * @return boolean
	 */
	public static function isAdmin() {
		if(Yii::app()->user->isGuest)
			return false;
		else {
			if(self::user()->superuser){
				return true;
			}else{
				return false;
			}
			// if (!isset(self::$_admin)) {
				// if(self::user()->superuser)
					// self::$_admin = true;
				// else
					// self::$_admin = false;	
			// }
			// return self::$_admin;
		}
	}

	/**
	 * Return admins.
	 * @return array syperusers names
	 */	
	public static function getAdmins() {
		if (!self::$_admins) {
			$admins = User::model()->active()->superuser()->findAll();
			$return_name = array();
			foreach ($admins as $admin)
				array_push($return_name,$admin->username);
			self::$_admins = $return_name;
		}
		return self::$_admins;
	}
	
	/**
	 * Return safe user data.
	 * @param user id not required
	 * @return user object or false
	 */
	public static function user($id=0) {
		if ($id)
			return User::model()->active()->findbyPk($id);
			// return User::model()->with('profile')->findbyPk($id);
		else {
			if(Yii::app()->user->isGuest) {
				return false;
			} else {
				// if (!self::$user)
					// self::$user = User::model()->active()->findbyPk(Yii::app()->user->id);
				// return self::$user;
				return User::model()->active()->findbyPk(Yii::app()->user->id);
				// return User::model()->with('profile')->findbyPk(Yii::app()->user->id);
			}
		}
	}
	
	/**
	 * Return safe user data.
	 * @param user id not required
	 * @return user object or false
	 */
	public static function users() {
		return User;
	}
	
	public static function truncate_utf8_string($string, $length, $etc = '...')
    {
        $result = '';
        $string = html_entity_decode(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
        $strlen = strlen($string);
        for ($i = 0; (($i < $strlen) && ($length > 0)); $i++)
        {
        if ($number = strpos(str_pad(decbin(ord(substr($string, $i, 1))), 8, '0', STR_PAD_LEFT), '0'))
            {
            if ($length < 1.0)
                {
            break;
            }
            $result .= substr($string, $i, $number);
            $length -= 1.0;
            $i += $number - 1;
        }
            else
            {
            $result .= substr($string, $i, 1);
            $length -= 0.5;
        }
        }
        $result = htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
        if ($i < $strlen)
        {
        $result .= $etc;
        }
        return $result;
    }
    
    public static function GetAreaByIp($ip='')
	{
		if(empty($ip)){
			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
				$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			else if (isset($_SERVER["HTTP_CLIENT_IP"]))
				$ip = $_SERVER["HTTP_CLIENT_IP"];
			else if (isset($_SERVER["REMOTE_ADDR"]))
				$ip = $_SERVER["REMOTE_ADDR"];
			else
				$ip = "Unknown";
		}
		
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
	    return $data['region'].' '.$data['city'].'  '.$data['isp'];
	}
}
?>