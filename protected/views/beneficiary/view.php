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
'create_date',
'update_date',
'registration_code',
array(
			'name' => 'status',
			'type' => 'raw',
			'value' => $model->status !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->status)), array('beneficiaryStatus/view', 'id' => GxActiveRecord::extractPkValue($model->status, true))) : null,
			),
array(
			'name' => 'neighborhood',
			'type' => 'raw',
			'value' => $model->neighborhood !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->neighborhood)), array('community/view', 'id' => GxActiveRecord::extractPkValue($model->neighborhood, true))) : null,
			),
'deleted_at',
'remote_image',
'ar_name',
'en_name',
'phone_number',
'family_member',
'main_income_source',
'combine_household',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('beneficiaryAttributes')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->beneficiaryAttributes as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('beneficiaryAttribute/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('vouchers')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->vouchers as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('voucher/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>