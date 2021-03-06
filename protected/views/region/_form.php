<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'region-form',
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
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->dropDownList($model, 'city_id', GxHtml::listDataEx(City::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'city_id'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('distributions')); ?></label>
		<?php echo $form->checkBoxList($model, 'distributions', GxHtml::encodeEx(GxHtml::listDataEx(Distribution::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->