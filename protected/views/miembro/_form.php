<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'miembro-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
	'enctype'=>'multipart/form-data')
)); ?>
<?php if(isset($persona)){ echo $form->hiddenField($persona,'id'); } ?>

	<fieldset>
		<legend>
			<p class="note">
				Los campos con <span class="required">*</span> son obligatorios.
			</p>
		</legend>

		<div class="control-group">

		<?php echo $form->dropDownListRow($model,'coordinador',$model->coordinador('all'),array('prompt'=>'Seleccione la opción')); ?>

		<?php echo $form->dropDownListRow($model,'idcomite',$model->comite('all'),array('prompt'=>'Seleccione la opción')); ?>

		</div>

		<div align="center">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
            'icon'=>'ok white',  
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
			'icon'=>'remove',  
			'label'=>'Limpiar',
		)); ?>
		</div>
	</fieldset>

	<?php $this->endWidget(); ?>

</div>
