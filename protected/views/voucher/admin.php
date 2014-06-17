<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('voucher-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'voucher-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'code',
		array(
				'name'=>'distribution_voucher_id',
				'value'=>'GxHtml::valueEx($data->distributionVoucher)',
				'filter'=>GxHtml::listDataEx(DistributionVoucher::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'ben_id',
				'value'=>'GxHtml::valueEx($data->ben)',
				'filter'=>GxHtml::listDataEx(Beneficiary::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'vendor_id',
				'value'=>'GxHtml::valueEx($data->vendor)',
				'filter'=>GxHtml::listDataEx(Vendor::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'status_id',
				'value'=>'GxHtml::valueEx($data->status)',
				'filter'=>GxHtml::listDataEx(VoucherStatus::model()->findAllAttributes(null, true)),
				),
		/*
		'create_date',
		'deleted_at',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>