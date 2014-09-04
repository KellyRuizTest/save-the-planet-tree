<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      nombre		</th>
 		<th width="80px">
		      descripcion		</th>
 		<th width="80px">
		      idzona		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->nombre; ?>
		</td>
       		<td>
			<?php echo $row->descripcion; ?>
		</td>
       		<td>
			<?php echo $row->idzona; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
