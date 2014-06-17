<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'voucher_id'); ?>
		<?php echo $form->dropDownList($model, 'voucher_id', GxHtml::listDataEx(Voucher::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'action'); ?>
		<?php echo $form->dropDownList($model, 'action', GxHtml::listDataEx(VoucherAction::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'action_date'); ?>
		<?php echo $form->textField($model, 'action_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'deleted_at'); ?>
		<?php echo $form->textField($model, 'deleted_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
