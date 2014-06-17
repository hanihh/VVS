<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('distribution_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->distribution)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('vendor_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->vendor)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->phone)); ?>
	<br />

</div>