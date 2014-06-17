<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'code',
'start_date',
'end_date',
array(
			'name' => 'region',
			'type' => 'raw',
			'value' => $model->region !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->region)), array('community/view', 'id' => GxActiveRecord::extractPkValue($model->region, true))) : null,
			),
array(
			'name' => 'program',
			'type' => 'raw',
			'value' => $model->program !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->program)), array('program/view', 'id' => GxActiveRecord::extractPkValue($model->program, true))) : null,
			),
array(
			'name' => 'status',
			'type' => 'raw',
			'value' => $model->status !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->status)), array('distributionStatus/view', 'id' => GxActiveRecord::extractPkValue($model->status, true))) : null,
			),
'create_date',
'deleted_at',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('distributionVouchers')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->distributionVouchers as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('distributionVoucher/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>