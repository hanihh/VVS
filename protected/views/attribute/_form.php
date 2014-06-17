<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'attribute-form',
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
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<?php $model->create_date = NULL; ?>
		<div class="row">
		<?php echo $form->labelEx($model,'valid'); ?>
		Yes <?php echo $form->radioButton($model, 'valid', array('value'=>1,'uncheckValue'=>NULL)); ?>
 		&nbsp; No  <?php echo $form->radioButton($model, 'valid', array('value'=>0,'uncheckValue'=>NULL)); ?>

		<?php echo $form->error($model,'valid'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'security_level'); ?>
		<?php echo RBLHtml::enumRadioButtonList($model, 'security_level'); ?>
		<?php echo $form->error($model,'security_level'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'family'); ?> <i>(Is this attribute for family or beneficiary)</i><br/>
		<?php echo $form->checkBox($model, 'family'); ?>
		<?php echo $form->error($model,'family'); ?>
		</div><!-- row -->
		<?php   
                    $model->deleted_at = NULL; 
                    $model->beneficiaryAttributes = ''; 
                ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->