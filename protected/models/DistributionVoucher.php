<?php

Yii::import('application.models._base.BaseDistributionVoucher');

class DistributionVoucher extends BaseDistributionVoucher
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function searchForVoucherAssignment () {
            $criteria = new CDbCriteria;
            if (isset($_GET['distribution_id']) and $_GET['distribution_id'] != 0) {
                $criteria->condition = "distribution_id = ".$_GET['distribution_id'];
            }
            $criteria->compare('id', $this->id, true);
            //$criteria->compare('family', $this->family);
            //$criteria->compare('value', $this->value, true);
             return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'pagination' => array(
                                    'pageSize' => 20,
                                ),
            ));
        }
}