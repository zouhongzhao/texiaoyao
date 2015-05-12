<?php

class Category extends CActiveRecord {
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
	const STATUS_DRAFT = 1;
	const STATUS_PUBLISHED = 2;
	const STATUS_ARCHIVED = 3;

	private $_oldTags;

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		// array('title, content, status', 'required'),
		// array('status', 'in', 'range'=>array(1,2,3)),
		// array('title', 'length', 'max'=>128),
		// array('tags', 'match', 'pattern'=>'/^[\w\s,]+$/', 'message'=>'Tags can only contain word characters.'),
		// array('tags', 'normalizeTags'),
		//
		// array('title, status', 'safe', 'on'=>'search'),
		array('id, name,pname', 'safe', 'on' => 'search'), );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array('id' => 'Id', 'name' => '分类名', 'pname' => '父类名',
		// 'author_id' => 'Author',
		);
	}

	/**
	 * @return string the URL that shows the detail of the post
	 */
	public function getUrl() {
		return Yii::app() -> createUrl('post/view', array('id' => $this -> id, 'title' => $this -> title, ));
	}

	/**
	 * Retrieves the list of posts based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the needed posts.
	 */
	public function search() {
		$criteria = new CDbCriteria;
		$criteria -> compare('id', $this -> id, true);
		$criteria -> compare('name', $this -> name, true);
		$criteria -> compare('pname', $this -> pname, true);
		$criteria -> addSearchCondition('id', $this -> name);
		$criteria -> addSearchCondition('name', $this -> name);
		$criteria -> addSearchCondition('pname', $this -> pname);
		return new CActiveDataProvider('Category', array('criteria' => $criteria, 'sort' => array('defaultOrder' => 'id DESC', ), 'pagination' => array('pageSize' => 50), ));
	}

	public function categoryList() {
		
		$result = array();
		$sql_do = "SELECT * FROM {{category}}";
		$list = Yii::app() -> db -> createCommand($sql_do) -> queryAll();
		if (!empty($list)) {
			foreach ($list as $key => $value) {
				$data = array('id' => $value['id'], 'name' => $value['name']);
				if (isset($result[$value['pname']])) {
					array_push($result[$value['pname']], $data);
				} else {
					$result[$value['pname']] = array();
					array_push($result[$value['pname']], $data);
				}
			}

		}
		return $result;
	}

	public function checkCid($cid) {
		
		if (empty($cid)) {
			return false;
		}
		if(!is_numeric($cid) || strpos($cid,".")!==false){
		    $sql_do = "SELECT id,name FROM {{category}} where name like '%{$cid}%'";
		}else{
		   $sql_do = "SELECT id,name FROM {{category}} where id = {$cid}";
		}
		$result = array();
		$list = Yii::app() -> db -> createCommand($sql_do) -> queryRow();
		if(empty($list)){
			return false;
		}
		return $list;
	}

	function checkInteger($Number) {
		if ($Number > 1) {
			return (checkInteger($Number - 1));
		} elseif ($Number < 0) {
			return (checkInteger((-1) * $Number - 1));
			//取绝对值，把负数按整数分析
		} else {
			if (($Number > 0) AND ($Number < 1)) {
				return false;
			} else {
				return true;
			}
		}
	}

}
