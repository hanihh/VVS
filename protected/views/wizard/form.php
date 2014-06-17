
<?php
$distribution = Distribution::model();
$DistributionVoucher = DistributionVoucher::model();


$this->widget("ext.smartwizard.smartWizard",array(
               "onFinish"=>'onFinishCallback',
               "onLeaveStep"=>'leaveAStepCallback',//more options check attached documentation
               "id" => 'wizard',
               "tabs"=>array(
                  array(
                     "StepTitle"=>"Distribution Defination",
                     "stepDetails"=>"Choose the distribution basic information.",                    
                     "content"=>$this->renderPartial("//distribution/wizard_form",array('model' => $model),true,false)
                     ),
                   array(
                     "StepTitle"=>"Distribution Select.",
                     "stepDetails"=>"Enter distribution information",                    
                     "content"=>$this->renderPartial("Distribution",array(),true,false)
                     ),
                   array(
                     "StepTitle"=>"Define Voucher Type",
                     "stepDetails"=>"Fill your Profile details",                    
                     "content"=>$this->renderPartial("Distribution",array(),true,false)
                     ),
                   array(
                     "StepTitle"=>"Define Voucher Type",
                     "stepDetails"=>"Fill your Profile details",                    
                     "content"=>$this->renderPartial("Distribution",array(),true,false)
                     ),
                   array(
                     "StepTitle"=>"Define Voucher Type",
                     "stepDetails"=>"Fill your Profile details",                    
                     "content"=>$this->renderPartial("Distribution",array(),true,false)
                     ),
                  ),
         ));
?>

<script type="text/javascript">
  $(document).ready(function(){
        // Smart Wizard         
    $('#wizard').smartWizard({selected: 0,  // Selected Step, 0 = first step   
    keyNavigation: true, // Enable/Disable key navigation(left and right keys are used if enabled)
    enableAllSteps: false,  // Enable/Disable all steps on first load
    transitionEffect: 'fade', // Effect on navigation, none/fade/slide/slideleft
    contentURL:null, // specifying content url enables ajax content loading
    contentCache:true, // cache step contents, if false content is fetched always from ajax url
    cycleSteps: false, // cycle step navigation
    enableFinishButton: false, // makes finish button enabled always
    errorSteps:[],    // array of step numbers to highlighting as error steps
    labelNext:'Next', // label for Next button
    labelPrevious:'Previous', // label for Previous button
    labelFinish:'Finish',  // label for Finish button        
  // Events,
    onLeaveStep:leaveAStepCallback,
    onFinish:onFinishCallback
    });
 
      function leaveAStepCallback(obj){
        var step_num= obj.attr('rel'); // get the current step number
        return validateSteps(step_num); // return false to stay on step and true to continue navigation 
      }
       
      function onFinishCallback(){
       if(validateAllSteps()){
        $('form').submit();
       }
      }
       
      // Your Step validation logic
      function validateSteps(stepnumber){
        var isStepValid = true;
        // validate step 1
        switch (stepnumber) { 
            case 1:
                
            break;    
            }
            
          // Your step validation logic
          // set isStepValid = false if has errors
        return true;
      }
      function validateAllSteps(){
        var isStepValid = true;
        // all step validation logic     
        return isStepValid;
      }                    
      
  });
</script>