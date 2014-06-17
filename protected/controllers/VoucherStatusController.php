<?php

class VoucherStatusController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VoucherStatus'),
		));
	}

	public function actionCreate() {
		$model = new VoucherStatus;

		$this->performAjaxValidation($model, 'voucher-status-form');

		if (isset($_POST['VoucherStatus'])) {
			$model->setAttributes($_POST['VoucherStatus']);

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
		$model = $this->loadModel($id, 'VoucherStatus');

		$this->performAjaxValidation($model, 'voucher-status-form');

		if (isset($_POST['VoucherStatus'])) {
			$model->setAttributes($_POST['VoucherStatus']);

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
			$this->loadModel($id, 'VoucherStatus')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VoucherStatus', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VoucherStatus('search');
		$model->unsetAttributes();

		if (isset($_GET['VoucherStatus']))
			$model->setAttributes($_GET['VoucherStatus']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}