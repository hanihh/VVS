<?php

class BeneficiaryController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Beneficiary'),
		));
	}

	public function actionCreate() {
		$model = new Beneficiary;

		$this->performAjaxValidation($model, 'beneficiary-form');

		if (isset($_POST['Beneficiary'])) {
			$model->setAttributes($_POST['Beneficiary']);

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
		$model = $this->loadModel($id, 'Beneficiary');

		$this->performAjaxValidation($model, 'beneficiary-form');

		if (isset($_POST['Beneficiary'])) {
			$model->setAttributes($_POST['Beneficiary']);

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
			$this->loadModel($id, 'Beneficiary')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Beneficiary');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Beneficiary('search');
		$model->unsetAttributes();

		if (isset($_GET['Beneficiary']))
			$model->setAttributes($_GET['Beneficiary']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}