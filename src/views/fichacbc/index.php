<script>
    $(document).ready(function () {
        $('#v_portadas').dataTable({
            stateSave: true,
            language: {
                url: "<?= base_url('lib'); ?>/Spanish.json",
                decimal: ","
            }
        });
    });
</script>
<div class="page-header">
    <h1>Fichas CBC<small>(Procesadas)</small></h1>
</div>

<div id="tabla-data" role="wrapper" class="dataTable_wrapper form-inline dt-bootstrap"> 
    <table id="v_portadas" role="grid" data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
        <thead>
            <tr>
                <th data-field="row_number" data-sortable="true">#</th>
                <th data-field="codigo" data-sortable="true">COD MOD</th>
                <th>Nombre en el padrón</th>
                <th>Instituto</th>
                <th>Dirección</th>
                <th>Región</th>
                <th>Provincia</th>
                <th>Distrito</th>
                <th>Fecha visita</th>
                <th>Resultado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $item): ?>
                <tr class="todo-list">
                    <td><?= $item->row_number ?></td>
                    <td><?= $item->COD_MOD ?></td>
                    <td><?= $item->CEN_EDU ?></td>
                    <td><?= $item->instituto ?></td>
                    <td><?= $item->direccion ?></td>
                    <td><?= $item->region ?></td>
                    <td><?= $item->provincia ?></td>
                    <td><?= $item->distrito ?></td>
                    <td><?= $item->fecha ?></td>
                    <td><?= $item->resultado_visita ?></td>
                    <td class="text-center" >
                        <?= anchor('encuestacsc/irpagina1/' . $item->id, 'Ir a cuestionario <svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>', array('class' => 'btn btn-warning btn-sm')) ?>
                        <?= anchor('encuestacsc/borrar/' . $item->id, 'Eliminar <svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg>', array('class' => 'trash btn btn-danger btn-sm')) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
