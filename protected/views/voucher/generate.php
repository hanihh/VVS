<?php

$this->breadcrumbs = array(
	$model->label(2) => array('voucher'),
	Yii::t('app', 'Generate Vouchers'),
);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST)&& (!empty($_POST))) {
    echo '<div class="flash-success">Saved...</div>';

}

$form = $this->beginWidget('GxActiveForm', array(
	'id' => 'generate-voucher-form',
	'enableAjaxValidation' => true,
));

Yii::app()->clientScript->registerScript('distribution_id', "
        $('#distribution_id').change(function() {
            $.fn.yiiGridView.update('beneficiary-grid', {
                    data: $(this).serialize()
            });            
            return false;
        });
    ");
echo "Distribution : ";
$distributionVousher = new DistributionVoucher();
//echo $form->dropDownList($distributionVousher, 'distribution_id', GxHtml::encodeEx(GxHtml::listDataEx(Distribution::model()->findAllAttributes(null, true)), false, true)); 

$data = CHtml::listData(Distribution::model()->findAll(array("condition"=>"status_id =  2")), 'id', 'code');
$select = key($data);
echo CHtml::dropDownList(
    'distribution_id',
    $select,            // selected item from the $data
    $data,       
    array(
        'style'=>'margin-bottom:10px;',
        'id'=>'distribution_id',
        'options' => array('0'=>array('selected'=>true)),
    )
);


//$model = new Beneficiary();
$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'beneficiary-grid',
	'dataProvider' => $model->searchForVoucherAssignment(),
	'filter' => $model,
	'columns' => array(
                'id',
		'registration_code',
		'ar_name',
                'en_name',
                'family_member',
            	array('name' => 'main_income_source',
                    'value' => '$data->main_income_source',
                    'filter' => CHtml::listData( Beneficiary::model()->findall(), 'main_income_source', 'main_income_source')
                ),
                array('name' => 'combine_household',
                    'value' => '$data->combine_household', 
                    'filter' => CHtml::listData(Beneficiary::model()->findall(), 'combine_household', 'combine_household')
                ),
                array( 'class'=>'CCheckBoxColumn', 'value'=>'$data->id', 'selectableRows'=> '2', 'header' => 'check', 
                ),
	),
    ));

echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();