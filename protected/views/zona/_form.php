<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'zona-form',
	'enableAjaxValidation'=>false,
        'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
		)
		)); ?>
	<fieldset>
		<legend>
			<p class="note">
				Los campos con <span class="required">*</span> son obligatorios.
			</p>
		</legend>

		

		<div class="control-group">

		<?php echo $form->textFieldRow($model,'nombre',array('class'=>'input-large','maxlength'=>50)); ?>

		<?php echo $form->textAreaRow($model,'desripcion',array('rows'=>6, 'cols'=>50, 'class'=>'input-large')); ?>

		<?php echo $form->textFieldRow($model,'precipitacion',array('class'=>'input-large','maxlength'=>6)); ?>

		<?php echo $form->textFieldRow($model,'temperatura',array('class'=>'input-large','maxlength'=>6)); ?>

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
