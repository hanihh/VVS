<?php

class DistributionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Distribution'),
		));
	}

	public function actionCreate() {
		$model = new Distribution;

		$this->performAjaxValidation($model, 'distribution-form');

		if (isset($_POST['Distribution'])) {
			$model->setAttributes($_POST['Distribution']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}
        
        public function actionCreateWithoutValidation() {
		$model = new Distribution;

		//$this->performAjaxValidation($model, 'distribution-form');

		if (isset($_POST['Distribution'])) {
			$model->setAttributes($_POST['Distribution']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest()){
                                    echo $model->id;
                                    Yii::app()->end();
                                }
                                else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Distribution');

		$this->performAjaxValidation($model, 'distribution-form');

		if (isset($_POST['Distribution'])) {
			$model->setAttributes($_POST['Distribution']);

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
			$this->loadModel($id, 'Distribution')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Distribution');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Distribution('search');
		$model->unsetAttributes();

		if (isset($_GET['Distribution']))
			$model->setAttributes($_GET['Distribution']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}