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
                     "content"=>$this->renderPartial("//distribution/wizard_form",array('distribution' => $distribution),true,false)
                     ),
                   array(
                     "StepTitle"=>"Distribution Vouchers",
                     "stepDetails"=>"Select distribution vouchers",                    
                     "content"=>$this->renderPartial("//distributionvoucher/wizard_form",array('DistributionVoucher' => $DistributionVoucher),true,false)
                     ),
                   array(
                     "StepTitle"=>"Choose Beneficiaries",
                     "stepDetails"=>"Choose The Eligible Beneficiaries",                    
                     "content"=>$this->renderPartial("//voucher/generatewizard",array(),true,false)
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
            case "1":
                var data=$("#distribution-form").serialize();
                if ($('input[id="Distribution_code"').val() != '') {
                $.ajax({
                type: "POST",
                url:    "<? echo Yii::app()->createUrl('distribution/Createwithoutvalidation'); ?>",
                data: data,
                success: function(msg){
                     $('input[id="distribution_id"').val(msg);
                     $.fn.yiiGridView.update('beneficiary-grid', {
                        data: {distribution_id : msg}
                     });
                    },
                error: function(xhr){
                alert("failure"+xhr.readyState+this.url)

                }
              });
              }
              $('input[id="DistributionVoucher_distribution_id"').val($('input[id="distribution_id"').val());
            break;   
            case "2": 
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
      
      $("#btnsavedistributionvoucher").click(function(){
          var data=$("#distribution-voucher-form").serialize();
          $.ajax({
                type: "POST",
                url:    "<? echo Yii::app()->createUrl('distributionvoucher/Createwithoutvalidation'); ?>",
                data: data,
                success: function(msg){
                    $("#DistributionVoucher_code").val("");
                    $.fn.yiiGridView.update('distribution-voucher-grid', {
                            data: {distribution_id: $("#DistributionVoucher_distribution_id").val()}
                    });
                    //$("#DistributionVoucher_code").val("");
                     //$("#DistributionVoucher_distribution_id").val(msg);
                    },
                error: function(xhr){
                alert("failure"+xhr.readyState+this.url)

                }
              });
      });
      
      $("#btnsavebeneficiaries").click(function(){
          var data=$("#generate-voucher-form").serialize();
          $.ajax({
                type: "POST",
                url:    "<? echo Yii::app()->createUrl('/voucher/generate'); ?>",
                data: data,
                success: function(msg){
                    $.fn.yiiGridView.update('beneficiary-grid', {
                            data: {distribution_id: $("#distribution_id").val()}
                    });
                    //$("#DistributionVoucher_code").val("");
                     //$("#DistributionVoucher_distribution_id").val(msg);
                    },
                error: function(xhr){
                alert("failure"+xhr.readyState+this.url)

                }
              });
      });
  });
</script>