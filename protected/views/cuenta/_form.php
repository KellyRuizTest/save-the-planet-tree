<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cuenta-form',
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

		<?php echo $form->dropDownListRow($model,'idbanco',$model->banco('all'),array('prompt'=>'Seleccione la opción')); ?>

		<?php echo $form->textFieldRow($model,'numero',array('class'=>'input-large','maxlength'=>23)); ?>

		<?php echo $form->textFieldRow($model,'titular',array('class'=>'input-large','maxlength'=>30)); ?>

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
