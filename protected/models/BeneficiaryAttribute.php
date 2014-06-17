<?php

Yii::import('application.models._base.BaseBeneficiaryAttribute');

class BeneficiaryAttribute extends BaseBeneficiaryAttribute
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}