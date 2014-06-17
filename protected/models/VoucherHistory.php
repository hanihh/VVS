<?php

Yii::import('application.models._base.BaseVoucherHistory');

class VoucherHistory extends BaseVoucherHistory
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}