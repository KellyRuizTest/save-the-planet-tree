<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'persona-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'))); ?>
	<fieldset>
		<legend>
			<p class="note">
				Los campos con <span class="required">*</span> son obligatorios.
			</p>
		</legend>
		<div class="control-group">
				<label class="control-label"><?php echo $form->labelEx($model,'cedula'); ?>
			</label>
			<div class="controls">
			<?php $this->widget('CMaskedTextField', array(
					'model' => $model,
					'attribute' => 'cedula',
					'mask' => 'V-99999999',
					'charMap'=>array('V'=>'[V|E]','9'=>'[0-9]'),
					'htmlOptions' => array('size' => 14,'autocomplete'=>'off','placeholder'=>'V-00000000')));?>
			</div>
			<span class="help-inline"><?php echo $form->error($model,'cedula'); ?>
			</span>
			
			<?php echo $form->textFieldRow($model,'nombre',array('class'=>'input-large','maxlength'=>32,'autocomplete'=>'off','placeholder'=>'NOMBRE COMPLETO')); ?>

			<?php echo $form->textFieldRow($model,'apellido',array('class'=>'input-large','maxlength'=>32,'autocomplete'=>'off','placeholder'=>'APELLIDO COMPLETO')); ?>
			
			<?php echo $form->dropDownListRow($model,'sexo',$model->sexo('all'),array('prompt'=>'Seleccione la opci�n')); ?>
			
			<?php echo $form->textAreaRow($model,'direccion',array('rows'=>6, 'cols'=>50, 'class'=>'input-large','placeholder'=>'INGRESE LA DIRECCION')); ?>

			<label class="control-label"><?php echo $form->labelEx($model,'telefono'); ?>
			</label>
			<div class="controls">
			<?php $this->widget('CMaskedTextField', array(
					'model' => $model,
					'attribute' => 'telefono',
					'mask' => '(999)-999.9999',
					'htmlOptions' => array('size' => 14,'autocomplete'=>'off','placeholder'=>'(000)-000.0000')));?>
			</div>
			<span class="help-inline"><?php echo $form->error($model,'telefono'); ?>
			</span>
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
