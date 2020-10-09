<script>
    $(document).ready(function () {
        $('#padronweb').dataTable({
            stateSave: true,
            language: {
                url: "<?= base_url('lib'); ?>/Spanish.json",
                decimal: ","
            }/*,
             stateSave: true*/
        });
    });
</script>
<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span
				class="fa fa-angle-double-left" data-toggle="offcanvas"
				title="Maximize Panel"></span></a> <b>Padrón Web MINEDU - IESTP</b> <span>(Actualizado
				al 27-01-2020)</small>
		
		</h2>
	</div>
	<div class="panel-body">
		<div class="content-row">
			<br />
			<div class="row">
				<div id="tabla-data" role="wrapper"
					class="dataTable_wrapper form-inline dt-bootstrap">
					<table id="padronweb" role="grid" data-toggle="table"
						data-show-refresh="true" data-show-toggle="true"
						data-show-columns="true" data-search="true"
						data-select-item-name="toolbar1" data-pagination="true"
						data-sort-name="name" data-sort-order="desc">
						<thead>
							<tr>
								<th data-field="row_number" data-sortable="true">#</th>
								<th data-field="COD_MOD" data-sortable="true">Cód. Mod.</th>
								<th data-field="CEN_EDU" data-sortable="true">Centro Educativo</th>
								<th data-field="D_GES_DEP" data-sortable="true">Gestión/Dependencia</th>
								<th data-field="D_DPTO" data-sortable="true">Región</th>
								<th data-field="D_PROV" data-sortable="true">Provincia</th>
								<th data-field="D_DIST" data-sortable="true">Distrito</th>
								<th data-field="DIR_CEN" data-sortable="true">Dirección</th>
								<th data-field="TALUMNO" data-sortable="true">#Alumnos</th>
								<th data-field="TDOCENTE" data-sortable="true">#Docentes</th>
								<th data-field="FECHAREG" data-sortable="true">Fecha inscripción</th>
								<th data-field="OPTIMIZACION" data-sortable="true">Optimización</th>
								<th data-field="RECOJO" data-sortable="true">Recojo información</th>
							</tr>
						</thead>
						
						<tbody>
                            <?php foreach ($query as $item): ?>
                                <tr class="todo-list">
								<td><?= $item->row_number ?></td>
								<td><?= $item->COD_MOD ?></td>
								<td><?= $item->CEN_EDU ?></td>
								<td><?= $item->D_GES_DEP ?></td>
								<td><?= $item->REGION ?></td>
								<td><?= $item->D_PROV ?></td>
								<td><?= $item->D_DIST ?></td>
								<td><?= $item->DIR_CEN ?></td>
								<td><?= $item->TALUMNO ?></td>
								<td><?= $item->TDOCENTE ?></td>
								<td><?= $item->FECHAREG ?></td>
								<td><?= $item->OPTIMIZACION ?></td>
								<td><?= $item->RECOJO ?></td>
							</tr>
                            <?php endforeach; ?>
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>