<?php
$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->id,
);
?>

<h1>Datos Proyecto </h1>
<hr />
<?php 
$this->beginWidget('zii.widgets.CPortlet', array());
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Crear', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
        array('label'=>'Listar', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
		array('label'=>'Modificar', 'icon'=>'icon-edit', 'url'=>Yii::app()->controller->createUrl('update',array('id'=>$model->id)), 'linkOptions'=>array()),
		array('label'=>'Imprimir', 'icon'=>'icon-print', 'url'=>'javascript:void(0);return false', 'linkOptions'=>array('onclick'=>'printDiv();return false;')),

)));
$this->endWidget();
?>
<div class='printableArea'>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'idparroquia',
			'value'=>$model->parroquia()->nombre,
		),
		array(
			'name'=>'idzona',
			'value'=>$model->zona()->nombre,
		),
		array(
			'name'=>'idpromotor',
			'value'=>$model->promotor('name'),
		),
		array(
			'name'=>'idcomite',
			'value'=>$model->comite()->nombre,
		),
		'numero',
		'nombre',
		'fecha',
		'monto',
		'hectareas',
		'meta',
		'observacion',
		array(
			'name'=>'fase',
			'value'=>$model->fase(),
		),
		array(
			'name'=>'status',
			'value'=>$model->status(),
		),
		array(
			'name'=>'sistema',
			'value'=>$model->sistema(),
		),
	),
)); ?>
</div>
<style type="text/css" media="print">
body {visibility:hidden;}
.printableArea{visibility:visible;} 
</style>
<script type="text/javascript">
function printDiv()
{

window.print();

}
</script>
