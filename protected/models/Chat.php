<?php

class Chat extends CActiveRecord
{

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
		return '{{chat}}';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('content', 'required'),
				array('send_date', 'required'),
				array('ip', 'required'),
		);
	}
	public function attributeLabels()
	{
		return array(
				'username'            => Yii::t('blog','Name'),
				'content'         => Yii::t('blog','Reply'),
		);
	}

	public function getAll()
	{
		return $this->findAll(array(
				'order'=>'send_date DESC',
		));
	}
	
	public function getSome($limit=10)
	{
		return $this->findAll(array(
				'order'=>'send_date DESC',
				'limit'=>$limit,
		));
	}
}