<div class="page-header">
    <h1>Encuesta de percepci&oacute;n de servicios <small>Centro de Servicios al Contribuyente</small>
    <?php
    echo anchor('encuestaccf/addcuestionario', 'Agregar cuestionarios', array('class' => 'btn btn-primary pull-right'));
    ?>
    </h1>
</div>

<div id="tabla-data" role="wrapper" class="dataTable_wrapper form-inline dt-bootstrap"> 
    <table id="v_encuestacsc" role="grid" data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
        <thead>
            <tr>
                <th data-field="state" data-checkbox="true">ID</th>
                <th data-field="codigo" data-sortable="true">CUEST</th>
                <th>ZONA</th>
                <th>CENTRO DE CONTROL Y FISCALIZACION</th>
                <th>ENCUESTADO</th>
                <th>RUC</th>
                <th>DISTRITO</th>
                <th>ESTADO</th>
                <th>FECHA</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>CUEST</th>
                <th>ZONA</th>
                <th>CENTRO DE CONTROL Y FISCALIZACION</th>
                <th>ENCUESTADO</th>
                <th>RUC</th>
                <th>DISTRITO</th>
                <th>ESTADO</th>
                <th>FECHA</th>
                <th>ACCIONES</th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($cuestionarios as $item): ?>
                <tr class="todo-list">
                    <td><?= $item->ID ?></td>
                    <td><?= $item->CUEST ?></td>
                    <td><?= $item->ZONA ?></td>
                    <td><?= utf8_decode($item->SEDE) ?></td>
                    <td><?= utf8_decode($item->ENCUESTADO) ?></td>
                    <td ><?= $item->RUC ?></td>
                    <td ><?= $item->DISTRITO ?></td>
                    <td ><?= $item->ESTADO ?></td>
                    <td ><?= $item->FECHA ?></td>
                    <td class="text-center" >
                        <?= anchor('encuestaccf/irpagina1/' . $item->ID, 'Ir a cuestionario <svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>', array('class' => 'btn btn-warning btn-sm')) ?>
                        <?= anchor('encuestaccf/borrar/' . $item->ID, 'Eliminar <svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg>', array('class' => 'trash btn btn-danger btn-sm')) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
