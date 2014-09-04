<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'desembolso-form',
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

		<?php echo $form->dropDownListRow($model,'idproyecto',$model->proyecto('all'),array('prompt'=>'Seleccione la opci�n')); ?>
		
		

		<?php echo $form->dropDownListRow($model,'idmiembro',$model->miembro('all'),array('prompt'=>'Seleccione la opci�n')); ?>
		
		<?php echo $form->textFieldRow($model,'cheque',array('class'=>'input-large','maxlength'=>8)); ?>

		<?php if(!$model->isNewRecord)	echo $form->datePickerRow($model,'fecha_cobro'); ?>
		
		<?php echo $form->datePickerRow($model,'fecha_emision'); ?>

		<?php echo $form->textFieldRow($model,'monto',array('class'=>'input-large','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'nota',array('class'=>'input-large','maxlength'=>100)); ?>

		<?php echo $form->dropDownListRow($model,'primer',$model->primer('all'),array('prompt'=>'Seleccione una Opci�n')); ?>

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
