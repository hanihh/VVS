<?php

class VendorStatusController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VendorStatus'),
		));
	}

	public function actionCreate() {
		$model = new VendorStatus;

		$this->performAjaxValidation($model, 'vendor-status-form');

		if (isset($_POST['VendorStatus'])) {
			$model->setAttributes($_POST['VendorStatus']);

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
		$model = $this->loadModel($id, 'VendorStatus');

		$this->performAjaxValidation($model, 'vendor-status-form');

		if (isset($_POST['VendorStatus'])) {
			$model->setAttributes($_POST['VendorStatus']);

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
			$this->loadModel($id, 'VendorStatus')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VendorStatus', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VendorStatus('search');
		$model->unsetAttributes();

		if (isset($_GET['VendorStatus']))
			$model->setAttributes($_GET['VendorStatus']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}