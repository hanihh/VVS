<?php


if (isset($_POST)&& (!empty($_POST))) {
    echo '<div class="flash-success">Saved...</div>';

}
$beneficiary = new Beneficiary('searchForVoucherAssignment');
$beneficiary->unsetAttributes();
if (isset($_GET['Beneficiary']))
	$beneficiary->setAttributes($_GET['Beneficiary']);

$form = $this->beginWidget('GxActiveForm', array(
	'id' => 'generate-voucher-form',
	'enableAjaxValidation' => true,
));
echo "<input type='button' name='btnsave' id='btnsavebeneficiaries' value='Save and add another' />";

echo CHtml::hiddenField('distribution_id', '',  array('id' => 'distribution_id'));
//$model = new Beneficiary();
$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'beneficiary-grid',
	'dataProvider' => $beneficiary->searchForVoucherAssignment(),
	'filter' => $beneficiary,
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

$this->endWidget();

?>
