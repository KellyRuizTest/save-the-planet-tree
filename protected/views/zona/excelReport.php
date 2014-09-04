<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      nombre		</th>
 		<th width="80px">
		      desripcion		</th>
 		<th width="80px">
		      precipitacion		</th>
 		<th width="80px">
		      temperatura		</th>
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
			<?php echo $row->desripcion; ?>
		</td>
       		<td>
			<?php echo $row->precipitacion; ?>
		</td>
       		<td>
			<?php echo $row->temperatura; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
