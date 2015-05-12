<?php

class PostController extends Controller
{
	public $layout='column2';

    public $operations;

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

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
    
	/**
	 * @return array action filters
	 */

	public function filters() {
    	$filters = array();
    	$filters[] = 'accessControl';
    
    	// do caching only if guest user
    	if (Yii::app()->user->isGuest) {
    		// output caching
    		$filters[] = array(
    				'COutputCache + view,preview',
    				'duration' => 3600,
    				'varyByRoute' => true,
    				'varyByParam' => array('id', 'category_id','page'),
    		);
    	}
    	return $filters;
    }
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('index','view', 'search', 'postedInMonth'),
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

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$post=$this->loadModel();
		$comment=$this->newComment($post);
		$this->render('view',array(
			'model'=>$post,
			'comment'=>$comment,
		));
	}

    // {{{ actionPreview
    public function actionPreview()
    {
        $parser=new CMarkdownParser;
        echo $parser->safeTransform($_POST['Post'][Yii::app()->request->getParam('attribute')]);
    } // }}} 

    /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Post;
		
		if(isset($_POST['Post']))
		{
			if(isset($_POST['Area'])){
					$area = implode(',', $_POST['Area']);
					$_POST['Post']['area'] = $area;
			}
			//print_r($_POST['Post']);die;
			$model->attributes=$_POST['Post'];
			
			$file = CUploadedFile::getInstance($model,'images');   //获得一个CUploadedFile的实例  
            if(is_object($file)&&get_class($file) === 'CUploadedFile'){   // 判断实例化是否成功  
                $model->images = Yii::app()->request->hostInfo . '/upload/'.time().'_'.rand(0,9999).'.'.$file->extensionName;   //定义文件保存的名称  
            }else{
                $model->images = Yii::app()->request->hostInfo . '/upload/noPic.jpg';   // 若果失败则应该是什么图片  
            }
			if($model->save()){
				 if(is_object($file)&&get_class($file) === 'CUploadedFile'){  
                    $file->saveAs(str_replace(Yii::app()->request->hostInfo, Yii::getPathOfAlias('webroot'), $model->images));    // 上传图片  
                }
				 $this->redirect(array('view','id'=>$model->id));
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		
		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			$model->address = $_POST['Post']['address'];
			$file = CUploadedFile::getInstance($model,'images');   //获得一个CUploadedFile的实例  
            if(is_object($file)&&get_class($file) === 'CUploadedFile'){   // 判断实例化是否成功  
                $model->images = Yii::app()->request->hostInfo . '/upload/'.time().'_'.rand(0,9999).'.'.$file->extensionName;   //定义文件保存的名称  
            }else{
                $model->images = $_POST['Post']['old_images'];  // 若果失败则应该是什么图片  
            }
			if($model->save()){
				 if(is_object($file)&&get_class($file) === 'CUploadedFile'){  
                    $file->saveAs(str_replace(Yii::app()->request->hostInfo, Yii::getPathOfAlias('webroot'), $model->images));    // 上传图片  
                }
				 $this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria(array(
			'condition'=>'t.status='.Post::STATUS_PUBLISHED,
			'order'=>'update_time DESC',
			'with'=>array('commentCount','author.profile'),
		));
		$criteria1=new CDbCriteria(array(
			'condition'=>'t.status='.Post::STATUS_PUBLISHED,
			'order'=>'update_time DESC',
			'with'=>array('commentCount','author.profile'),
		));
		$tag = Yii::app()->request->getParam('tag');
		$tag = htmlspecialchars($tag);
		if(!empty($tag)){
			$criteria->addSearchCondition('tags',$tag);
			$criteria1->addSearchCondition('tags',$tag);
		}
		if(isset($_POST['SiteSearchForm'])) {
			$criteria->addSearchCondition('content',$_POST['SiteSearchForm']['string']);
			$criteria1->addSearchCondition('content',$_POST['SiteSearchForm']['string']);
		} 
		$dataProvider0=new CActiveDataProvider('Post', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria->addCondition('type=0'),
		));
		
		$dataProvider1=new CActiveDataProvider('Post', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria1->addCondition('type=1'),
		));
		$this->render('index',array(
			'dataProvider0'=>$dataProvider0,
			'dataProvider1'=>$dataProvider1,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Post('search');
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Suggests tags based on the current user input.
	 * This is called via AJAX when the user is entering the tags input.
	 */
	public function actionSuggestTags()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$tags=Tag::model()->suggestTags($keyword);
			if($tags!==array())
				echo implode("\n",$tags);
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				if(Yii::app()->user->isGuest)
					$condition='t.status='.Post::STATUS_PUBLISHED.' OR t.status='.Post::STATUS_ARCHIVED;
				else
					$condition='';
				$this->_model=Post::model()->with('author','author.profile')->findByPk(Yii::app()->request->getParam('id'), $condition);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Creates a new comment.
	 * This method attempts to create a new comment based on the user input.
	 * If the comment is successfully created, the browser will be redirected
	 * to show the created comment.
	 * @param Post the post that the new comment belongs to
	 * @return Comment the comment instance
	 */
	protected function newComment($post)
	{
		$comment=new Comment;
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($post->addComment($comment))
			{
				if($comment->status==Comment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		return $comment;
	}
	/**
         * Sitewide search.
         * Shows a particular post searched.
         */
        public function actionSearch()
        {
		$search = new SiteSearchForm;
                
		if(isset($_POST['SiteSearchForm'])) {
			$search->attributes = $_POST['SiteSearchForm'];
			$_GET['searchString'] = $search->string;
		} else {
			$search->string = $_GET['searchString'];
		}
		
		$criteria = new CDbCriteria(array(
			'condition' => 't.status='.Post::STATUS_PUBLISHED.' AND (t.title LIKE :keyword OR t.intro LIKE :keyword OR t.content LIKE :keyword)',
			'order' => 't.create_time DESC',
			'with'=>array('commentCount','author.profile'),
			'params' => array(
				':keyword' => '%'.$search->string.'%',
			),
		));
                
		$postCount = Post::model()->count($criteria);
		$pages = new CPagination($postCount);
		$pages->pageSize = Yii::app()->params['postsPerPage'];
		$pages->applyLimit($criteria);
                
		$posts = Post::model()->findAll($criteria);
						    
		$this->render('found',array(
			'posts' => $posts,
			'pages' => $pages,
			'search' => $search,
		));

        }

        /**                                                                                                     
         * Collect posts issued on specific date                                                                
         */
        public function actionPostedOnDate()
        {
		$month = date('n', $_GET['time']);
		$date = date('j', $_GET['time']);
		$year = date('Y', $_GET['time']);

		$criteria = new CDbCriteria(array(
			'condition' => 'status='.Post::STATUS_PUBLISHED.' AND create_time > :time1 AND create_time < :time2',
			'order' => 'update_time DESC',
			'params' => array(
				':time1' => ($theDay = mktime(0,0,0,$month,$date,$year)),
				':time2' => mktime(0,0,0,$month,$date+1,$year)),
		));

		$pages = new CPagination(Post::model()->count($criteria));
		$pages->pageSize = Yii::app()->params['postsPerPage'];
		$pages->applyLimit($criteria);

		$posts = Post::model()->with('author')->findAll($criteria);

		$this->render('date',array(
			'posts' => $posts,
                        'pages' => $pages,
                        'theDay' => $theDay,
		));
        }

	/**
         * Collect posts issued in specific month
         */
        public function actionPostedInMonth()
        {
		$month = date('n', $_GET['time']);
		$year = date('Y', $_GET['time']);
		if ($_GET['pnc'] == 'n') $month++;
		if ($_GET['pnc'] == 'p') $month--;

		$criteria = new CDbCriteria(array(
			'condition' => 'status = '.Post::STATUS_PUBLISHED.' AND create_time > :time1 AND create_time < :time2',
			'order' => 'update_time DESC',
			'params' => array(
				':time1' => ($firstDay = mktime(0,0,0,$month,1,$year)),
				':time2' => mktime(0,0,0,$month+1,1,$year)),
		));

		$pages = new CPagination(Post::model()-> count($criteria));
		$pages->pageSize = Yii::app()->params['postsPerPage'];
		$pages->applyLimit($criteria);

		$posts = Post::model()->with('author')->findAll($criteria);

		$this->render('month',array(
			'posts' => $posts,
			'pages' => $pages,
			'firstDay' => $firstDay,
		));
        }

	 public function actionImageUp(){
	 	Yii::import('application.libs.*');
		require_once('Uploader.php');
	 	// include "Uploader.class.php";
	   //上传图片框中的描述表单名称，
	    $title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES);
	    $path = htmlspecialchars($_POST['dir'], ENT_QUOTES);
	
	    //上传配置
	    $config = array(
	        "savePath" => ($path == "1" ? "upload/" : "upload1/"),
	        "maxSize" => 1000, //单位KB
	        "allowFiles" => array(".gif", ".png", ".jpg", ".jpeg", ".bmp")
	    );
	
	    //生成上传实例对象并完成上传
	    $up = new Uploader("upfile", $config);
	
	    /**
	     * 得到上传文件所对应的各个参数,数组结构
	     * array(
	     *     "originalName" => "",   //原始文件名
	     *     "name" => "",           //新文件名
	     *     "url" => "",            //返回的地址
	     *     "size" => "",           //文件大小
	     *     "type" => "" ,          //文件类型
	     *     "state" => ""           //上传状态，上传成功时必须返回"SUCCESS"
	     * )
	     */
	    $info = $up->getFileInfo();
	
	    /**
	     * 向浏览器返回数据json数据
	     * {
	     *   'url'      :'a.jpg',   //保存后的文件路径
	     *   'title'    :'hello',   //文件描述，对图片来说在前端会添加到title属性上
	     *   'original' :'b.jpg',   //原始文件名
	     *   'state'    :'SUCCESS'  //上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
	     * }
	     */
	    echo "{'url':'" . $info["url"] . "','title':'" . $title . "','original':'" . $info["originalName"] . "','state':'" . $info["state"] . "'}";


	 }

 public function actionImageManager(){
 	//需要遍历的目录列表，最好使用缩略图地址，否则当网速慢时可能会造成严重的延时
    $paths = array('/upload','/upload1');

    $action = htmlspecialchars( $_POST[ "action" ] );
    if ( $action == "get" ) {
        $files = array();
		
        foreach ( $paths as $path){
        	$path = Yii::getPathOfAlias('webroot').$path;
            $tmp = Post::model()->getfiles( $path );
            if($tmp){
                $files = array_merge($files,$tmp);
            }
        }
        if ( !count($files) ) return;
        rsort($files,SORT_STRING);
        $str = "";
        foreach ( $files as $file ) {
        	$file = str_replace(Yii::getPathOfAlias('webroot'), '', $file);
            $str .= $file . "ue_separate_ue";
        }
        echo $str;
    }
 }
    public function actionInsertViews(){
    	$id = $_POST['id'];
		$post=Post::model()->findByPk($id);
		$post->views=$post->views+'1';
		$post->save(); //
		echo 'ok';
    }
 
 
}
