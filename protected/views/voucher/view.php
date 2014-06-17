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
array(
			'name' => 'distributionVoucher',
			'type' => 'raw',
			'value' => $model->distributionVoucher !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->distributionVoucher)), array('distributionVoucher/view', 'id' => GxActiveRecord::extractPkValue($model->distributionVoucher, true))) : null,
			),
array(
			'name' => 'ben',
			'type' => 'raw',
			'value' => $model->ben !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->ben)), array('beneficiary/view', 'id' => GxActiveRecord::extractPkValue($model->ben, true))) : null,
			),
array(
			'name' => 'vendor',
			'type' => 'raw',
			'value' => $model->vendor !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->vendor)), array('vendor/view', 'id' => GxActiveRecord::extractPkValue($model->vendor, true))) : null,
			),
array(
			'name' => 'status',
			'type' => 'raw',
			'value' => $model->status !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->status)), array('voucherStatus/view', 'id' => GxActiveRecord::extractPkValue($model->status, true))) : null,
			),
'create_date',
'deleted_at',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('voucherHistories')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->voucherHistories as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('voucherHistory/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>