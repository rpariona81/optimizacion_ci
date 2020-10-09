<div class="page-header">
    <h1>Encuesta de percepci&oacute;n de servicios <small>Centro de Servicios al Contribuyente</small></h1>
    <?php
    echo anchor('usupotenciales/todos', 'TODOS', array('id' => 'vervalidos', 'class' => 'btn btn-warning btn-sm')) . " ";
    echo anchor('usupotenciales/validos', 'VALIDOS', array('id' => 'vervalidos', 'class' => 'btn btn-success btn-sm')) . " ";
    echo anchor('usupotenciales/pendientes', 'PENDIENTES', array('id' => 'verpendientes', 'class' => 'btn btn-info btn-sm')) . " ";
    echo anchor('usupotenciales/eliminados', 'ELIMINADOS', array('id' => 'vereliminados', 'class' => 'btn btn-danger btn-sm')) . " ";
    echo '<div style="float:right; margin-right:10px;">';
    echo anchor('usupotenciales/exporta_csc_usu_ext_norte2', 'Descarga LIMA NORTE 2', array('class' => 'btn btn-primary btn-sm'));
    echo '</div>';
    ?>
</div>

<div id="tabla-data" role="wrapper" class="dataTable_wrapper form-inline dt-bootstrap"> 
    <table id="v_encuestacsc" role="grid" data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
        <thead>
            <tr>
                <th data-field="state" data-checkbox="true">ID</th>
                <th data-field="USUARIO" data-sortable="true">USUARIO</th>
                <th>ZONA</th>
                <th>ENCUESTADOR</th>
                <th data-field="CUEST" data-sortable="true">CUEST</th>
                <th>DISTRITO</th>
                <th>CONGLOMERADO</th>
                <th>VIVIENDA</th>
                <th>ENTREVISTADO</th>
                <th>ESTADO</th>
                <th>FECHA</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>USUARIO</th>
                <th>ZONA</th>
                <th>ENCUESTADOR</th>
                <th>CUEST</th>
                <th>DISTRITO</th>
                <th>CONGLOMERADO</th>
                <th>VIVIENDA</th>
                <th>ENTREVISTADO</th>
                <th>ESTADO</th>
                <th>FECHA</th>
                <th>ACCIONES</th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($cuestionarios as $item): ?>
                <tr class="todo-list">
                    <td><?= $item->ID ?></td>
                    <td><?= $item->USUARIO ?></td>
                    <td><?= $item->ZONA ?></td>
                    <td><?= $item->ENCUESTADOR ?></td>
                    <td><?= $item->CUEST ?></td>
                    <td ><?= $item->DISTRITO ?></td>
                    <td ><?= $item->CONGLOMERADO ?></td>
                    <td ><?= $item->VIVIENDA ?></td>
                    <td><?= utf8_encode($item->ENTREVISTADO) ?></td>
                    <td ><?= $item->ESTADO ?></td>
                    <td ><?= $item->FECHA ?></td>
                    <td class="text-center" >
                        <?= anchor('usupotenciales/irpagina1/' . $item->ID, 'Ir a cuestionario <svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>', array('class' => 'btn btn-warning btn-sm')) ?>
                        <?php
                        if ($item->ACTIVO == '0') {
                            echo anchor('usupotenciales/activar/' . $item->ID, 'Habilitar <svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg>', array('class' => 'trash btn btn-danger btn-sm'));
                        }
                        ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Bar Chart</div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
                    
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->
<script type="text/javascript">
window.onload = function(){
	var chart2 = document.getElementById("bar-chart").getContext("2d");
	window.myBar = new Chart(chart2).Bar(barChartData, {
		responsive : true
	});
    };
</script>