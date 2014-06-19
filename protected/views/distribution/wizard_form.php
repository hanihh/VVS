<br />

<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'distribution-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($distribution); ?>
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
                    'onchange' => 'alert("hi")'
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
?>
</div><!-- form -->