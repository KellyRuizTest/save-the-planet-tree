<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      idproyecto		</th>
 		<th width="80px">
		      portador		</th>
 		<th width="80px">
		      cheque		</th>
 		<th width="80px">
		      fecha_cobro		</th>
 		<th width="80px">
		      fecha_emision		</th>
 		<th width="80px">
		      monto		</th>
 		<th width="80px">
		      nota		</th>
 		<th width="80px">
		      primer		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->idproyecto; ?>
		</td>
       		<td>
			<?php echo $row->portador; ?>
		</td>
       		<td>
			<?php echo $row->cheque; ?>
		</td>
       		<td>
			<?php echo $row->fecha_cobro; ?>
		</td>
       		<td>
			<?php echo $row->fecha_emision; ?>
		</td>
       		<td>
			<?php echo $row->monto; ?>
		</td>
       		<td>
			<?php echo $row->nota; ?>
		</td>
       		<td>
			<?php echo $row->primer; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
