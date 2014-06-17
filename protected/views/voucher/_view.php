<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('code')); ?>:
	<?php echo GxHtml::encode($data->code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('distribution_voucher_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->distributionVoucher)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ben_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->ben)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('vendor_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->vendor)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->status)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_date')); ?>:
	<?php echo GxHtml::encode($data->create_date); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('deleted_at')); ?>:
	<?php echo GxHtml::encode($data->deleted_at); ?>
	<br />
	*/ ?>

</div>