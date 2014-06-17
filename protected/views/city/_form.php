<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'city-form',
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
		<?php echo $form->labelEx($model,'province_id'); ?>
		<?php echo $form->dropDownList($model, 'province_id', GxHtml::listDataEx(Province::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'province_id'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('regions')); ?></label>
		<?php echo $form->checkBoxList($model, 'regions', GxHtml::encodeEx(GxHtml::listDataEx(Region::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->