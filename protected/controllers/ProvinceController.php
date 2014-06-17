<?php

class ProvinceController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Province'),
		));
	}

	public function actionCreate() {
		$model = new Province;

		$this->performAjaxValidation($model, 'province-form');

		if (isset($_POST['Province'])) {
			$model->setAttributes($_POST['Province']);

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
		$model = $this->loadModel($id, 'Province');

		$this->performAjaxValidation($model, 'province-form');

		if (isset($_POST['Province'])) {
			$model->setAttributes($_POST['Province']);

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
			$this->loadModel($id, 'Province')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Province', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Province('search');
		$model->unsetAttributes();

		if (isset($_GET['Province']))
			$model->setAttributes($_GET['Province']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}