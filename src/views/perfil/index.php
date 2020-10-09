<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
			<b>Roles</b> <span>(definición de cargos)</small>
		</h2>
</div>
	<div class="panel-body">
		<div class="content-row">
			<h5>
		   	<?php echo anchor('perfil/create', 'Agregar', array('class'=>'btn btn-primary')); ?>
			</h5>
			<div class="row">
                <div class="table-responsive">
				<table id="queryDataTable" role="grid" class="table display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Creado</th>
						<th>Modificado</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query as $item): ?>
					<tr>
						<td><?= anchor('perfil/edit/'.$item->id,$item->id); ?></td>
						<td><?= $item->cargo?></td>
						<td><?= date("d/m/Y - H:i:s",strtotime($item->created_at)); ?></td>
						<?php if ($item->updated_at): ?>
							<td><?= date("d/m/Y - H:i:s",strtotime($item->updated_at)); ?></td>
						<?php else: ?>
							<td></td>
						<?php endif; ?>
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