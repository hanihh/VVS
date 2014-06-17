<?php

class SubdistrictController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Subdistrict'),
		));
	}

	public function actionCreate() {
		$model = new Subdistrict;

		$this->performAjaxValidation($model, 'subdistrict-form');

		if (isset($_POST['Subdistrict'])) {
			$model->setAttributes($_POST['Subdistrict']);

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
		$model = $this->loadModel($id, 'Subdistrict');

		$this->performAjaxValidation($model, 'subdistrict-form');

		if (isset($_POST['Subdistrict'])) {
			$model->setAttributes($_POST['Subdistrict']);

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
			$this->loadModel($id, 'Subdistrict')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Subdistrict');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Subdistrict('search');
		$model->unsetAttributes();

		if (isset($_GET['Subdistrict']))
			$model->setAttributes($_GET['Subdistrict']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionDynamicsubdistricts()
        {
            $data= Subdistrict::model()->findAll('district_id=:district_id', 
                          array(':district_id'=>(int) $_POST['district_id']));

            $data=CHtml::listData($data,'id','en_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                           array('value'=>$value),CHtml::encode($name),true);
            }
        }
}