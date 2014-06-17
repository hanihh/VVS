<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('memory_limit', '-1');
Yii::import('application.extensions.smartwizard');
        $this->widget("ext.smartwizard.smartWizard",array(
               "onFinish"=>'onFinishCallback',
               "onLeaveStep"=>'leaveAStepCallback',//more options check attached documentation
 
               "tabs"=>array(
                  array(
                     "StepTitle"=>"Account Details",
                     "stepDetails"=>"Fill your account details",                    
                     "content"=>$this->renderPartial("program",array(),true,false)
                     ),
                   array(
                     "StepTitle"=>"Profile Details",
                     "stepDetails"=>"Fill your Profile details",                    
                     "content"=>$this->renderPartial("program",array(),true,false)
                     ),
                 
                  ),         ));

?>