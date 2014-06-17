<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'beneficiary-attribute-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'beneficiary_id'); ?>
		<?php echo $form->dropDownList($model, 'beneficiary_id', GxHtml::listDataEx(Beneficiary::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'beneficiary_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'attribute_id'); ?>
		<?php echo $form->dropDownList($model, 'attribute_id', GxHtml::listDataEx(Attribute::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'attribute_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model, 'value', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'value'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->