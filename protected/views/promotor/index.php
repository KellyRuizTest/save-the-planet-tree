<?php
$this->breadcrumbs=array(
	'Promotors',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('promotor-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h1>Promotores</h1>
<hr />

<?php 
$this->beginWidget('zii.widgets.CPortlet', array());
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Crear', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
		array('label'=>'Listar', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>'Generar PDF', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		array('label'=>'Generar Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
$this->endWidget();
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'promotor-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'striped bordered condensed',
	'template'=>'{items}{pager}',
	'columns'=>array(
		array(
			'name'=>'id',
			'value'=>'$data->persona()->cedula',
		),
		array(
			'name'=>'id',
			'value'=>'$data->persona()->nombre',
		),
		array(
			'name'=>'permanente',
			'value'=>'$data->permanente()',
		),
		array(
			'name'=>'activo',
			'value'=>'$data->activo()',
		),
       array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}{update}{delete}',
			'buttons' => array(
			      'view' => array(
					'label'=> 'View',
					'options'=>array(
						'class'=>'btn btn-small view'
					)
				),	
                              'update' => array(
					'label'=> 'Modificar',
					'options'=>array(
						'class'=>'btn btn-small update'
					)
				),
				'delete' => array(
					'label'=> 'Delete',
					'options'=>array(
						'class'=>'btn btn-small delete'
					)
				)
			),
            'htmlOptions'=>array('style'=>'width: 115px'),
           )
	),
)); ?>

