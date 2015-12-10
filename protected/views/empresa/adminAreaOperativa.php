<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($List as $key=>$model): ?>
		<tr>
			<th><?php echo $model->are_nombre ?></th>
			<th>
				Editar|Eliminar <?php echo $model->are_desabilitado ?><a href="deleteAreaOperativa/<?php echo $key ?>">Eliminar</a>
			</th>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>