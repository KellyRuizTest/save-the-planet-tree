<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      nombre		</th>
 		<th width="80px">
		      razon		</th>
 		<th width="80px">
		      creacion		</th>
 		<th width="80px">
		      saldo		</th>
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
			<?php echo $row->razon; ?>
		</td>
       		<td>
			<?php echo $row->creacion; ?>
		</td>
       		<td>
			<?php echo $row->saldo; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
