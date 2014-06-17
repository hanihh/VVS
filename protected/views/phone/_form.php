<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'phone-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model, 'model', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'model'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'imei'); ?>
		<?php echo $form->textField($model, 'imei', array('maxlength' => 15)); ?>
		<?php echo $form->error($model,'imei'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model, 'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'deleted_at'); ?>
		<?php echo $form->textField($model, 'deleted_at'); ?>
		<?php echo $form->error($model,'deleted_at'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('vendorMobiles')); ?></label>
		<?php echo $form->checkBoxList($model, 'vendorMobiles', GxHtml::encodeEx(GxHtml::listDataEx(VendorMobile::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->