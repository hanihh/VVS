<?php

Yii::import('application.models._base.BaseVoucher');

class Voucher extends BaseVoucher
{
    public $max;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}