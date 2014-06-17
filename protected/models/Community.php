<?php

Yii::import('application.models._base.BaseCommunity');

class Community extends BaseCommunity
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}