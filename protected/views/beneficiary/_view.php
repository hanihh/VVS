<div class="view">
<?php
    $img = Yii::app()->params['BENEFICIARIES_IMAGES_PATH'].$data->registration_code.'.jpg';
            if (!file_exists($img)) {
                file_put_contents($img, file_get_contents($data->remote_image));
                Yii::import('application.extensions.image.Image');
                $image = new Image($img);
                $image->resize(500,150,Image::AUTO)->rotate(90)->crop(120, 150, 'top', 'center');
                //$image->render();
                $image->save(Yii::app()->params['BENEFICIARIES_IMAGES_PATH'].$data->registration_code.'.jpg');
            }   //echo Yii::app()->params['BENEFICIARIES_IMAGES_PATH'];
            echo "<div style='float:right;'><img src='".Yii::app()->params['BENEFICIARIES_IMAGES_PATH']. $data->registration_code.".jpg'></img></div>";
            ?>
	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('registration_code')); ?>:
	<?php echo GxHtml::encode($data->registration_code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('neighborhood_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->neighborhood)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ar_name')); ?>:
	<?php echo GxHtml::encode($data->ar_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('en_name')); ?>:
	<?php echo GxHtml::encode($data->en_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone_number')); ?>:
	<?php echo GxHtml::encode($data->phone_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('family_member')); ?>:
	<?php echo GxHtml::encode($data->family_member); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('main_income_source')); ?>:
	<?php echo GxHtml::encode($data->main_income_source); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('combine_household')); ?>:
	<?php echo GxHtml::encode($data->combine_household); ?>
	<br />
</div>