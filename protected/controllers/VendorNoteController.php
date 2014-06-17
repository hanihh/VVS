<?php

class VendorNoteController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VendorNote'),
		));
	}

	public function actionCreate() {
		$model = new VendorNote;

		$this->performAjaxValidation($model, 'vendor-note-form');

		if (isset($_POST['VendorNote'])) {
			$model->setAttributes($_POST['VendorNote']);

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
		$model = $this->loadModel($id, 'VendorNote');

		$this->performAjaxValidation($model, 'vendor-note-form');

		if (isset($_POST['VendorNote'])) {
			$model->setAttributes($_POST['VendorNote']);

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
			$this->loadModel($id, 'VendorNote')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VendorNote', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VendorNote('search');
		$model->unsetAttributes();

		if (isset($_GET['VendorNote']))
			$model->setAttributes($_GET['VendorNote']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}