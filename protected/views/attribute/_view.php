<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('valid')); ?>:
	<?php echo GxHtml::encode($data->valid); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('security_level')); ?>:
	<?php echo GxHtml::encode($data->security_level); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('family')); ?>:
	<?php echo GxHtml::encode($data->family); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('deleted_at')); ?>:
	<?php echo GxHtml::encode($data->deleted_at); ?>
	<br />
	*/ ?>

</div>