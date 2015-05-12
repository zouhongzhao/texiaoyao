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
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
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
        echo $parser->safeTransform($_POST['Post'][$_GET['attribute']]);
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
			$model->attributes=$_POST['Post'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
			'condition'=>'status='.Post::STATUS_PUBLISHED,
			'order'=>'update_time DESC',
			'with'=>'commentCount',
		));
		if(isset($_GET['tag']))
			$criteria->addSearchCondition('tags',$_GET['tag']);

		$dataProvider=new CActiveDataProvider('Post', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
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
					$condition='status='.Post::STATUS_PUBLISHED.' OR status='.Post::STATUS_ARCHIVED;
				else
					$condition='';
				$this->_model=Post::model()->findByPk($_GET['id'], $condition);
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
			'condition' => 'status='.Post::STATUS_PUBLISHED.' AND (title LIKE :keyword OR intro LIKE :keyword OR content LIKE :keyword)',
			'order' => 'create_time DESC',
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
}
