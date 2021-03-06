<?php

/**
 * This is the model base class for the table "phone".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Phone".
 *
 * Columns in table "phone" available as properties of the model,
 * followed by relations of table "phone" available as properties of the model.
 *
 * @property integer $id
 * @property string $model
 * @property string $imei
 * @property string $create_date
 * @property string $deleted_at
 *
 * @property VendorMobile[] $vendorMobiles
 */
abstract class BasePhone extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'phone';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Phone|Phones', $n);
	}

	public static function representingColumn() {
		return 'model';
	}

	public function rules() {
		return array(
			array('model, imei, create_date', 'required'),
			array('model', 'length', 'max'=>255),
			array('imei', 'length', 'max'=>15),
			array('deleted_at', 'safe'),
			array('deleted_at', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, model, imei, create_date, deleted_at', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'vendorMobiles' => array(self::HAS_MANY, 'VendorMobile', 'phone_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'model' => Yii::t('app', 'Model'),
			'imei' => Yii::t('app', 'Imei'),
			'create_date' => Yii::t('app', 'Create Date'),
			'deleted_at' => Yii::t('app', 'Deleted At'),
			'vendorMobiles' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('model', $this->model, true);
		$criteria->compare('imei', $this->imei, true);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('deleted_at', $this->deleted_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}