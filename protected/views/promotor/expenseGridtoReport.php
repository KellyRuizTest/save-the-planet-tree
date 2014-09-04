<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      permanente		</th>
 		<th width="80px">
		      activo		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->permanente; ?>
		</td>
       		<td>
			<?php echo $row->activo; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
