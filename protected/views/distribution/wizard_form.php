<br />

<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'distribution-form',
	'enableAjaxValidation' => true,
));

$this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
        'legend'=>'Create Distribution',
    ));
?>
        
	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php //echo $form->errorSummary($distribution); ?>
                <div class="row">
		<?php echo $form->labelEx($distribution,'program_id'); ?>
		<?php echo $form->dropDownList($distribution, 'program_id', GxHtml::listDataEx(Program::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($distribution,'program_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($distribution,'code'); ?>
		<?php echo $form->textField($distribution, 'code', array('maxlength' => 10)); ?>
		<?php echo $form->error($distribution,'code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($distribution,'start_date'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker',array(
                    'model'=>$distribution, //Model object
                    'attribute'=>'start_date', //attribute name
                    'mode'=>'date', //use "time","date" or "datetime" (default)
                    'language' => '',
                    'options'=>array("dateFormat"=>'yy-mm-dd') // jquery plugin options
                ));
                 ?>
		<?php echo $form->error($distribution,'start_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($distribution,'end_date'); ?>
		<?php 
                $this->widget('CJuiDateTimePicker',array(
                    'model'=>$distribution, //Model object
                    'attribute'=>'end_date', //attribute name
                    'mode'=>'date', //use "time","date" or "datetime" (default)
                    'language' => '',
                    'options'=>array("dateFormat"=>'yy-mm-dd') // jquery plugin options
                ));
                 ?>
		<?php echo $form->error($distribution,'end_date'); ?>
		</div><!-- row -->
                
                <?php
                echo "<label for='country_id'>Country</label>";
                echo CHtml::dropDownList('country_id','', GxHtml::listDataEx(Country::model()->findAllAttributes(null, true)),
                array(
                'empty'=>'-- Select Country --',
                'ajax' => array(
                'type'=>'POST', //request type
                'url'=>CController::createUrl('governorate/dynamiccities'), //url to call.
                'update'=>'#governorate_id', //selector to update
                ))); 

                echo "<label for='governorate_id'>Governorate/Province</label>";
                //empty since it will be filled by the other dropdown
                echo CHtml::dropDownList('governorate_id','', array(), 
                array(
                    'empty'=>'-- Select Governorate / Province --',
                    'ajax' => array(
                    'type'=>'POST', //request type
                    'url'=>CController::createUrl('district/dynamicdistricts'), //url to call.
                    'update'=>'#district_id', //selector to update
                    ))
                );
                echo "<label for='district_id'>District</label>";
                echo CHtml::dropDownList('district_id','', array(), 
                    array(
                    'empty'=>'-- Select District --',
                    'ajax' => array(
                    'type'=>'POST', //request type
                    'url'=>CController::createUrl('subdistrict/dynamicsubdistricts'), //url to call.
                    'update'=>'#subdistrict_id', //selector to update
                    'onchange' => ''
                    ))
                );
                
                echo "<label for='subdistrict_id'>Sub District</label>";
                echo CHtml::dropDownList('subdistrict_id','', array(), 
                    array(                
                    'empty'=>'-- Select Subdistrict --',
                    'ajax' => array(
                    'type'=>'POST', //request type
                    'url'=>CController::createUrl('community/dynamiccommunities'), //url to call.
                    'update'=>'#Distribution_region_id', //selector to update
                    ))
                );
                
                ?>
		<div class="row">
		<?php echo $form->labelEx($distribution,'region_id'); ?>
		<?php echo $form->dropDownList($distribution, 'region_id', array(), array('empty'=>'-- Select Community --',)); ?>
		<?php echo $form->error($distribution,'region_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($distribution,'status_id'); ?>
		<?php echo $form->dropDownList($distribution, 'status_id', GxHtml::listDataEx(DistributionStatus::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($distribution,'status_id'); ?>
		</div><!-- row -->
        <?php
        $this->endWidget();

        $this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
                'legend'=>'Or Choose Existing',
                'collapsed'=>true,

            ));

        Yii::app()->clientScript->registerScript('distribution_id_list', "
                $('#distribution_id_list').change(function() {
                    $('input[id=\"distribution_id\"').val($(this).val());
                    $('input[id=\"Distribution_code\"').val('');
                    $.fn.yiiGridView.update('distribution-voucher-grid', {
                            data: {distribution_id: $(this).val()}
                    });
                    $.fn.yiiGridView.update('beneficiary-grid', {
                            data: {distribution_id: $(this).val()}
                    });            
                    return false;
                });
            ");
        echo "Distribution : ";
        $distributionVousher = new DistributionVoucher();
        //echo $form->dropDownList($distributionVousher, 'distribution_id', GxHtml::encodeEx(GxHtml::listDataEx(Distribution::model()->findAllAttributes(null, true)), false, true)); 

        $data = CHtml::listData(Distribution::model()->findAll(array("condition"=>"status_id =  2")), 'id', 'code');
        $select = key($data);
        echo CHtml::dropDownList(
            'distribution_id_list',
            $select,            // selected item from the $data
            $data,       
            array(
                'style'=>'margin-bottom:10px;',
                'id'=>'distribution_id_list',
                'options' => array(),
            )
        );

        $this->endWidget();

        echo "<input type='hidden' name='distribution_id' id='distribution_id' value='0'>";

        $this->endWidget();
        ?>
        </div><!-- form -->