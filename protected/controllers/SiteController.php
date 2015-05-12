<?php

class SiteController extends Controller
{
    public $layout='column1';

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model=new ContactForm;
        if(isset($_POST['ContactForm']))
        {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate())
            {
                $headers="From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact',Yii::t('site','thank_you_for_contacting_us'));
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }

    /**
     * actionSelectLanguage
     */
    public function actionSelectLanguage() {
//         $language = htmlspecialchars($_GET['lc']);
        $language = Yii::app()->request->getParam('lc');
        Yii::app()->lc->setLanguage($language);
//         Yii::app()->user->setFlash('success','<strong>'.Yii::t('site','Changing Language').'</strong><br />'.Yii::t('site','The language has been changed to <em>{language}</em>.',array('{language}'=>Yii::app()->locale->getLanguage($language))));
//         $this->redirect(array('/'));
        $this->redirect(Yii::app()->request->urlReferrer, 301);
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
    	
// 		echo Yii::getPathOfAlias('webroot') ;
//         die;
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
        	
            echo CActiveForm::validate($model);
			die;
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    
    public function actionReply(){
    	
    	$model=new Chat;
    	if(isset($_POST['Chat'])){
    		$model->attributes=$_POST['Chat'];
    		$model->ip = Yii::app()->request->userHostAddress;
    		$model->send_date = date('Y-m-d H:i:s');
    		$model->save();
    		Yii::app()->user->setFlash('submit','thanks');
    		$this->refresh();
    	}
    	$criteria=new CDbCriteria(array(
    			'order'=>'send_date DESC'
    	));
    	$dataProvider=new CActiveDataProvider('Chat', array(
    			'pagination'=>array(
    					'pageSize'=>Yii::app()->params['postsPerPage'],
    			),
    			'criteria'=>$criteria,
    	));
    	$this->render('chat/reply',array('model'=>$model,'dataProvider'=>$dataProvider));
    }
    
     function actionGo() {
    	
    	if( isset($_GET['id']))
			$post_id = Yii::app()->request->getParam('id');
		else
			$post_id = 0;
		if( $post_id ){
			//获取跳转链接
			$post=Shop::model()->find(array(
					    'select'=>'url',
					    'condition'=>'id=:id',
					    'params'=>array(':id'=>$post_id),
					));
			
			$buy_link = htmlspecialchars_decode($post->url);
			$buy_link = trim($buy_link);
			if($buy_link){
				//跳转
				$this->redirect($buy_link, 301);
			}else{
				//跳转到首页
				$this->redirect(Yii::app()->homeUrl, 301);
			}
		}else{
			//无ID则重定向到首页
			$this->redirect(Yii::app()->homeUrl, 301);
		} 
    }
    
	 function actionShowImg() {
    	
    	if( isset($_GET['id']))
			$post_id = Yii::app()->request->getParam('id');
		else
			$post_id = 0;
		if( $post_id ){
			//获取跳转链接
			$post=Shop::model()->find(array(
					    'select'=>'image',
					    'condition'=>'id=:id',
					    'params'=>array(':id'=>$post_id),
					));
			
			$buy_link = htmlspecialchars_decode($post->image);
			$buy_link = trim($buy_link);
			$pos = strrpos($buy_link, ".");
		
			$format = substr($buy_link, $pos+1, strlen($buy_link));
			ob_clean();
			if($format == "jpg"){
				header("Content-type: image/jpeg;");
			}else if($format == "gif"){
				header("Content-type: image/gif;");
			}else if($format == "png"){
				header("Content-type: image/png;");
			}else if($format == "bmp"){
				header("Content-type: image/bmp;");
			}else if($format == "jpeg"){
				header("Content-type: image/jpeg;");
			}else{
				header("Content-type: image/jpeg;");
			}
			$image_string = file_get_contents($buy_link);
			echo $image_string;
		}
    }
}
