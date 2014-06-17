<?php

class RegionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Region'),
		));
	}

	public function actionCreate() {
		$model = new Region;

		$this->performAjaxValidation($model, 'region-form');

		if (isset($_POST['Region'])) {
			$model->setAttributes($_POST['Region']);

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
		$model = $this->loadModel($id, 'Region');

		$this->performAjaxValidation($model, 'region-form');

		if (isset($_POST['Region'])) {
			$model->setAttributes($_POST['Region']);

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
			$this->loadModel($id, 'Region')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Region', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Region('search');
		$model->unsetAttributes();

		if (isset($_GET['Region']))
			$model->setAttributes($_GET['Region']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}