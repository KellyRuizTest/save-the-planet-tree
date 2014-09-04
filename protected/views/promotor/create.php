<?php
$this->breadcrumbs=array(
	'Promotors'=>array('index'),
	'Crear',
);

?>

<h1>Crear Promotor</h1>
<hr/>
<?php 
$this->beginWidget('zii.widgets.CPortlet', array());
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Crear', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>'Listar', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
	),
));
$this->endWidget();
?>

<ul class="nav nav-tabs">
<?php
echo ($tag==0?"<li class='active'>":"<li class='disabled'>").CHtml::link('Datos Personales')."</li>";
echo ($tag==1?"<li class='active'>":"<li class='disabled'>").CHtml::link('Datos Promotor')."</li>";
?>
</ul>

<?php
	switch($tag){
		case 1:
			echo $this->renderPartial('_form',array('model'=>$model,'persona'=>$persona),false);
		break;		
		default:
			echo $this->renderPartial('/persona/_form',array('model'=>$persona),false);			
	}
?>