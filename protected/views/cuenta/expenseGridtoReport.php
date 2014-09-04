<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      numero		</th>
 		<th width="80px">
		      titular		</th>
 		<th width="80px">
		      idcomite		</th>
 		<th width="80px">
		      idbanco		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->numero; ?>
		</td>
       		<td>
			<?php echo $row->titular; ?>
		</td>
       		<td>
			<?php echo $row->idcomite; ?>
		</td>
       		<td>
			<?php echo $row->idbanco; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
