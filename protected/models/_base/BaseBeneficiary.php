<?php

/**
 * This is the model base class for the table "beneficiary".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Beneficiary".
 *
 * Columns in table "beneficiary" available as properties of the model,
 * followed by relations of table "beneficiary" available as properties of the model.
 *
 * @property integer $id
 * @property string $create_date
 * @property string $update_date
 * @property string $registration_code
 * @property integer $status_id
 * @property integer $neighborhood_id
 * @property string $deleted_at
 * @property string $remote_image
 * @property string $ar_name
 * @property string $en_name
 * @property string $phone_number
 * @property integer $family_member
 * @property string $main_income_source
 * @property string $combine_household
 *
 * @property Community $neighborhood
 * @property BeneficiaryStatus $status
 * @property BeneficiaryAttribute[] $beneficiaryAttributes
 * @property Voucher[] $vouchers
 */
abstract class BaseBeneficiary extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'beneficiary';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Beneficiary|Beneficiaries', $n);
	}

	public static function representingColumn() {
		return 'registration_code';
	}

	public function rules() {
		return array(
			array('registration_code, en_name', 'required'),
			array('status_id, neighborhood_id, family_member', 'numerical', 'integerOnly'=>true),
			array('registration_code', 'length', 'max'=>20),
			array('ar_name, en_name', 'length', 'max'=>255),
			array('phone_number', 'length', 'max'=>15),
			array('main_income_source', 'length', 'max'=>27),
			array('combine_household', 'length', 'max'=>22),
			array('create_date, update_date, deleted_at, remote_image', 'safe'),
			array('create_date, update_date, status_id, neighborhood_id, deleted_at, remote_image, ar_name, phone_number, family_member, main_income_source, combine_household', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, create_date, update_date, registration_code, status_id, neighborhood_id, deleted_at, remote_image, ar_name, en_name, phone_number, family_member, main_income_source, combine_household', 'safe', 'on'=>'search'),
        		array('id, registration_code, status_id, neighborhood_id, ar_name, en_name, phone_number, family_member, main_income_source, combine_household', 'safe', 'on'=>'searchForVoucherAssignment'),

		);
	}

	public function relations() {
		return array(
			'neighborhood' => array(self::BELONGS_TO, 'Community', 'neighborhood_id'),
			'status' => array(self::BELONGS_TO, 'BeneficiaryStatus', 'status_id'),
			'beneficiaryAttributes' => array(self::HAS_MANY, 'BeneficiaryAttribute', 'beneficiary_id'),
			'vouchers' => array(self::HAS_MANY, 'Voucher', 'ben_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'create_date' => Yii::t('app', 'Create Date'),
			'update_date' => Yii::t('app', 'Update Date'),
			'registration_code' => Yii::t('app', 'Registration Code'),
			'status_id' => null,
			'neighborhood_id' => null,
			'deleted_at' => Yii::t('app', 'Deleted At'),
			'remote_image' => Yii::t('app', 'Remote Image'),
			'ar_name' => Yii::t('app', 'Ar Name'),
			'en_name' => Yii::t('app', 'En Name'),
			'phone_number' => Yii::t('app', 'Phone Number'),
			'family_member' => Yii::t('app', 'Family Member'),
			'main_income_source' => Yii::t('app', 'Main Income Source'),
			'combine_household' => Yii::t('app', 'Combine Household'),
			'neighborhood' => null,
			'status' => null,
			'beneficiaryAttributes' => null,
			'vouchers' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('update_date', $this->update_date, true);
		$criteria->compare('registration_code', $this->registration_code, true);
		$criteria->compare('status_id', $this->status_id);
		$criteria->compare('neighborhood_id', $this->neighborhood_id);
		$criteria->compare('deleted_at', $this->deleted_at, true);
		$criteria->compare('remote_image', $this->remote_image, true);
		$criteria->compare('ar_name', $this->ar_name, true);
		$criteria->compare('en_name', $this->en_name, true);
		$criteria->compare('phone_number', $this->phone_number, true);
		$criteria->compare('family_member', $this->family_member);
		$criteria->compare('main_income_source', $this->main_income_source, true);
		$criteria->compare('combine_household', $this->combine_household, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}