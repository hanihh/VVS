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

	<?php echo $form->errorSummary($model); ?>
                <div class="row">
		<?php echo $form->labelEx($model,'program_id'); ?>
		<?php echo $form->dropDownList($model, 'program_id', GxHtml::listDataEx(Program::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'program_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model, 'code', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker',array(
                    'model'=>$model, //Model object
                    'attribute'=>'start_date', //attribute name
                    'mode'=>'date', //use "time","date" or "datetime" (default)
                    'language' => '',
                    'options'=>array("dateFormat"=>'yy-mm-dd') // jquery plugin options
                ));
                 ?>
		<?php echo $form->error($model,'start_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php 
                $this->widget('CJuiDateTimePicker',array(
                    'model'=>$model, //Model object
                    'attribute'=>'end_date', //attribute name
                    'mode'=>'date', //use "time","date" or "datetime" (default)
                    'language' => '',
                    'options'=>array("dateFormat"=>'yy-mm-dd') // jquery plugin options
                ));
                 ?>
		<?php echo $form->error($model,'end_date'); ?>
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
		<?php echo $form->labelEx($model,'region_id'); ?>
		<?php echo $form->dropDownList($model, 'region_id', array(), array('empty'=>'-- Select Community --',)); ?>
		<?php echo $form->error($model,'region_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->dropDownList($model, 'status_id', GxHtml::listDataEx(DistributionStatus::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'status_id'); ?>
		</div><!-- row -->
<?php
$this->endWidget();
?>
</div><!-- form -->