<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
			<b>Usuarios</b> <span>(nuevos registros y actualizaciones)</span>
		</h2>
	</div>
	<div class="panel-body">
		<div class="content-row">
		<h5>
		<?php echo anchor('usuario/create', 'Nuevo usuario', array('class'=>' btn btn-primary'))?>
		<!--<a href="#" id="demo" onClick ="$('#queryDataTable').tableExport({tableName:'usuarios',type:'excel',escape:'false'});" class="btn btn-danger">XLS</a>-->
		</h5>
		<div class="row">
        	<div class="table-responsive">
			<table id="queryDataTable" name="queryDataTable" role="grid" class="table display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Login</th>
					<th>Email</th>
					<th>Perfil</th>
					<th>Creado</th>
					<th>Modificado</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($query as $item): ?>
				<tr>
					<td class="text-center">
						<?php 
						if($item->id == 1 || $this->session->usuario_id == $item->id){
							echo $item->row_number;
						}else{
							echo anchor('usuario/edit/'.$item->id,$item->row_number);
						} ?>
					</td>
					<td><?php echo $item->nombres?></td>
					<td><?php echo $item->usuario?></td>
					<td><?php echo $item->email?></td>
					<td><?php echo $item->cargo?></td>
					<td><?php echo $item->created_at?></td>
					<td><?php echo $item->updated_at?></td>
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
		 	dom: 'lBfrtip',
		 	buttons: [
                    'excel',
					'csv',
                    'pdf',
                    'print'
                ],
			responsive: true,
			stateSave: true,
            "language": {
              "url": "<?= base_url('resources/js/'); ?>Spanish.json",
               decimal: "."
			}
		});
    });
</script>
