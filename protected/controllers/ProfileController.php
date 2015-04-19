<?php

class ProfileController extends Controller
{
	public $defaultAction = 'profile';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * Shows a particular model.
	 */
	public function actionProfile()
	{
		$model = $this->loadUser();
		// print_r($model->profile());die;
	    $this->render('profile',array(
	    	'model'=>$model,
			'profile'=>$model->profile(),
	    ));
	}


	public function actionBulkImport()
	{
		$model = $this->loadUser();
//		 var_dump($_FILES['xls_file']['name']);die;
		if(isset($_FILES['xls_file']['name']))
		{
			$upload_dir = Yii::getPathOfAlias('webroot'). '/upload/excel/';
	        $name = $_FILES['xls_file']['name'];
	        $file_path = $upload_dir . $name;
	        
	        $MAX_SIZE = 20000000;
	        $flag = false;
	        $strrpos=strrpos($name, ".");
	        $basename=substr($name, 0, $strrpos);
	        $strlen=strlen($name);
	        $format=substr($name, $strrpos, $strlen);
	        if(!is_dir($upload_dir))
	        {
	            if(!mkdir($upload_dir))
	                echo $this->__("cannot create dir");
	            if(!chmod($upload_dir,0755))
	                echo $this->__("cannot chmod dir");
	        }
	         $filetypes = array('.xlsx','.csv','.xls','.XLS','.XLSX','.CSV');
	         if(!in_array($format,$filetypes)){
	         	echo "文件格式不支持";
	         	Yii::app()->user->setFlash('profileMessage',Yii::t("site","文件格式不支持,请重新上传"));
	         	
	         	$this->redirect(array('/profile/bulkImport'));
	         	exit;
	         }
	        if($_FILES['xls_file']['size']>$MAX_SIZE)
	            echo $this->__("File size cannot be larger than 20MB.");
	
	        if($_FILES['xls_file']['size'] == 0)
	            echo $this->__("Please select a file to upload.");
	
	        if(!move_uploaded_file( $_FILES['xls_file']['tmp_name'], $file_path))
	            echo $this->__("Unknow error occurred, please try again."); 
	
	        switch($_FILES['xls_file']['error'])
	        {
	            case 0:
	                $flag = true;
	                //echo "success" ;
	                break;
	            case 1:
	                echo $this->__("File size cannot be larger than 20MB.");
	                break;
	            case 2:
	                echo $this->__("File size cannot be larger than 20MB.");
	                break;
	            case 3:
	                echo $this->__("Unknow error occurred, please try again.");
	                break;
	            case 4:
	                echo $this->__("Unknow error occurred, please try again.");
	                break;
	        }
	        if($flag){
	        	Yii::app()->user->setFlash('profileMessage',Yii::t("site","上传成功,后台处理中,请等几分钟去前台看结果(首页搜索分类) "));
	        }
			// $this->redirect(array('/profile/bulkImport'));
		}
	    $this->render('bulkImport',array(
	    	'model'=>$model,
	    ));
		
	}
	
	public function uploadBulk(){
		 $upload_dir = rtrim($upload_dir, "/")."/";
        $name = $_FILES['xls_file']['name'];
        $file_path = $upload_dir . $name;
        $MAX_SIZE = 20000000;
        $flag = false;
        $strrpos=strrpos($name, ".");
        $basename=substr($name, 0, $strrpos);
        $strlen=strlen($name);
        $format=substr($name, $strrpos, $strlen);
        if(!is_dir($upload_dir))
        {
            if(!mkdir($upload_dir))
                echo $this->__("cannot create dir");
            if(!chmod($upload_dir,0755))
                echo $this->__("cannot chmod dir");
        }
        if($_FILES['xls_file']['size']>$MAX_SIZE)
            echo $this->__("File size cannot be larger than 20MB.");

        if($_FILES['xls_file']['size'] == 0)
            echo $this->__("Please select a file to upload.");

        if(!move_uploaded_file( $_FILES['xls_file']['tmp_name'], $file_path))
            echo $this->__("Unknow error occurred, please try again."); 

        switch($_FILES['xls_file']['error'])
        {
            case 0:
                $flag = true;
                //echo "success" ;
                break;
            case 1:
                echo $this->__("File size cannot be larger than 20MB.");
                break;
            case 2:
                echo $this->__("File size cannot be larger than 20MB.");
                break;
            case 3:
                echo $this->__("Unknow error occurred, please try again.");
                break;
            case 4:
                echo $this->__("Unknow error occurred, please try again.");
                break;
        }
        if($flag){
        	echo Mage::helper('topsport')->__("XML uploaded successfully. It might take several minutes to update the quantities of all the products.");
        }
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionEdit()
	{
		$model = $this->loadUser();
		$profile=$model->profile();
		// ajax validator
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo UActiveForm::validate(array($model,$profile));
			Yii::app()->end();
		}
		
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			
			if($model->validate()&&$profile->validate()) {
				$model->save();
				$profile->save();
				Yii::app()->user->setFlash('profileMessage',Yii::t("site","Changes is saved."));
				$this->redirect(array('/profile'));
			} else $profile->validate();
		}

		$this->render('edit',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}
	
	/**
	 * Change password
	 */
	public function actionChangepassword() {
		$model = new UserChangePassword;
		if (Yii::app()->user->id) {
			
			// ajax validator
			if(isset($_POST['ajax']) && $_POST['ajax']==='changepassword-form')
			{
				echo UActiveForm::validate($model);
				Yii::app()->end();
			}
			
			if(isset($_POST['UserChangePassword'])) {
					$model->attributes=$_POST['UserChangePassword'];
					if($model->validate()) {
						$new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
						$new_password->password = Functions::encrypting($model->password);
						$new_password->activkey=Functions::encrypting(microtime().$model->password);
						$new_password->save();
						Yii::app()->user->setFlash('profileMessage',Yii::t("site","New password is saved."));
						$this->redirect(array("profile"));
					}
			}
			$this->render('changepassword',array('model'=>$model));
	    }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser()
	{
		
		if($this->_model===null)
		{
			if(Yii::app()->user->id)
				$this->_model=User::model()->with('profile')->findbyPk(Yii::app()->user->id);
			if($this->_model===null)
				$this->redirect(Functions::$loginUrl);
		}
		return $this->_model;
	}
}