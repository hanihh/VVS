<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>


<?php

echo CHtml::link('Beneficiary',array('beneficiary/')) . "<br/>";
echo CHtml::link('Beneficiary Attribute',array('beneficiaryAttribute/')) . "<br/>";

echo CHtml::link('Distribution',array('distribution/')) . "<br/>";
echo CHtml::link('Distribution Voucher',array('distributionVoucher/')) . "<br/>";
echo CHtml::link('Program',array('program/')) . "<br/>";
echo CHtml::link('Vendor',array('vendor/')) . "<br/>";
echo CHtml::link('Vendors note',array('vendorNote/')) . "<br/>";
echo CHtml::link('Voucher',array('voucher/')) . "<br/>";

echo "<br /><br /><h1>One Time Configuration: </h1><br />";
echo CHtml::link('Country',array('country/')) . "<br/>";
echo CHtml::link('governorate',array('governorate/')) . "<br/>";
echo CHtml::link('district',array('district/')) . "<br/>";
echo CHtml::link('subdistrict',array('subdistrict/')) . "<br/>";
echo CHtml::link('community',array('community/')) . "<br/>";
echo "<br />";
echo CHtml::link('Attribute',array('attribute/')) . "<br/>";
echo CHtml::link('Beneficiary Status',array('beneficiaryStatus/')) . "<br/>";
echo CHtml::link('Distribution Status',array('distributionStatus/')) . "<br/>";
echo CHtml::link('Vendor Status',array('vendorStatus/')) . "<br/>";
echo CHtml::link('Vendor Type',array('vendorType/')) . "<br/>";
echo CHtml::link('Voucher Type',array('voucherType/')) . "<br/>";
echo CHtml::link('Voucher History',array('voucherHistory/')) . "<br/>";
echo CHtml::link('Voucher Action',array('voucherAction/')) . "<br/>";
echo CHtml::link('Voucher Status',array('voucherStatus/')) . "<br/>";

?>
