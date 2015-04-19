<?php

class ShopController extends Controller {
	public $layout = 'column1';
	    /**
     * Declares the behaviors.
     * @return array the behaviors
     */
    public function behaviors()
    {
        return array(
            'seo'=>'ext.seo.components.SeoControllerBehavior',
        );
    }
    public function accessRules()
	{
		return array(
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('index','view', 'search','spider'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function filters() {
		$filters = array();
		$filters[] = 'accessControl';
		
		// do caching only if guest user
		if (Yii::app()->user->isGuest) {
			// output caching
			$filters[] = array(
					'COutputCache + index',
					'duration' => 3600,
					'varyByRoute' => true,
					'varyByParam' => array('id', 'category_id','page'),
			);
		}
		
		return $filters;
	}
	/**
	 * Declares class-based actions.
	 */
	public function actionIndex() {
		
// 		Yii::import("ext.yiiredis.*");
// 		$list = new ARedisList("aNameForYourListGoesHere");
// 		$list->add("cats");
// 		$list->add("dogs");
// 		$list->add("goods");
// 		foreach($list as $i => $val) {
// 			print_r($val) ;
// 			echo "<br />";
// 		}
// 		$list->clear(); // delete the list
// 		die;
		$categoryList = Category::model()->categoryList();
		$this -> render('index', array('model' => '1','categoryList'=>$categoryList));
	}

	public function actionSearch($category_id = '') {
		$category_id = htmlentities($category_id);
		
		if(empty($category_id)){
			 $this->redirect_message('未找到该数据','','5',Yii::app()->homeUrl);
		}
		//$category_id = htmlspecialchars($category_id);
		unset(Yii::app()->session['category_id']);
		unset(Yii::app()->session['name_flag']);
			//查找category_id
		$check = Category::model()->checkCid($category_id);
		
		if($check){
			$category = $check['name'];
			$category_id = $check['id'];
			Yii::app()->session['category_id']=$category_id;
		}else{
			Yii::app()->session['name_flag']=1;
			Yii::app()->session['category_id']=$category_id;
			$category = $category_id;
			 //$this->controller->redirect_message('未找到该数据','','5',Yii::app()->homeUrl);
		}
        // $_REQUEST['category_id'] = $category_id;
		
		$categoryList = Category::model()->categoryList();
		$model = new Shop('search');
		
		// $model->setAttribute('category_id',$category_id);
		// $model -> attributes = array('category_id'=>$category_id);
		$model->unsetAttributes();
		if (isset($_POST['Shop']) || isset($_GET['Shop'])){
			$model -> attributes = Yii::app()->request->getParam('Shop');
		}
		
		$this -> render('search', array('model' => $model,'category' => $category,'categoryList'=>$categoryList));
	}
	
	 /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		
		$model=new Shop;
		if(isset($_POST['Shop']))
		{
			// $shopArray['image'] = $_POST['shop_image'];
			$model->attributes=$_POST['Shop'];
			// $file = CUploadedFile::getInstanceByName('image');
			$file = CUploadedFile::getInstance($model,'image');   //获得一个CUploadedFile的实例  
            if(is_object($file)&&get_class($file) === 'CUploadedFile'){   // 判断实例化是否成功  
                $model->image = Yii::app()->request->hostInfo . '/upload/'.time().'_'.rand(0,9999).'.'.$file->extensionName;   //定义文件保存的名称  
            }else{
                $model->image = Yii::app()->request->hostInfo . '/upload/noPic.jpg';   // 若果失败则应该是什么图片  
            }  
            if($model->save()){  
                if(is_object($file)&&get_class($file) === 'CUploadedFile'){  
                    $file->saveAs(str_replace(Yii::app()->request->hostInfo, Yii::getPathOfAlias('webroot'), $model->image));    // 上传图片  
                }
				Yii::app()->session['login_status']='恭喜您,发布产品成功!';
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		$categoryList = Category::model()->categoryList();
		$this->render('create',array(
			'categoryList'=>$categoryList,
		));
	}
	
	public function actionSpider() {
		$this -> render('spider');
	}

}
