<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('code')); ?>:
	<?php echo GxHtml::encode($data->code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('en_name')); ?>:
	<?php echo GxHtml::encode($data->en_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_date')); ?>:
	<?php echo GxHtml::encode($data->create_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('deleted_at')); ?>:
	<?php echo GxHtml::encode($data->deleted_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('subdistrict_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->subdistrict)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ar_name')); ?>:
	<?php echo GxHtml::encode($data->ar_name); ?>
	<br />

</div>