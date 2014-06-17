<?php

class VoucherActionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VoucherAction'),
		));
	}

	public function actionCreate() {
		$model = new VoucherAction;

		$this->performAjaxValidation($model, 'voucher-action-form');

		if (isset($_POST['VoucherAction'])) {
			$model->setAttributes($_POST['VoucherAction']);

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
		$model = $this->loadModel($id, 'VoucherAction');

		$this->performAjaxValidation($model, 'voucher-action-form');

		if (isset($_POST['VoucherAction'])) {
			$model->setAttributes($_POST['VoucherAction']);

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
			$this->loadModel($id, 'VoucherAction')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VoucherAction', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VoucherAction('search');
		$model->unsetAttributes();

		if (isset($_GET['VoucherAction']))
			$model->setAttributes($_GET['VoucherAction']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}