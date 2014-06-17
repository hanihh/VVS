<?php

Yii::import('application.models._base.BaseVendor');

class Vendor extends BaseVendor
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}