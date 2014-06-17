<?php

Yii::import('application.models._base.BaseProgram');

class Program extends BaseProgram
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function getForm() {
            return new CForm(array(
                'showErrorSummary'=>true,
                'elements'=>array(
                    'username'=>array(
                            'hint'=>'6-12 characters; letters, numbers, and underscore'
                    ),
                    'password'=>array(
                            'type'=>'password',
                            'hint'=>'8-12 characters; letters, numbers, and underscore; mixed case and at least 1 digit',
                    ),
                    'password_repeat'=>array(
                            'type'=>'password',
                            'hint'=>'Re-type your password',
                    ),
                    'email'=>array(
                            'hint'=>'Your e-mail address'
                    )
                ),
                'buttons'=>array(
                    'submit'=>array(
                            'type'=>'submit',
                            'label'=>'Next'
                    ),
                    'save_draft'=>array(
                            'type'=>'submit',
                            'label'=>'Save'
                    )
                )
            ), $this);
	}
}