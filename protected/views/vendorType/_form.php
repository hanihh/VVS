<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'vendor-type-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
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
		<?php echo $form->labelEx($model,'internal'); ?>
		<?php echo $form->checkBox($model, 'internal'); ?>
		<?php echo $form->error($model,'internal'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('vendors')); ?></label>
		<?php echo $form->checkBoxList($model, 'vendors', GxHtml::encodeEx(GxHtml::listDataEx(Vendor::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->