<?php

/**
 * This is the model base class for the table "city".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "City".
 *
 * Columns in table "city" available as properties of the model,
 * followed by relations of table "city" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $create_date
 * @property string $deleted_at
 * @property integer $province_id
 *
 * @property Province $province
 * @property Region[] $regions
 */
abstract class BaseCity extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'city';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'City|Cities', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, create_date, province_id', 'required'),
			array('province_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('deleted_at', 'safe'),
			array('deleted_at', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, create_date, deleted_at, province_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'province' => array(self::BELONGS_TO, 'Province', 'province_id'),
			'regions' => array(self::HAS_MANY, 'Region', 'city_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'create_date' => Yii::t('app', 'Create Date'),
			'deleted_at' => Yii::t('app', 'Deleted At'),
			'province_id' => null,
			'province' => null,
			'regions' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('deleted_at', $this->deleted_at, true);
		$criteria->compare('province_id', $this->province_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}