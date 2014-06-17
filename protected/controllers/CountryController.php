<?php

class CountryController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Country'),
		));
	}

	public function actionCreate() {
		$model = new Country;

		$this->performAjaxValidation($model, 'country-form');

		if (isset($_POST['Country'])) {
			$model->setAttributes($_POST['Country']);

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
		$model = $this->loadModel($id, 'Country');

		$this->performAjaxValidation($model, 'country-form');

		if (isset($_POST['Country'])) {
			$model->setAttributes($_POST['Country']);

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
			$this->loadModel($id, 'Country')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Country');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Country('search');
		$model->unsetAttributes();

		if (isset($_GET['Country']))
			$model->setAttributes($_GET['Country']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}