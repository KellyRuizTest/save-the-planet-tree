<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      idparroquia		</th>
 		<th width="80px">
		      idzona		</th>
 		<th width="80px">
		      idpromotor		</th>
 		<th width="80px">
		      idcomite		</th>
 		<th width="80px">
		      numero		</th>
 		<th width="80px">
		      nombre		</th>
 		<th width="80px">
		      fecha		</th>
 		<th width="80px">
		      monto		</th>
 		<th width="80px">
		      hectareas		</th>
 		<th width="80px">
		      meta		</th>
 		<th width="80px">
		      observacion		</th>
 		<th width="80px">
		      fase		</th>
 		<th width="80px">
		      status		</th>
 		<th width="80px">
		      sistema		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->idparroquia; ?>
		</td>
       		<td>
			<?php echo $row->idzona; ?>
		</td>
       		<td>
			<?php echo $row->idpromotor; ?>
		</td>
       		<td>
			<?php echo $row->idcomite; ?>
		</td>
       		<td>
			<?php echo $row->numero; ?>
		</td>
       		<td>
			<?php echo $row->nombre; ?>
		</td>
       		<td>
			<?php echo $row->fecha; ?>
		</td>
       		<td>
			<?php echo $row->monto; ?>
		</td>
       		<td>
			<?php echo $row->hectareas; ?>
		</td>
       		<td>
			<?php echo $row->meta; ?>
		</td>
       		<td>
			<?php echo $row->observacion; ?>
		</td>
       		<td>
			<?php echo $row->fase; ?>
		</td>
       		<td>
			<?php echo $row->status; ?>
		</td>
       		<td>
			<?php echo $row->sistema; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
