<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'beneficiary-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model, 'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'update_date'); ?>
		<?php echo $form->textField($model, 'update_date'); ?>
		<?php echo $form->error($model,'update_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'registration_code'); ?>
		<?php echo $form->textField($model, 'registration_code', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'registration_code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->dropDownList($model, 'status_id', GxHtml::listDataEx(BeneficiaryStatus::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'status_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'neighborhood_id'); ?>
		<?php echo $form->dropDownList($model, 'neighborhood_id', GxHtml::listDataEx(Community::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'neighborhood_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'deleted_at'); ?>
		<?php echo $form->textField($model, 'deleted_at'); ?>
		<?php echo $form->error($model,'deleted_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'remote_image'); ?>
		<?php echo $form->textArea($model, 'remote_image'); ?>
		<?php echo $form->error($model,'remote_image'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ar_name'); ?>
		<?php echo $form->textField($model, 'ar_name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'ar_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'en_name'); ?>
		<?php echo $form->textField($model, 'en_name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'en_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model, 'phone_number', array('maxlength' => 15)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'family_member'); ?>
		<?php echo $form->textField($model, 'family_member'); ?>
		<?php echo $form->error($model,'family_member'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'main_income_source'); ?>
		<?php echo $form->enumDropDownList($model, 'main_income_source'); ?>
		<?php echo $form->error($model,'main_income_source'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'combine_household'); ?>
		<?php echo $form->enumDropDownList($model, 'combine_household'); ?>
		<?php echo $form->error($model,'combine_household'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('beneficiaryAttributes')); ?></label>
		<?php echo $form->checkBoxList($model, 'beneficiaryAttributes', GxHtml::encodeEx(GxHtml::listDataEx(BeneficiaryAttribute::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('vouchers')); ?></label>
		<?php echo $form->checkBoxList($model, 'vouchers', GxHtml::encodeEx(GxHtml::listDataEx(Voucher::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->