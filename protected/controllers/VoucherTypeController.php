<?php

class VoucherTypeController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VoucherType'),
		));
	}

	public function actionCreate() {
		$model = new VoucherType;

		$this->performAjaxValidation($model, 'voucher-type-form');

		if (isset($_POST['VoucherType'])) {
			$model->setAttributes($_POST['VoucherType']);

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
		$model = $this->loadModel($id, 'VoucherType');

		$this->performAjaxValidation($model, 'voucher-type-form');

		if (isset($_POST['VoucherType'])) {
			$model->setAttributes($_POST['VoucherType']);

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
			$this->loadModel($id, 'VoucherType')->updateByPk($id, array('deleted_at' => new CDbExpression('NOW()')));

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VoucherType', array('criteria'=>array(
                    'condition'=>'deleted_at is NULL')));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VoucherType('search');
		$model->unsetAttributes();

		if (isset($_GET['VoucherType']))
			$model->setAttributes($_GET['VoucherType']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}