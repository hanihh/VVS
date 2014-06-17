<?php

/**
 * This is the model base class for the table "country".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Country".
 *
 * Columns in table "country" available as properties of the model,
 * followed by relations of table "country" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $create_date
 * @property string $deleted_at
 *
 * @property Governorate[] $governorates
 */
abstract class BaseCountry extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'country';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Country|Countries', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, code, create_date', 'required'),
			array('name', 'length', 'max'=>20),
			array('code', 'length', 'max'=>10),
			array('deleted_at', 'safe'),
			array('deleted_at', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, code, create_date, deleted_at', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'governorates' => array(self::HAS_MANY, 'Governorate', 'country_id'),
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
			'code' => Yii::t('app', 'Code'),
			'create_date' => Yii::t('app', 'Create Date'),
			'deleted_at' => Yii::t('app', 'Deleted At'),
			'governorates' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('code', $this->code, true);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('deleted_at', $this->deleted_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}