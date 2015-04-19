<?php

class Shop extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_post':
	 * @var integer $id
	 * @var string $title
	 * @var string $content
	 * @var string $tags
	 * @var integer $status
	 * @var integer $create_time
	 * @var integer $update_time
	 * @var integer $author_id
	 */
	const STATUS_DRAFT=1;
	const STATUS_PUBLISHED=2;
	const STATUS_ARCHIVED=3;

	private $_oldTags;

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
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

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('price', 'required'),
			array('url', 'required'),
			array('store', 'required'),
			array('category_id', 'required'),
			array('image',  
                    'file',    //定义为file类型  
                    'allowEmpty'=>true,   
                    'types'=>'jpg,png,gif,doc,docx,pdf,xls,xlsx,zip,rar,ppt,pptx',   //上传文件的类型  
                    'maxSize'=>1024*1024*10,    //上传大小限制，注意不是php.ini中的上传文件大小  
                    'tooLarge'=>'文件大于10M，上传失败！请上传小于10M的文件！'  
                ),  
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => '药名',
			'content' => '药品详情',
			'price' => '价格',
			'url' => '药品链接',
			'store' => '药店',
			'creat_time' => '更新',
			'comment' => '评论数',
			'type' => '药店类型',
			'stock' => '药品库存',
			'category_id' => '所属分类',
			'original_price' => '原价',
			'image' => '药品图片',
			'drugstore' => '药店logo',
			'remark' => '备注',
			'description'=>'说明'
		);
	}

	/**
	 * @return string the URL that shows the detail of the post
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('post/view', array(
			'id'=>$this->id,
			'title'=>$this->title,
		));
	}
	/**
	 * Retrieves the list of posts based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the needed posts.
	 */
	public function search()
	{
		$category_id = Yii::app()->session['category_id'];
		$name_flag = Yii::app()->session['name_flag'];
		$criteria=new CDbCriteria;
		if(isset($name_flag) && $name_flag == 1){
			if($category_id != '特效药'){
				$criteria->addSearchCondition('name',$category_id);
			}
		}else{
			$criteria->addCondition("category_id = {$category_id}"); 
		}
        
		$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('store',$this->store,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('creat_time',$this->creat_time,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->addSearchCondition('name',$this->name);
		$criteria->addSearchCondition('price',$this->price);
		$criteria->addSearchCondition('store',$this->store);
		$criteria->addSearchCondition('type',$this->type);
		$criteria->addSearchCondition('creat_time',$this->creat_time);
		$criteria->addSearchCondition('comment',$this->comment);
		// $criteria->addSearchCondition('category_id',$this->category_id);
		// $criteria->order = Yii::app()->request->getParam('sort');
        $sort = new CSort();
        $sort->attributes =
                array(
                   'name'  =>array( 'asc'   =>  'name',
                                     'desc'  =>  'name desc', ),
                   'price'  =>array( 'asc'   =>  '(price + 0)',
                                     'desc'  =>  '(price + 0) desc',
                      )
        );
		 $sort->defaultOrder = 'creat_time desc';
		return new CActiveDataProvider('Shop', array(
			'criteria' =>$criteria,
			'sort' => $sort,
			// 'sort'=>array( 
				// 'defaultOrder'=>'id,creat_time ASC',
			// ),
			'pagination'=>array(
				'pageSize'=>20
			), 
		));
	}
	static function getShopTypes()
	{ 
		return array(
		    array('id'=>'1', 'title'=>'第三方'),
		    array('id'=>'0', 'title'=>'自营'),
		    //array('id'=>'', 'title'=>'所有'),
		);
	}
	static function getShopType($type)
	{
		if($type == 1){
			  return '第三方';
		}elseif($type == 0){
			 return '自营';
		}
		// elseif($type == ''){
			 // return '所有';
		// }
		   
	}
}