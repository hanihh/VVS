<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'vendor-mobile-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'distribution_id'); ?>
		<?php echo $form->dropDownList($model, 'distribution_id', GxHtml::listDataEx(Distribution::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'distribution_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'vendor_id'); ?>
		<?php echo $form->dropDownList($model, 'vendor_id', GxHtml::listDataEx(Vendor::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'vendor_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'phone_id'); ?>
		<?php echo $form->dropDownList($model, 'phone_id', GxHtml::listDataEx(Phone::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'phone_id'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->