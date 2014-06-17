<?php

class VendorTypeController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VendorType'),
		));
	}

	public function actionCreate() {
		$model = new VendorType;

		$this->performAjaxValidation($model, 'vendor-type-form');

		if (isset($_POST['VendorType'])) {
			$model->setAttributes($_POST['VendorType']);

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
		$model = $this->loadModel($id, 'VendorType');

		$this->performAjaxValidation($model, 'vendor-type-form');

		if (isset($_POST['VendorType'])) {
			$model->setAttributes($_POST['VendorType']);

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
			$this->loadModel($id, 'VendorType')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VendorType', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VendorType('search');
		$model->unsetAttributes();

		if (isset($_GET['VendorType']))
			$model->setAttributes($_GET['VendorType']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}