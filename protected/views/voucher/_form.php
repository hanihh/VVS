<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'voucher-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model, 'code', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'distribution_voucher_id'); ?>
		<?php echo $form->dropDownList($model, 'distribution_voucher_id', GxHtml::listDataEx(DistributionVoucher::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'distribution_voucher_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ben_id'); ?>
		<?php echo $form->dropDownList($model, 'ben_id', GxHtml::listDataEx(Beneficiary::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'ben_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'vendor_id'); ?>
		<?php echo $form->dropDownList($model, 'vendor_id', GxHtml::listDataEx(Vendor::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'vendor_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->dropDownList($model, 'status_id', GxHtml::listDataEx(VoucherStatus::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'status_id'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('voucherHistories')); ?></label>
		<?php echo $form->checkBoxList($model, 'voucherHistories', GxHtml::encodeEx(GxHtml::listDataEx(VoucherHistory::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->