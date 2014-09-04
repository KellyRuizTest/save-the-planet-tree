<?php

class MiembroController extends CController{
	public $breadcrumbs;
	public $layout='main';
	public function filters(){
		return array('accessControl',);
	}

	public function accessRules(){
		return array(
			array('allow','users'=>array('*'),)
		);
	}

	public function actionView($id){
		$this->render('view',array('model'=>$this->loadModel($id),));
	}

	public function actionCreate($tag=0){
		$model=new Miembro;
		$persona=new Persona;
		if(isset($_POST['Persona']) && $tag==0){
			$persona->attributes=$_POST['Persona'];
			if(isset($_POST['Persona']['id'])){
				$persona->id=$_POST['Persona']['id'];
				$tag=1;
			}elseif($tag=$persona->save())
			$tag=1;
			elseif($data=Persona::model()->findByAttributes(array('cedula'=>$persona->cedula))){
				$persona=$data;
				$tag=1;
			}
						
		}
		if(isset($_POST['Miembro']) && $tag==1){
			$model->attributes=$_POST['Miembro'];
			$model->id=$persona->id;
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
			$tag=1;
		}

		$this->render('create',array('model'=>$model,'persona'=>$persona,'tag'=>$tag));
	}

	public function actionUpdate($id,$tag=0){
		$model=$this->loadModel($id);;
		$persona=Persona::model()->findByPk($model->id);
		if(isset($_POST['Persona']) && $tag==0){
			$persona->attributes=$_POST['Persona'];
			if(isset($_POST['Persona']['id'])){
				$persona->id=$_POST['Persona']['id'];
				$tag=1;
			}elseif($tag=$persona->update())
			$tag=1;
			elseif($persona=Persona::model()->findByAttributes(array('cedula'=>$persona->cedula)))
			$tag=1;
		}
		if(isset($_POST['Miembro']) && $tag==1){
			$model->attributes=$_POST['Miembro'];
			$model->id=$persona->id;
			if($model->update()){
				$this->redirect(array('view','id'=>$model->id));
			}
			$tag=1;
		}

		$this->render('update',array('model'=>$model,'persona'=>$persona,'tag'=>$tag));
	}

	public function actionDelete($id){
		if(Yii::app()->request->isPostRequest){
			$this->loadModel($id)->delete();
			if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionIndex(){
		$session=new CHttpSession;
		$session->open();
		$criteria = new CDbCriteria();
		$model=new Miembro('search');
		$model->unsetAttributes();
		if(isset($_GET['Miembro'])){
			$model->attributes=$_GET['Miembro'];
			if (!empty($model->id)) $criteria->addCondition('id = "'.$model->id.'"');
			if (!empty($model->coordinador)) $criteria->addCondition('coordinador = "'.$model->coordinador.'"');
			if (!empty($model->idcomite)) $criteria->addCondition('idcomite = "'.$model->idcomite.'"');
		}
		$session['Miembro_records']=Miembro::model()->findAll($criteria);
		$this->render('index',array('model'=>$model,));

	}

	public function loadModel($id){
		$model=Miembro::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionGeneratePdf(){
		$session=new CHttpSession;
		$session->open();
		Yii::import('application.modules.admin.extensions.giiplus.bootstrap.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		if(isset($session['Miembro_records']))
			$model=$session['Miembro_records'];
		else
			$model = Miembro::model()->findAll();
		$html = $this->renderPartial('expenseGridtoReport', array('model'=>$model), true);
		//die($html);
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Miembro Report');
		$pdf->SetSubject('Miembro Report');
		//$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Report", '');
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 0);
		$pdf->SetFont('dejavusans', '', 7);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("Miembro_002.pdf", "I");
	}
}
