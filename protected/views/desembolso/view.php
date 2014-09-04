<?php
$this->breadcrumbs=array(
	'Desembolsos'=>array('index'),
);
?>

<h1>Datos Desembolso</h1>
<hr />
<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
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
			'name'=>'idproyecto',
			'value'=>$model->proyecto()->nombre,
		),
		/*array(
			'name'=>'idmiembro',
			'value'=>$model->miembro()->nombre,	
				),*/
		'idmiembro',
		'cheque',
		'fecha_cobro',
		'fecha_emision',
		'monto',
		'nota',
		array(
			'name'=>'primer',
			'value'=>$model->primer(),
		),
	),
)); ?>
</div>
<style type="text/css" media="print">
body {visibility:hidden;}
.printableArea{visibility:visible;} 
</style>
<script type="text/javascript">
function printDiv(){window.print();}
</script>
