<div class="page-header">
	<h1>Accesos <small> permisos de men&uacute; seg&uacute;n perfil</small></h1>
</div>
<?= form_open('menu_perfil/search', array('class'=>'form-search')); ?>
	<?= form_input(array('type'=>'text', 'name'=>'buscar', 'id'=>'buscar', 'placeholder' => 'Buscar por nombre...', 'class' => 'input-medium search-query','onkeyup' => 'this.value=this.value.toUpperCase()'));?>
	<?= form_button(array('type'=>'submit', 'content'=>'<i class="glyphicon glyphicon-search"></i>', 'class'=>'btn')); ?>
   	<?= anchor('menu_perfil/create', 'Agregar', array('class'=>'btn btn-primary')); ?>
<?= form_close(); ?>
<div>
	<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Men&uacute;</th>
			<th>Perfil</th>
			<th>Creado</th>
			<th>Modificado</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $item): ?>
		<tr>
			<td><?= anchor('menu_perfil/edit/'.$item->id,$item->id); ?></td>
			<td><?= $item->menu?></td>
			<td><?= $item->cargo?></td>
			<td><?= date("d/m/Y - H:i",strtotime($item->created_at)); ?></td>
			<?php if ($item->updated_at): ?>
				<td><?= date("d/m/Y - H:i",strtotime($item->updated_at)); ?></td>
			<?php else: ?>
				<td></td>
			<?php endif; ?>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>