<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      coordinador		</th>
 		<th width="80px">
		      idcomite		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->coordinador; ?>
		</td>
       		<td>
			<?php echo $row->idcomite; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
