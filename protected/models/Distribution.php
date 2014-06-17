<?php

Yii::import('application.models._base.BaseDistribution');

class Distribution extends BaseDistribution
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}