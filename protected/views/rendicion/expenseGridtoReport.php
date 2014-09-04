<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      fecha		</th>
 		<th width="80px">
		      tipo		</th>
 		<th width="80px">
		      numero		</th>
 		<th width="80px">
		      monto		</th>
 		<th width="80px">
		      descripcion		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->fecha; ?>
		</td>
       		<td>
			<?php echo $row->tipo; ?>
		</td>
       		<td>
			<?php echo $row->numero; ?>
		</td>
       		<td>
			<?php echo $row->monto; ?>
		</td>
       		<td>
			<?php echo $row->descripcion; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
