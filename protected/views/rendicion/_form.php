<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'rendicion-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>
	<fieldset>
		<legend>
			<p class="note">
				Los campos con <span class="required">*</span> son obligatorios.
			</p>
		</legend>

		<div class="control-group">

		<?php echo $form->dropDownListRow($model,'id',$model->desembolso('all'),array('prompt'=>'Seleccione la �pcion')); ?>

		<?php echo $form->datePickerRow($model,'fecha'); ?>


		<?php echo $form->textFieldRow($model,'monto',array('class'=>'input-large','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'input-large','maxlength'=>100)); ?>

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
