<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'distribution-voucher-form',
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
		<?php echo $form->labelEx($model,'distribution_id'); ?>
		<?php echo $form->dropDownList($model, 'distribution_id', GxHtml::listDataEx(Distribution::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'distribution_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo $form->dropDownList($model, 'type_id', GxHtml::listDataEx(VoucherType::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'type_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'expiration_date'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                    $this->widget('CJuiDateTimePicker',array(
                    'model'=>$model, //Model object
                    'attribute'=>'expiration_date', //attribute name
                    'language'=>'',
                    'options'=>array('dateFormat' => 'yy-mm-dd') // jquery plugin options
                )); ?>
		<?php echo $form->error($model,'expiration_date'); ?>
		</div><!-- row -->
		<label><?php echo GxHtml::encode($model->getRelationLabel('vouchers')); ?></label>
		<?php echo $form->checkBoxList($model, 'vouchers', GxHtml::encodeEx(GxHtml::listDataEx(Voucher::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->