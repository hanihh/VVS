<?php

class VoucherController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Voucher'),
		));
	}

	public function actionCreate() {
		$model = new Voucher;

		$this->performAjaxValidation($model, 'voucher-form');

		if (isset($_POST['Voucher'])) {
			$model->setAttributes($_POST['Voucher']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Voucher');

		$this->performAjaxValidation($model, 'voucher-form');

		if (isset($_POST['Voucher'])) {
			$model->setAttributes($_POST['Voucher']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Voucher')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Voucher', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Voucher('search');
		$model->unsetAttributes();

		if (isset($_GET['Voucher']))
			$model->setAttributes($_GET['Voucher']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionGenerate() {
            $model = new Beneficiary('searchForVoucherAssignment');
            $model->unsetAttributes();
            //print_r($_POST);
            if ((isset($_POST)&& !empty($_POST))) {
            $distribution = Distribution::model()->findByPk($_POST['distribution_id']);
            if ($distribution) {
                // getting Voucher Types assosiated to this distribution.
                $distributionVouchers = $distribution->distributionVouchers;
                
                // getting The 'created' status
                $criteria = new CDbCriteria; 
                $criteria->addCondition('name="CREATED"'); // created Status for vouchers
                $status = VoucherStatus::model()->find($criteria);

                // Getting the last inserted id in the voucher table.
                $criteria2 = new CDbCriteria;  
                $criteria2->select='max(id) as max';
                $voucher = Voucher::model()->find($criteria2);
                $max = $voucher->max + 1;
                ini_set('memory_limit', '-1');
                
                if (isset($_POST['beneficiary-grid_c7_all']) && $_POST['beneficiary-grid_c7_all'] == "1") {
                    $criteria3 = new CDbCriteria;
                    $model->setAttributes($_POST['Beneficiary']);
                    $criteria3->compare('registration_code', $model->registration_code, true);
                    $criteria3->compare('ar_name', $model->ar_name, true);
                    $criteria3->compare('en_name', $model->en_name, true);
                    $criteria3->compare('family_member', $model->family_member);
                    $criteria3->compare('main_income_source', $model->main_income_source, true);
                    $criteria3->compare('combine_household', $model->combine_household, true);
                     echo "<script>console.log('".$model."')</script>";
                } else {
                    // Getting Associated Beneficiaries List 
                    //$beneficiaries = Beneficiary::model()->findAll();
                    $criteria3 = new CDbCriteria;
                    $criteria_string = "t.id in (0";
                    foreach ($_POST['beneficiary-grid_c7'] as $ben_id) {
                        $criteria_string = $criteria_string . ", ".$ben_id;
                    }

                    $criteria_string = $criteria_string . ")";
                    $criteria3->addCondition($criteria_string);
                }
                $beneficiaries = Beneficiary::model()->findAll($criteria3);
                $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
                $random_string_length = 10;
                foreach ($beneficiaries as $beneficiary ) { // for each beneficiary 
                    foreach ($distributionVouchers as $distributionVoucher) { // for each voucher type
                        
                        $criteria4 = new CDbCriteria();
                        $criteria4->condition = "ben_id = ".$beneficiary->id." and distribution_voucher_id = ". $distributionVoucher->id;
                        $exist = Voucher::model()->findAll($criteria4);
                        if (count($exist) == 0) { 
                            $voucher = new Voucher(); // create voucher 
                            $string = '';
                            $exist = "";
                            do {
                            for ($i = 0; $i < $random_string_length; $i++) {
                                 $string .= $characters[rand(0, strlen($characters) - 1)];
                            }
                            $exist = Voucher::model()->exists('code =:code', array(":code" => $string));
                            echo "<script>console.log('".$exist."')</script>";
                            } while ($exist == "1");
                            //$voucher->code = $distributionVoucher->code."/".sprintf('%05u', $max);
                            $voucher->code = $string;
                            $voucher->distribution_voucher_id = $distributionVoucher->id;
                            $voucher->ben_id = $beneficiary->id;
                            $voucher->vendor = NULL;
                            $voucher->status_id = $status->id;
                            $voucher->create_date = new CDbExpression('NOW()');
                            $max++;
                            $voucher->insert();
                            $voucher->save();
                            $this->widget('application.extensions.qrcode.QRCodeGenerator',array(
                                'data' => $voucher->code ,
                                'filename' => $beneficiary->registration_code . "#".$distributionVoucher->code.".png",
                                'filePath' => Yii::app()->params['VOUCHERS_QR_PATH'],
                                'subfolderVar' => false,
                                'matrixPointSize' => 5,
                                'displayImage'=>true, // default to true, if set to false display a URL path
                                'errorCorrectionLevel'=>'L', // available parameter is L,M,Q,H
                                'matrixPointSize'=>4, // 1 to 10 only
                            ));
                        }
                    }
                }
                if (isset($_GET['Beneficiary']))
			$model->setAttributes($_GET['Beneficiary']);

		$this->render('generate', array(
			'model' => $model,
		));
                //$this->render('generate');
            }
            } else {
                if (isset($_GET['Beneficiary']))
			$model->setAttributes($_GET['Beneficiary']);

		$this->render('generate', array(
			'model' => $model,
		));
                //$this->render('generate');
            }
        }
        
        public function assignBenVendor ($distribution_id = 0, $vendor_id = 0, $beneficiaries='') {
            if ((isset($_POST)&& !empty($_POST))) {
            
            } else {
                
            }
        }
        
        public function actionRedeem() {
            if ((isset($_POST)&& !empty($_POST))) {
                $voucher_no = $_POST['voucher_code'];
                $voucher = Voucher::model()->find("code = '". $voucher_no. "'");
                $voucherStatus = $voucher->status;
                if ($voucherStatus->name != 'CREATED') {
                } else {
                    $voucher->status_id = 3;
                    $voucher->update();
                    $voucher->save();
                }
            }
        }
}