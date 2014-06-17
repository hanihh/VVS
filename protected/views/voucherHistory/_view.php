<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('voucher_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->voucher)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('action')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->action0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('action_date')); ?>:
	<?php echo GxHtml::encode($data->action_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('deleted_at')); ?>:
	<?php echo GxHtml::encode($data->deleted_at); ?>
	<br />

</div>