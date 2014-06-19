<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'distribution-voucher-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($DistributionVoucher); ?>
                <div class="row" id="foundedVouchers"></div>
		<div class="row">
		<?php echo $form->labelEx($DistributionVoucher,'code'); ?>
		<?php echo $form->textField($DistributionVoucher, 'code', array('maxlength' => 10)); ?>
		<?php echo $form->error($DistributionVoucher,'code'); 
                echo $form->hiddenField($DistributionVoucher, 'distribution_id');
                ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($DistributionVoucher,'type_id'); ?>
		<?php echo $form->dropDownList($DistributionVoucher, 'type_id', GxHtml::listDataEx(VoucherType::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($DistributionVoucher,'type_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($DistributionVoucher,'expiration_date'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                    $this->widget('CJuiDateTimePicker',array(
                    'model'=>$DistributionVoucher, //Model object
                    'attribute'=>'expiration_date', //attribute name
                    'language'=>'',
                    'options'=>array('dateFormat' => 'yy-mm-dd') // jquery plugin options
                )); ?>
		<?php echo $form->error($DistributionVoucher,'expiration_date'); ?>
		</div><!-- row -->
<?php
echo "<input type='button' name='btnsave' id='btnsave' value='Save and add another' onclick='savedistributionvoucher'";
//GxHtml::submitButton(Yii::t('app', 'Save and add another'));
$this->endWidget();
?>
</div><!-- form -->