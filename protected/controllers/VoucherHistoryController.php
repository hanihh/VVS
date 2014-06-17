<?php

class VoucherHistoryController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VoucherHistory'),
		));
	}

	public function actionCreate() {
		$model = new VoucherHistory;

		$this->performAjaxValidation($model, 'voucher-history-form');

		if (isset($_POST['VoucherHistory'])) {
			$model->setAttributes($_POST['VoucherHistory']);

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
		$model = $this->loadModel($id, 'VoucherHistory');

		$this->performAjaxValidation($model, 'voucher-history-form');

		if (isset($_POST['VoucherHistory'])) {
			$model->setAttributes($_POST['VoucherHistory']);

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
			$this->loadModel($id, 'VoucherHistory')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VoucherHistory', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VoucherHistory('search');
		$model->unsetAttributes();

		if (isset($_GET['VoucherHistory']))
			$model->setAttributes($_GET['VoucherHistory']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}