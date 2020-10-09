<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
			<b>Opciones de Menú</b> <span>(mantenimiento de menús)</span>
		</h2>
	</div>
	<div class="panel-body">
		<div class="content-row">
			<h5>
   			<?= anchor('menu/create', 'Agregar', array('class'=>'btn btn-primary')); ?>
			</h5>
			<div class="row">
                <div class="table-responsive">
				<table id="queryDataTable" role="grid" class="table display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Controlador</th>
						<th>Acci&oacute;n</th>
						<th>URL</th>
						<th>Orden</th>
						<th>Creado</th>
						<th>Icono</th>
						<th>Accesos</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query as $item): ?>
					<tr>
						<td><?= anchor('menu/edit/'.$item->id,$item->row_number)?></td>
						<td><?= $item->menu?></td>
						<td><?= $item->controlador?></td>
						<td><?= $item->accion?></td>
						<td><?= $item->url?></td>
						<td class="text-center"><?= $item->orden?></td>
						<td><?= date("d/m/Y - H:i:s",strtotime($item->created_at)); ?></td>
						<td class="text-center"><?= $item->icono ?></td>
						<td class="text-center"><?= anchor('menu/menu_perfiles/'.$item->id,'<i class="glyphicon glyphicon-lock"></i>'); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
    $(document).ready(function() {
        $('#queryDataTable').DataTable({
            responsive: true,
			stateSave: true,
            "language": {
              "url": "<?= base_url('resources/js/'); ?>Spanish.json",
               decimal: "."
            }
        });
    });
</script>