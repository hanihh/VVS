<?php

Yii::import('application.models._base.BaseVoucherAction');

class VoucherAction extends BaseVoucherAction
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}