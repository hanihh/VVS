<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'district-form',
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
		<?php echo $form->labelEx($model,'governerate_id'); ?>
		<?php echo $form->dropDownList($model, 'governerate_id', GxHtml::listDataEx(Governorate::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'governerate_id'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('subdistricts')); ?></label>
		<?php echo $form->checkBoxList($model, 'subdistricts', GxHtml::encodeEx(GxHtml::listDataEx(Subdistrict::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->