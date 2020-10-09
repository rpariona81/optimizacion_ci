<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
			<b><?=$iepublica?></b>
		</h2>
</div>
	<div class="panel-body">
		<div class="content-row">
			<div class="row">
                <div class="table-responsive">
				<table id="queryDataTable" role="grid" class="table display" cellspacing="0" width="100%">
				<thead>
					<tr>						
						<th>COD_LOCAL</th>
						<th>COD_MOD</th>						
						<th>Anexo</th>						
						<th>Nivel</th>
						<th>Nombre IE</th>
						<th>Modalidad</th>
						<th>Caracteristica</th>
						<th>Tot Alumnos</th>
						<th>Tot Secciones</th>
						<th>Tot Docentes</th>
						<th>Turno</th>
						<th>Estado</th>
						<th>Departamento</th>
						<th>Provincia</th>
						<th>Distrito</th>
						<th>Centro Poblado</th>
						<th>GPS Latitud</th>
						<th>GPS Longitud</th>
						<th>GoogleMaps</th>
						<th>Fecha Actualizacion</th>
						<th>Fecha Publicación</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query as $item): ?>
					<tr>
						<td><?= $item->codlocal?></td>
						<td><?= $item->cod_mod?></td>
						<td><?= $item->anexo?></td>
						<td><?= $item->d_niv_mod?></td>
						<td><?= $item->cen_edu?></td>
						<td><?= $item->d_forma?></td>
						<td><?= $item->d_cod_car?></td>
						<td><?= $item->talumno?></td>
						<td><?= $item->tseccion?></td>
						<td><?= $item->tdocente?></td>
						<td><?= $item->d_cod_tur?></td>
						<td><?= $item->d_estado?></td>
						<td><?= $item->d_dpto?></td>
						<td><?= $item->d_prov?></td>
						<td><?= $item->d_dist?></td>
						<td><?= $item->cen_pob?></td>
						<td><?= $item->nlat_ie?></td>
						<td><?= $item->nlong_ie?></td>
						<td><?= anchor_popup('https://www.google.com.pe/maps/@'.$item->nlat_ie.','.$item->nlong_ie.',14z',"Ver mapa")?></td>
						<td><?= $item->fecha_act?></td>
						<td><?= $item->d_fecpub?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div>

</div>