<?php

class DistributionVoucherController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'DistributionVoucher'),
		));
	}

	public function actionCreate() {
		$model = new DistributionVoucher;

		$this->performAjaxValidation($model, 'distribution-voucher-form');

		if (isset($_POST['DistributionVoucher'])) {
			$model->setAttributes($_POST['DistributionVoucher']);

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
		$model = $this->loadModel($id, 'DistributionVoucher');

		$this->performAjaxValidation($model, 'distribution-voucher-form');

		if (isset($_POST['DistributionVoucher'])) {
			$model->setAttributes($_POST['DistributionVoucher']);

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
			$this->loadModel($id, 'DistributionVoucher')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('DistributionVoucher', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new DistributionVoucher('search');
		$model->unsetAttributes();

		if (isset($_GET['DistributionVoucher']))
			$model->setAttributes($_GET['DistributionVoucher']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}