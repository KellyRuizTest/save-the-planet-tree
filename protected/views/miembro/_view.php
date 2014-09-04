<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coordinador')); ?>:</b>
	<?php echo CHtml::encode($data->coordinador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcomite')); ?>:</b>
	<?php echo CHtml::encode($data->idcomite); ?>
	<br />


</div>