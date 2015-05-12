<?php
/**
 * Yii-User module
 * 
 * @author Mikhail Mangushev <mishamx@gmail.com> 
 * @link http://yii-user.googlecode.com/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @version $Id: UserModule.php 105 2011-02-16 13:05:56Z mishamx $
 */

class JdApi extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{shop}}';
	}
	// public function __construct(){
		// ini_set('display_errors', 'on');
		// ini_set('display_startup_errors', 'on');
		// error_reporting(E_ALL ^ E_NOTICE);
		// ini_set('date.timezone', 'Asia/Shanghai');
	// }
	
	function auth($row=array(), $mdb='') {
		include Yii::app()->basePath . '/vendors/jd/JosSdk.php';
		include Yii::app()->basePath . '/vendors/jd/samples/common/JosClientHelper.php';
		
		$jos = new JosClientHelper();
		$jos->appkey = 'CF9C909E215461F5AE745EBE5F43C166';
		$jos->secretKey = '8d17ef1008f948c6bfbce07a42b3b8a2';
		$jos->redirectUri = 'http://texiaoyao.cn/api/jd';
		
		$jos->devEnv();
		$authUrl = $jos->getAuthorizeUrl();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $authUrl);        //设置url
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);   //设置开启重定向支持
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		$output = curl_exec($ch);  //执行
		curl_close($ch);
		echo $authUrl;
		echo $output;die;
		if (isset($_GET['code'])) {
		    try {
		        $token = $jos->fetchAccessToken($_GET['code'], $_GET['state']);
		        $_SESSION['token'] = $token;
		        echo '<pre>';
		        print_r($token);
		    } catch (JosApiException $e) {
		        header('location:auth.php');
		    }
		} else {
		    $authUrl = $jos->getAuthorizeUrl();
			
		    echo '
		    <h1>
			<a href="{$authUrl}">点击去京东登录授权</a>
		</h1>
		    <p>默认回调地址是http://localhost/jos-php-sdk/samples/auth.php</p>
		';
		}
		//session_start();
	}
	//
	function wares($row=array(), $mdb='') {
				/**
		 * 商品列表
		 * @qq  347513004 
		 *
		 */
		 
		$this->auth();
		if (! isset($_SESSION['token'])) {
		    exit('请先登录授权');
		}
		
		$req = new WareInfoByInfoRequest();
		$req->setPage(1);
		$req->setPageSize(20);
		$resp = $jos->execute($req, $_SESSION['token']->access_token);
		echo '<pre>';
		print_r($resp); 
	}
}
