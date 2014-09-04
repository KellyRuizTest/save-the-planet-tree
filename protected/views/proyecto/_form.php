<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'proyecto-form',
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

		<?php echo $form->dropDownListRow($model,'idparroquia',$model->parroquia('all'),array('prompt'=>'Seleccione la opci�n')); ?>

		<?php echo $form->dropDownListRow($model,'idzona',$model->zona('all'),array('prompt'=>'Seleccione la opci�n')); ?>

		<?php echo $form->dropDownListRow($model,'idpromotor',$model->promotor('all'),array('prompt'=>'Seleccione la opci�n')); ?>

		<?php echo $form->dropDownListRow($model,'idcomite',$model->comite('all'),array('prompt'=>'Seleccione la opci�n')); ?>

		<?php echo $form->textFieldRow($model,'numero',array('class'=>'input-large','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'nombre',array('class'=>'input-large','maxlength'=>100)); ?>

		<?php echo $form->datePickerRow($model,'fecha'); ?>

		<?php echo $form->textFieldRow($model,'monto',array('class'=>'input-large','maxlength'=>10)); ?>
                    
                <?php echo $form->dropDownListRow($model,'fase',$model->fase('all'),array('prompt'=>'Seleccione una Opci�n')); ?>

		<?php echo $form->textFieldRow($model,'hectareas',array('class'=>'input-large','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'meta',array('class'=>'input-large')); ?>

		<?php echo $form->textAreaRow($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'input-large')); ?>

		<?php echo $form->dropDownListRow($model,'fase',$model->fase('all'),array('prompt'=>'Seleccione una Opci�n')); ?>

		<?php echo $form->dropDownListRow($model,'status',$model->status('all'),array('prompt'=>'Seleccione una Opci�n')); ?>

		<?php echo $form->dropDownListRow($model,'sistema',$model->sistema('all'),array('prompt'=>'Seleccione una Opci�n')); ?>

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
