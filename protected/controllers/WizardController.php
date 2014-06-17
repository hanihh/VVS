<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class WizardController extends GxController { 

    
    public function behaviors() { 
       return array( 
           'wizard'=>array( 
           'class'=>'application.extensions.wizard.WizardBehavior', 
           'steps'=>array('Program','Distribution','voucher_type'), 
           'events'=>array(
                'onStart'=>'wizardStart',
                'onProcessStep'=>'wizardProcessStep',
                'onFinished'=>'wizardFinished',
                'onInvalidStep'=>'wizardInvalidStep',
                'onSaveDraft'=>'wizardSaveDraft'
            ),
            'menuLastItem'=>'Submit'
           ) 
       ); 
    } 
    
    public function wizardProcessStep($event) {
            $this->render('form');
	}
    
    public function actionWizard($step=null) { 
        $this->process($step); 
    } 
    
    public function actionIndex() {
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'extensions/smartwizard/assets/js/jquery.smartWizard-2.0.min.js');
        $this->render('form');

    }
} 