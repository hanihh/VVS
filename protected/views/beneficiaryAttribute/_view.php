<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('beneficiary_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->beneficiary)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('attribute_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->attribute)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('value')); ?>:
	<?php echo GxHtml::encode($data->value); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_date')); ?>:
	<?php echo GxHtml::encode($data->create_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('deleted_at')); ?>:
	<?php echo GxHtml::encode($data->deleted_at); ?>
	<br />

</div>