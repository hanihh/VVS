<?php

Yii::import('application.models._base.BasePhone');

class Phone extends BasePhone
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}