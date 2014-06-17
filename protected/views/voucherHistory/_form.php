<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'voucher-history-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'voucher_id'); ?>
		<?php echo $form->dropDownList($model, 'voucher_id', GxHtml::listDataEx(Voucher::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'voucher_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->dropDownList($model, 'action', GxHtml::listDataEx(VoucherAction::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'action'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->