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
	$.fn.yiiGridView.update('beneficiary-grid', {
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
	'id' => 'beneficiary-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'registration_code',
                'ar_name',
		'en_name',
		'family_member',
            	'main_income_source',
                'combine_household',
		array(
				'name'=>'status_id',
				'value'=>'GxHtml::valueEx($data->status)',
				'filter'=>GxHtml::listDataEx(BeneficiaryStatus::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'neighborhood_id',
				'value'=>'GxHtml::valueEx($data->neighborhood)',
				'filter'=>GxHtml::listDataEx(Community::model()->findAllAttributes(null, true)),
				),
		/*
		'deleted_at',
		'remote_image',
		
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
));
?>