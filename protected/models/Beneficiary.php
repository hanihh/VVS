<?php

Yii::import('application.models._base.BaseBeneficiary');

class Beneficiary extends BaseBeneficiary
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function searchForVoucherAssignment () {
            $criteria = new CDbCriteria;
            if (isset($_GET['distribution_id']) and $_GET['distribution_id'] != 0) {
                $criteria->condition = "id not in (select distinct ben_id from voucher where distribution_voucher_id in (select id from `distribution_voucher` where distribution_id = ".$_GET['distribution_id']."))";
            }
            $criteria->compare('id', $this->id, true);
            $criteria->compare('registration_code', $this->registration_code	, true);
            $criteria->compare('status_id', $this->status_id);
            //$criteria->compare('family', $this->family);
            $criteria->compare('deleted_at', $this->deleted_at, true);
            $criteria->compare('remote_image', $this->remote_image, true);
            $criteria->compare('ar_name', $this->ar_name, true);
            $criteria->compare('family_member', $this->family_member, true);
            $criteria->compare('combine_household', $this->combine_household, true);
            $criteria->compare('main_income_source', $this->main_income_source, true);   
             return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'pagination' => array(
                                    'pageSize' => 20,
                                ),
            ));
        }
}