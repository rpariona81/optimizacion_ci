<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
			<b>Centros poblados</b> <span>(Actualizado al 20-02-2018)</small>
		</h2>
</div>
	<div class="panel-body">
		<div class="content-row">
			<h5>
		   	<?php echo anchor('cargo/create', 'Agregar', array('class'=>'btn btn-primary')); ?>
			</h5>
			<div class="row">
                <div class="table-responsive">
				<table id="queryDataTable" role="grid" class="table display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Ubigeo</th>
						<th>Departamento</th>						
						<th>Provincia</th>	
						<th>Distrito</th>	
						<th>Centro Poblado</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query as $item): ?>
					<tr>
						<td><?= $item->row_number?></td>
						<td><?= $item->ubigeo?></td>
						<td><?= $item->departamen?></td>
						<td><?= $item->provincia?></td>						
						<td><?= $item->distrito?></td>
						<td><?= $item->nomccpp_1?></td>
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
			"ajax": "<?= base_url('cobertuta/intento'); ?>",
            "language": {
              "url": "<?= base_url('resources/js/'); ?>Spanish.json",
               decimal: "."
            }
        });
    });
</script>