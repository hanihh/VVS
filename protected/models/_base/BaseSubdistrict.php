<?php

/**
 * This is the model base class for the table "subdistrict".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Subdistrict".
 *
 * Columns in table "subdistrict" available as properties of the model,
 * followed by relations of table "subdistrict" available as properties of the model.
 *
 * @property integer $id
 * @property string $code
 * @property string $ar_name
 * @property string $en_name
 * @property integer $district_id
 *
 * @property Community[] $communities
 * @property District $district
 */
abstract class BaseSubdistrict extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'subdistrict';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Subdistrict|Subdistricts', $n);
	}

	public static function representingColumn() {
		return 'en_name';
	}

	public function rules() {
		return array(
			array('code, en_name, district_id', 'required'),
			array('district_id', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>10),
			array('ar_name, en_name', 'length', 'max'=>255),
			array('ar_name', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, code, ar_name, en_name, district_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'communities' => array(self::HAS_MANY, 'Community', 'subdistrict_id'),
			'district' => array(self::BELONGS_TO, 'District', 'district_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'code' => Yii::t('app', 'Code'),
			'ar_name' => Yii::t('app', 'Ar Name'),
			'en_name' => Yii::t('app', 'En Name'),
			'district_id' => null,
			'communities' => null,
			'district' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('code', $this->code, true);
		$criteria->compare('ar_name', $this->ar_name, true);
		$criteria->compare('en_name', $this->en_name, true);
		$criteria->compare('district_id', $this->district_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}