<?php

class Shop extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_tag':
	 * @var integer $id
	 * @var string $name
	 * @var integer $frequency
	 */

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
			array('image', 'required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
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
			'description' => '药品详情',
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
		);
	}

	
	public function search()
    {
        $criteria=new CDbCriteria;

        $criteria->compare('name',$this->name,true);

        return new CActiveDataProvider('Shop', array(
            'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'creat_time DESC',
            ),
        ));
    }
}