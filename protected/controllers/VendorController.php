<?php

class VendorController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Vendor'),
		));
	}

	public function actionCreate() {
		$model = new Vendor;

		$this->performAjaxValidation($model, 'vendor-form');

		if (isset($_POST['Vendor'])) {
			$model->setAttributes($_POST['Vendor']);

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
		$model = $this->loadModel($id, 'Vendor');

		$this->performAjaxValidation($model, 'vendor-form');

		if (isset($_POST['Vendor'])) {
			$model->setAttributes($_POST['Vendor']);

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
			$this->loadModel($id, 'Vendor')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Vendor', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Vendor('search');
		$model->unsetAttributes();

		if (isset($_GET['Vendor']))
			$model->setAttributes($_GET['Vendor']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}