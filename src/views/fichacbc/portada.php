<script>
    $(document).ready(function () {
        $(":input").on("keydown", function (event) {
            if ((event.which === 13 || event.keyCode === 13) && !$(this).is("textarea, :button, :submit")) {
                event.stopPropagation();
                event.preventDefault();
                $(this)
                        .nextAll(":input:not(:disabled, [readonly='readonly'])")
                        .first()
                        .focus();
            }
        });
        $("form[name='page1']").validate({
            focusCleanup: true,
            ignore: [],
            // Specify validation rules
            rules: {
                codigo_modular: {required: true, digits: true, minlength: 12},
                direccion: {required: true, digits: true, minlength: 12},
                instituto: "required",
                distrito: "required",
                provincia: "required",
                region: "required",
                director: "required",
                dni_director: "required",
                titulo_director: "required",
                celular_director: "required",
                informante: "required",
                dni_informante: "required",
                titulo_informante: "required",
                cargo_informante: "required",
                celular_informante: "required",
                resultado_visita: "required"
            }
            //Estilo para el mensaje de error
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents('.container'));
                } else if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>
<br/>
<ul class="tab">
    <li class="pull-left"><a href="<?= site_url('fichacbc/index/'); ?>">Regresar a la lista</a></li>
</ul>

<div class="panel panel-primary">
    <div class="panel-heading">
        CUESTIONARIO NRO. <?= $form1->CUEST ?>
    </div>
    <div class="panel-body">
        <?= form_open('fichacbc/reg_portada', array('id' => 'page1', 'name' => 'page1', 'class' => 'form-horizontal')); ?>
        <?= validation_errors(); ?>
        <fieldset>
            <?= form_hidden('ID', $form1->ID); ?>
            <div class="bloque col-sm-12">UBICACION MUESTRAL</div>
            <div class="form-group">
                <?= form_label('ENCUESTADOR', '', array('class' => 'col-sm-3')); ?>
                <?= form_label('DISTRITO', '', array('class' => 'col-sm-3')); ?>
                <?= form_label('CONGLOMERADO', '', array('class' => 'col-sm-2')); ?>
                <?= form_label('MANZANA', '', array('class' => 'col-sm-2')); ?>
                <?= form_label('VIVIENDA', '', array('class' => 'col-sm-1')); ?>
                <?= form_label('HOGAR', '', array('class' => 'col-sm-1')); ?>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <?= form_input(array('type' => 'text', 'name' => 'ENC_NOMB', 'id' => 'ENC_NOMB', 'maxlength' => '80', 'value' => $form1->ENC_NOMB, 'onkeyup' => 'this.value=this.value.toUpperCase()', 'class' => "form-control input-sm")); ?>
                </div>
                <div class="col-sm-3">
                    <?= form_dropdown('UBIGEO', $distritos, $form1->UBIGEO, 'class="form-control input-sm" id="UBIGEO"'); ?>
                </div>
                <div class="col-sm-2">
                    <?= form_dropdown('CONGLOMERADO', $conglomerados, $form1->CONGLOMERADO, 'class="form-control input-sm" id="CONGLOMERADO"'); ?>
                </div>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'MZNNUM', 'id' => 'MZNNUM', 'maxlength' => '3', 'value' => $form1->MZNNUM, 'class' => "form-control input-sm")); ?>
                </div>
                <div class="col-sm-1">
                    <?= form_input(array('type' => 'text', 'name' => 'VIVIENDA', 'id' => 'VIVIENDA', 'maxlength' => '2', 'value' => $form1->VIVIENDA, 'class' => "form-control input-sm")); ?>
                </div>
                <div class="col-sm-1">
                    <?= form_input(array('type' => 'text', 'name' => 'HOGAR', 'id' => 'HOGAR', 'maxlength' => '2', 'value' => $form1->HOGAR, 'class' => "form-control input-sm")); ?>
                </div> 
            </div>
            <div class="bloque col-sm-12">IDENTIFICACIÓN DEL ENTREVISTADO</div>
            <div class="form-group">  
                <?= form_label('Nombres y apellidos', '', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-3">
                    <?= form_input(array('type' => 'text', 'name' => 'NOMBRES', 'id' => 'NOMBRES', 'placeholder' => 'NOMBRES', 'value' => $form1->NOMBRES, 'onkeyup' => 'this.value=this.value.toUpperCase()', 'class' => "form-control input-sm")); ?>
                </div>
                <div class="col-sm-3">
                    <?= form_input(array('type' => 'text', 'name' => 'APELLIDOS', 'id' => 'APELLIDOS', 'placeholder' => 'APELLIDOS', 'value' => $form1->APELLIDOS, 'onkeyup' => 'this.value=this.value.toUpperCase()', 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('Dirección', 'DIRECCION', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?= form_input(array('type' => 'text', 'name' => 'DIRECCION', 'id' => 'DIRECCION', 'placeholder' => 'DIRECCIÓN ACTUAL', 'value' => $form1->DIRECCION, 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '125', 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="bloque col-sm-12">I. INFORMACIÓN FILTRO DEL HOGAR</div>
            <div class="form-group">
                <?= form_label('1. ¿Cuántos hogares existen en la vivienda?', 'P1', array('class' => 'col-sm-7')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P1', 'id' => 'P1', 'maxlength' => '2', 'value' => $form1->P1, 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('2. ¿Cuántos miembros en total existen en el hogar?', 'P2', array('class' => 'col-sm-7')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P2', 'id' => 'P2', 'maxlength' => '2', 'value' => $form1->P2, 'class' => "form-control input-sm")); ?>
                </div>
            </div> 
            <div class="form-group">
                <?= form_label('3. ¿Cuántos de ellos tienen una actividad económica, o trabajo que le genere algún ingreso?', 'P3', array('class' => 'col-sm-7')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P3', 'id' => 'P3', 'maxlength' => '2', 'value' => $form1->P3, 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('3.a ¿Cuántos están en planilla?', 'P3_A', array('class' => 'col-sm-7 control-label')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P3_A', 'id' => 'P3_A', 'maxlength' => '2', 'value' => $form1->P3_A, 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('3.b ¿Cuántos tienen RUC?', 'P3_B', array('class' => 'col-sm-7 control-label')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P3_B', 'id' => 'P3_B', 'maxlength' => '2', 'value' => $form1->P3_B, 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('3.c ¿Cuántas personas que tienen alguna actividad económica no están en planilla ni tienen RUC?', 'P3_C', array('class' => 'col-sm-7 control-label')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P3_C', 'id' => 'P3_C', 'maxlength' => '2', 'value' => $form1->P3_C, 'class' => "form-control input-sm")); ?>
                </div>
            </div>

            <div class="bloque col-sm-12">II. PARA LAS PERSONAS QUE TIENEN ACTIVIDAD ECONÓMICA Y NO ESTÁN EN PLANILLA NI TIENEN RUC</div>

            <div class="form-group">
                <?= form_label('4. ¿Qué edad en años cumplidos tiene?', 'P4', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P4', 'id' => 'P4', 'maxlength' => '2', 'value' => $form1->P4, 'class' => "form-control input-sm")); ?>
                </div>
                <div class="col-sm-4">
                    <h6>* Colocar 99 para omisiones.</h6>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('5. ¿Cuál es el grado de instrucción máximo alcanzado?', 'P5', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php
                    $dataP5_1 = array(
                        'name' => 'P5', 'id' => 'P5', 'value' => 1, 'checked' => ($form1->P5 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP5_2 = array(
                        'name' => 'P5', 'id' => 'P5', 'value' => 2, 'checked' => ($form1->P5 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP5_3 = array(
                        'name' => 'P5', 'id' => 'P5', 'value' => 3, 'checked' => ($form1->P5 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP5_4 = array(
                        'name' => 'P5', 'id' => 'P5', 'value' => 4, 'checked' => ($form1->P5 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP5_5 = array(
                        'name' => 'P5', 'id' => 'P5', 'value' => 5, 'checked' => ($form1->P5 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP5_6 = array(
                        'name' => 'P5', 'id' => 'P5', 'value' => 6, 'checked' => ($form1->P5 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP5_7 = array(
                        'name' => 'P5', 'id' => 'P5', 'value' => 7, 'checked' => ($form1->P5 === '7' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP5_8 = array(
                        'name' => 'P5', 'id' => 'P5', 'value' => 8, 'checked' => ($form1->P5 === '8' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP5_9 = array(
                        'name' => 'P5', 'id' => 'P5', 'value' => 9, 'checked' => ($form1->P5 === '9' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP5_10 = array(
                        'name' => 'P5', 'id' => 'P5', 'value' => 10, 'checked' => ($form1->P5 === '10' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-4">
                        <div class="radio">
                            <?= form_label(form_radio($dataP5_1) . ' Ninguno', 'P5_x1'); ?>
                        </div>
                        <div class="radio">
                            <?= form_label(form_radio($dataP5_2) . ' Primaria incompleta', 'P5_x2'); ?>
                        </div>
                        <div class="radio">
                            <?= form_label(form_radio($dataP5_3) . ' Primaria completa', 'P5_x3'); ?>
                        </div>
                        <div class="radio">
                            <?= form_label(form_radio($dataP5_4) . ' Secundaria incompleta', 'P5_x4'); ?>
                        </div>
                        <div class="radio">
                            <?= form_label(form_radio($dataP5_5) . ' Secundaria completa', 'P5_x5'); ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="radio">
                            <?= form_label(form_radio($dataP5_6) . ' Superior técnica incompleta', 'P5_x6'); ?>
                        </div>
                        <div class="radio">
                            <?= form_label(form_radio($dataP5_7) . ' Superior técnica completa', 'P5_x7'); ?>
                        </div>
                        <div class="radio">
                            <?= form_label(form_radio($dataP5_8) . ' Superior universitaria incompleta', 'P5_x8'); ?>
                        </div>
                        <div class="radio">
                            <?= form_label(form_radio($dataP5_9) . ' Superior universitaria completa', 'P5_x9'); ?>
                        </div>
                        <div class="radio">
                            <?= form_label(form_radio($dataP5_10) . ' Otro ' . form_input(array('type' => 'text', 'name' => 'P5_O', 'id' => 'P5_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'maxlength' => '60', 'value' => $form1->P5_O, 'size' => '60', 'class' => 'form-control form-inline input-sm')), 'P5_x10'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('6. ¿Cuál es su ocupación principal y secundaria?', '', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-8">
                    <?php
                    $dataP6_PRINCIP_1 = array(
                        'name' => 'P6_OCUP_PRINCIP', 'id' => 'P6_OCUP_PRINCIP', 'value' => 1, 'checked' => ($form1->P6_OCUP_PRINCIP === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP6_PRINCIP_2 = array(
                        'name' => 'P6_OCUP_PRINCIP', 'id' => 'P6_OCUP_PRINCIP', 'value' => 2, 'checked' => ($form1->P6_OCUP_PRINCIP === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP6_SECUND_1 = array(
                        'name' => 'P6_OCUP_SECUND', 'id' => 'P6_OCUP_SECUND', 'value' => 1, 'checked' => ($form1->P6_OCUP_SECUND === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP6_SECUND_2 = array(
                        'name' => 'P6_OCUP_SECUND', 'id' => 'P6_OCUP_SECUND', 'value' => 2, 'checked' => ($form1->P6_OCUP_SECUND === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Principal</th>
                                <th class="text-center">Secundaria</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Trabajador dependiente</th>
                                <td class="text-center"><?= form_radio($dataP6_PRINCIP_1); ?></td>
                                <td class="text-center"><?= form_radio($dataP6_SECUND_1); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Trabajador independiente</th>
                                <td class="text-center"><?= form_radio($dataP6_PRINCIP_2); ?></td>
                                <td class="text-center"><?= form_radio($dataP6_SECUND_2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('7. ¿En su centro de trabajo Ud. es...?', '', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-8">
                    <?php
                    $dataP7_PRINCIP_1 = array(
                        'name' => 'P7_OCUP_PRINCIP', 'id' => 'P7_OCUP_PRINCIP', 'value' => 1, 'checked' => ($form1->P7_OCUP_PRINCIP === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_PRINCIP_2 = array(
                        'name' => 'P7_OCUP_PRINCIP', 'id' => 'P7_OCUP_PRINCIP', 'value' => 2, 'checked' => ($form1->P7_OCUP_PRINCIP === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_PRINCIP_3 = array(
                        'name' => 'P7_OCUP_PRINCIP', 'id' => 'P7_OCUP_PRINCIP', 'value' => 3, 'checked' => ($form1->P7_OCUP_PRINCIP === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_PRINCIP_4 = array(
                        'name' => 'P7_OCUP_PRINCIP', 'id' => 'P7_OCUP_PRINCIP', 'value' => 4, 'checked' => ($form1->P7_OCUP_PRINCIP === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_PRINCIP_5 = array(
                        'name' => 'P7_OCUP_PRINCIP', 'id' => 'P7_OCUP_PRINCIP', 'value' => 5, 'checked' => ($form1->P7_OCUP_PRINCIP === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_PRINCIP_6 = array(
                        'name' => 'P7_OCUP_PRINCIP', 'id' => 'P7_OCUP_PRINCIP', 'value' => 6, 'checked' => ($form1->P7_OCUP_PRINCIP === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_PRINCIP_7 = array(
                        'name' => 'P7_OCUP_PRINCIP', 'id' => 'P7_OCUP_PRINCIP', 'value' => 7, 'checked' => ($form1->P7_OCUP_PRINCIP === '7' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_SECUND_1 = array(
                        'name' => 'P7_OCUP_SECUND', 'id' => 'P7_OCUP_SECUND', 'value' => 1, 'checked' => ($form1->P7_OCUP_SECUND === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_SECUND_2 = array(
                        'name' => 'P7_OCUP_SECUND', 'id' => 'P7_OCUP_SECUND', 'value' => 2, 'checked' => ($form1->P7_OCUP_SECUND === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_SECUND_3 = array(
                        'name' => 'P7_OCUP_SECUND', 'id' => 'P7_OCUP_SECUND', 'value' => 3, 'checked' => ($form1->P7_OCUP_SECUND === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_SECUND_4 = array(
                        'name' => 'P7_OCUP_SECUND', 'id' => 'P7_OCUP_SECUND', 'value' => 4, 'checked' => ($form1->P7_OCUP_SECUND === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_SECUND_5 = array(
                        'name' => 'P7_OCUP_SECUND', 'id' => 'P7_OCUP_SECUND', 'value' => 5, 'checked' => ($form1->P7_OCUP_SECUND === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_SECUND_6 = array(
                        'name' => 'P7_OCUP_SECUND', 'id' => 'P7_OCUP_SECUND', 'value' => 6, 'checked' => ($form1->P7_OCUP_SECUND === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP7_SECUND_7 = array(
                        'name' => 'P7_OCUP_SECUND', 'id' => 'P7_OCUP_SECUND', 'value' => 7, 'checked' => ($form1->P7_OCUP_SECUND === '7' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Principal</th>
                                <th class="text-center">Secundaria</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Empleador o patrono</th>
                                <td class="text-center"><?= form_radio($dataP7_PRINCIP_1); ?></td>
                                <td class="text-center"><?= form_radio($dataP7_SECUND_1); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Trabajador independiente</th>
                                <td class="text-center"><?= form_radio($dataP7_PRINCIP_2); ?></td>
                                <td class="text-center"><?= form_radio($dataP7_SECUND_2); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Empleado</th>
                                <td class="text-center"><?= form_radio($dataP7_PRINCIP_3); ?></td>
                                <td class="text-center"><?= form_radio($dataP7_SECUND_3); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Obrero</th>
                                <td class="text-center"><?= form_radio($dataP7_PRINCIP_4); ?></td>
                                <td class="text-center"><?= form_radio($dataP7_SECUND_4); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Trabajador familiar no remunerado</th>
                                <td class="text-center"><?= form_radio($dataP7_PRINCIP_5); ?></td>
                                <td class="text-center"><?= form_radio($dataP7_SECUND_5); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Trabajador del hogar</th>
                                <td class="text-center"><?= form_radio($dataP7_PRINCIP_6); ?></td>
                                <td class="text-center"><?= form_radio($dataP7_SECUND_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Otro</th>
                                <td class="text-center"><?= form_radio($dataP7_PRINCIP_7) . ' ' . form_input(array('type' => 'text', 'name' => 'P7_OCUP_PRINCIP_O', 'id' => 'P7_OCUP_PRINCIP_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'maxlength' => '60', 'value' => $form1->P7_OCUP_PRINCIP_O, 'size' => '60', 'class' => 'form-control form-inline input-sm')); ?></td>
                                <td class="text-center"><?= form_radio($dataP7_SECUND_7) . ' ' . form_input(array('type' => 'text', 'name' => 'P7_OCUP_SECUND_O', 'id' => 'P7_OCUP_SECUND_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'maxlength' => '60', 'value' => $form1->P7_OCUP_SECUND_O, 'size' => '60', 'class' => 'form-control form-inline input-sm')); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('8. ¿A qué actividad se dedica la empresa o negocio en la que se desempeña?', '', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-8">
                    <?php
                    $dataP8_PRINCIP_1 = array(
                        'name' => 'P8_OCUP_PRINCIP', 'id' => 'P8_OCUP_PRINCIP', 'value' => 1, 'checked' => ($form1->P8_OCUP_PRINCIP === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_PRINCIP_2 = array(
                        'name' => 'P8_OCUP_PRINCIP', 'id' => 'P8_OCUP_PRINCIP', 'value' => 2, 'checked' => ($form1->P8_OCUP_PRINCIP === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_PRINCIP_3 = array(
                        'name' => 'P8_OCUP_PRINCIP', 'id' => 'P8_OCUP_PRINCIP', 'value' => 3, 'checked' => ($form1->P8_OCUP_PRINCIP === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_PRINCIP_4 = array(
                        'name' => 'P8_OCUP_PRINCIP', 'id' => 'P8_OCUP_PRINCIP', 'value' => 4, 'checked' => ($form1->P8_OCUP_PRINCIP === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_PRINCIP_5 = array(
                        'name' => 'P8_OCUP_PRINCIP', 'id' => 'P8_OCUP_PRINCIP', 'value' => 5, 'checked' => ($form1->P8_OCUP_PRINCIP === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_PRINCIP_6 = array(
                        'name' => 'P8_OCUP_PRINCIP', 'id' => 'P8_OCUP_PRINCIP', 'value' => 6, 'checked' => ($form1->P8_OCUP_PRINCIP === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_PRINCIP_7 = array(
                        'name' => 'P8_OCUP_PRINCIP', 'id' => 'P8_OCUP_PRINCIP', 'value' => 7, 'checked' => ($form1->P8_OCUP_PRINCIP === '7' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_PRINCIP_8 = array(
                        'name' => 'P8_OCUP_PRINCIP', 'id' => 'P8_OCUP_PRINCIP', 'value' => 8, 'checked' => ($form1->P8_OCUP_PRINCIP === '8' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_PRINCIP_9 = array(
                        'name' => 'P8_OCUP_PRINCIP', 'id' => 'P8_OCUP_PRINCIP', 'value' => 9, 'checked' => ($form1->P8_OCUP_PRINCIP === '9' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_PRINCIP_10 = array(
                        'name' => 'P8_OCUP_PRINCIP', 'id' => 'P8_OCUP_PRINCIP', 'value' => 10, 'checked' => ($form1->P8_OCUP_PRINCIP === '10' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_SECUND_1 = array(
                        'name' => 'P8_OCUP_SECUND', 'id' => 'P8_OCUP_SECUND', 'value' => 1, 'checked' => ($form1->P8_OCUP_SECUND === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_SECUND_2 = array(
                        'name' => 'P8_OCUP_SECUND', 'id' => 'P8_OCUP_SECUND', 'value' => 2, 'checked' => ($form1->P8_OCUP_SECUND === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_SECUND_3 = array(
                        'name' => 'P8_OCUP_SECUND', 'id' => 'P8_OCUP_SECUND', 'value' => 3, 'checked' => ($form1->P8_OCUP_SECUND === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_SECUND_4 = array(
                        'name' => 'P8_OCUP_SECUND', 'id' => 'P8_OCUP_SECUND', 'value' => 4, 'checked' => ($form1->P8_OCUP_SECUND === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_SECUND_5 = array(
                        'name' => 'P8_OCUP_SECUND', 'id' => 'P8_OCUP_SECUND', 'value' => 5, 'checked' => ($form1->P8_OCUP_SECUND === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_SECUND_6 = array(
                        'name' => 'P8_OCUP_SECUND', 'id' => 'P8_OCUP_SECUND', 'value' => 6, 'checked' => ($form1->P8_OCUP_SECUND === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_SECUND_7 = array(
                        'name' => 'P8_OCUP_SECUND', 'id' => 'P8_OCUP_SECUND', 'value' => 7, 'checked' => ($form1->P8_OCUP_SECUND === '7' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_SECUND_8 = array(
                        'name' => 'P8_OCUP_SECUND', 'id' => 'P8_OCUP_SECUND', 'value' => 8, 'checked' => ($form1->P8_OCUP_SECUND === '8' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_SECUND_9 = array(
                        'name' => 'P8_OCUP_SECUND', 'id' => 'P8_OCUP_SECUND', 'value' => 9, 'checked' => ($form1->P8_OCUP_SECUND === '9' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP8_SECUND_10 = array(
                        'name' => 'P8_OCUP_SECUND', 'id' => 'P8_OCUP_SECUND', 'value' => 10, 'checked' => ($form1->P8_OCUP_SECUND === '10' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Principal</th>
                                <th class="text-center">Secundaria</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Agricultura</th>
                                <td class="text-center"><?= form_radio($dataP8_PRINCIP_1); ?></td>
                                <td class="text-center"><?= form_radio($dataP8_SECUND_1); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Ganadería</th>
                                <td class="text-center"><?= form_radio($dataP8_PRINCIP_2); ?></td>
                                <td class="text-center"><?= form_radio($dataP8_SECUND_2); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Minería</th>
                                <td class="text-center"><?= form_radio($dataP8_PRINCIP_3); ?></td>
                                <td class="text-center"><?= form_radio($dataP8_SECUND_3); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Adm. Pública</th>
                                <td class="text-center"><?= form_radio($dataP8_PRINCIP_4); ?></td>
                                <td class="text-center"><?= form_radio($dataP8_SECUND_4); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Industria</th>
                                <td class="text-center"><?= form_radio($dataP8_PRINCIP_5); ?></td>
                                <td class="text-center"><?= form_radio($dataP8_SECUND_5); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Comercio</th>
                                <td class="text-center"><?= form_radio($dataP8_PRINCIP_6); ?></td>
                                <td class="text-center"><?= form_radio($dataP8_SECUND_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Servicio</th>
                                <td class="text-center"><?= form_radio($dataP8_PRINCIP_7); ?></td>
                                <td class="text-center"><?= form_radio($dataP8_SECUND_7); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Construcción</th>
                                <td class="text-center"><?= form_radio($dataP8_PRINCIP_8); ?></td>
                                <td class="text-center"><?= form_radio($dataP8_SECUND_8); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Pesca</th>
                                <td class="text-center"><?= form_radio($dataP8_PRINCIP_9); ?></td>
                                <td class="text-center"><?= form_radio($dataP8_SECUND_9); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Otro</th>
                                <td class="text-center"><?= form_radio($dataP8_PRINCIP_10) . ' ' . form_input(array('type' => 'text', 'name' => 'P8_OCUP_PRINCIP_O', 'id' => 'P8_OCUP_PRINCIP_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'maxlength' => '60', 'value' => $form1->P8_OCUP_PRINCIP_O, 'size' => '60', 'class' => 'form-control form-inline input-sm')); ?></td>
                                <td class="text-center"><?= form_radio($dataP8_SECUND_10) . ' ' . form_input(array('type' => 'text', 'name' => 'P8_OCUP_SECUND_O', 'id' => 'P8_OCUP_SECUND_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'maxlength' => '60', 'value' => $form1->P8_OCUP_SECUND_O, 'size' => '60', 'class' => 'form-control form-inline input-sm')); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('8.a. En un mes regular ¿A cuánto asciende sus INGRESOS y/o GANANCIAS del mes en su ocupación principal?', 'P8_A_OCUP_PRINCIP', array('class' => 'col-sm-9')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P8_A_OCUP_PRINCIP', 'id' => 'P8_A_OCUP_PRINCIP', 'placeholder' => 'SOLES', 'maxlength' => '8', 'value' => $form1->P8_A_OCUP_PRINCIP, 'size' => '10', 'class' => "form-control input-sm text-center")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('8.b. En los últimos 12 meses (desde Noviembre 2015 hasta Octubre 2016) ¿Durante cuántos meses laboró en su ocupación principal?', 'P8_B_OCUP_PRINCIP', array('class' => 'col-sm-9')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P8_B_OCUP_PRINCIP', 'id' => 'P8_B_OCUP_PRINCIP', 'placeholder' => 'MESES', 'maxlength' => '2', 'value' => $form1->P8_B_OCUP_PRINCIP, 'size' => '5', 'class' => "form-control input-sm text-center")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('9. ¿Por qué razón no tiene RUC?', 'P9', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php
                    $dataP9_1 = array(
                        'name' => 'P9', 'id' => 'P9', 'value' => 1, 'checked' => ($form1->P9 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP9_2 = array(
                        'name' => 'P9', 'id' => 'P9', 'value' => 2, 'checked' => ($form1->P9 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP9_3 = array(
                        'name' => 'P9', 'id' => 'P9', 'value' => 3, 'checked' => ($form1->P9 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP9_1) . ' Mi empleador no me lo solicita', 'P9_x1'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP9_2) . ' No dependo de otros por lo que no necesito (Independiente)', 'P9_x2'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP9_3) . ' Otros ' . form_input(array('type' => 'text', 'name' => 'P9_O', 'id' => 'P9_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'maxlength' => '60', 'value' => $form1->P9_O, 'size' => '60', 'class' => 'form-control form-inline input-sm')), 'P9_x3'); ?>
                    </div>
                    <span for="P9" id="P9-error" class="help-block"></span>
                </div>
            </div>
            <div class="col-sm-12">
                <?= form_label('OBSERVACIONES', 'OBS_1', array('class' => 'control-label')); ?>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-1">
                    <?= form_textarea(array('type' => 'textarea', 'name' => 'OBS_1', 'rows' => '4', 'class' => 'form-control input-sm', 'id' => 'OBS_1', 'value' => $form1->OBS_1, 'placeholder' => 'Observaciones')); ?>
                </div>
            </div>
            <div class="bloque col-sm-12">CONOCIMIENTO Y PERCEPCIÓN SOBRE EL PAGO DE IMPUESTOS</div>
            <div class="form-group">
                <?= form_label('10. ¿Ha escuchado hablar sobre los siguientes impuestos?', 'P10', array('class' => 'col-sm-3 control-label')); ?>
                <div id="P10" class="col-sm-9">
                    <?php
                    $dataP10_1 = array('name' => 'P10_1', 'id' => 'P10_1', 'style' => 'margin-right:5px');
                    $dataP10_2 = array('name' => 'P10_2', 'id' => 'P10_2', 'style' => 'margin-right:5px');
                    $dataP10_3 = array('name' => 'P10_3', 'id' => 'P10_3', 'style' => 'margin-right:5px');
                    $dataP10_4 = array('name' => 'P10_4', 'id' => 'P10_4', 'style' => 'margin-right:5px');

                    echo form_hidden('P10_AUX', ($form1->P10_AUX) ? $form1->P10_AUX : '');
                    ?>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP10_1, 1, set_checkbox('P10_1', '1', $form1->P10_1 == '1' ? TRUE : FALSE)) . ' Impuesto a la renta', 'P10_1'); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP10_2, 1, set_checkbox('P10_2', '1', $form1->P10_2 == '1' ? TRUE : FALSE)) . ' Impuesto general a las ventas', 'P10_2'); ?>                        
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP10_3, 1, set_checkbox('P10_3', '1', $form1->P10_3 == '1' ? TRUE : FALSE)) . ' Impuesto a las transacciones financieras', 'P10_3'); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP10_4, 1, set_checkbox('P10_4', '1', $form1->P10_4 == '1' ? TRUE : FALSE)) . ' Ninguno', 'P10_4'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <?php
                $dataP11_A_1 = array(
                    'name' => 'P11_A', 'id' => 'P11_A', 'value' => 1, 'checked' => ($form1->P11_A == '1' ? TRUE : FALSE));
                $dataP11_A_2 = array(
                    'name' => 'P11_A', 'id' => 'P11_A', 'value' => 2, 'checked' => ($form1->P11_A == '2' ? TRUE : FALSE));
                $dataP11_A_3 = array(
                    'name' => 'P11_A', 'id' => 'P11_A', 'value' => 3, 'checked' => ($form1->P11_A == '3' ? TRUE : FALSE));
                $dataP11_A_4 = array(
                    'name' => 'P11_A', 'id' => 'P11_A', 'value' => 4, 'checked' => ($form1->P11_A == '4' ? TRUE : FALSE));
                $dataP11_B_1 = array(
                    'name' => 'P11_B', 'id' => 'P11_B', 'value' => 1, 'checked' => ($form1->P11_B == '1' ? TRUE : FALSE));
                $dataP11_B_2 = array(
                    'name' => 'P11_B', 'id' => 'P11_B', 'value' => 2, 'checked' => ($form1->P11_B == '2' ? TRUE : FALSE));
                $dataP11_B_3 = array(
                    'name' => 'P11_B', 'id' => 'P11_B', 'value' => 3, 'checked' => ($form1->P11_B == '3' ? TRUE : FALSE));
                $dataP11_B_4 = array(
                    'name' => 'P11_B', 'id' => 'P11_B', 'value' => 4, 'checked' => ($form1->P11_B == '4' ? TRUE : FALSE));
                $dataP11_C_1 = array(
                    'name' => 'P11_C', 'id' => 'P11_C', 'value' => 1, 'checked' => ($form1->P11_C == '1' ? TRUE : FALSE));
                $dataP11_C_2 = array(
                    'name' => 'P11_C', 'id' => 'P11_C', 'value' => 2, 'checked' => ($form1->P11_C == '2' ? TRUE : FALSE));
                $dataP11_C_3 = array(
                    'name' => 'P11_C', 'id' => 'P11_C', 'value' => 3, 'checked' => ($form1->P11_C == '3' ? TRUE : FALSE));
                $dataP11_C_4 = array(
                    'name' => 'P11_C', 'id' => 'P11_C', 'value' => 4, 'checked' => ($form1->P11_C == '4' ? TRUE : FALSE));
                $dataP11_D_1 = array(
                    'name' => 'P11_D', 'id' => 'P11_D', 'value' => 1, 'checked' => ($form1->P11_D == '1' ? TRUE : FALSE));
                $dataP11_D_2 = array(
                    'name' => 'P11_D', 'id' => 'P11_D', 'value' => 2, 'checked' => ($form1->P11_D == '2' ? TRUE : FALSE));
                $dataP11_D_3 = array(
                    'name' => 'P11_D', 'id' => 'P11_D', 'value' => 3, 'checked' => ($form1->P11_D == '3' ? TRUE : FALSE));
                $dataP11_D_4 = array(
                    'name' => 'P11_D', 'id' => 'P11_D', 'value' => 4, 'checked' => ($form1->P11_D == '4' ? TRUE : FALSE));
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>11. Según su percepción…</th>
                            <th class="text-center">Todos</th>
                            <th class="text-center">Algunos</th>
                            <th class="text-center">Ninguno</th>
                            <th class="text-center">NS / NR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">11a. De cada 10 peruanos ¿Cuántos cumplen con sacar su RUC?</th>
                            <td class="text-center"><?= form_radio($dataP11_A_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_A_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_A_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_A_4); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">11b. De cada 10 peruanos que tienen RUC ¿Cuántos cumplen con realizar su declaración?</th>
                            <td class="text-center"><?= form_radio($dataP11_B_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_B_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_B_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_B_4); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">11c. De cada 10 peruanos que hacen su declaración ¿Cuántos pagan sus impuestos?</th>
                            <td class="text-center"><?= form_radio($dataP11_C_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_C_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_C_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_C_4); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">11d. De cada 10 peruanos que pagan, ¿Cuántos pagan lo que tienen que pagar?</th>
                            <td class="text-center"><?= form_radio($dataP11_D_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_D_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_D_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP11_D_4); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <?= form_label('12. Según su percepción ¿qué  tipo de incumplimiento en el pago de impuestos COMETEN LOS PERUANOS con mayor frecuencia?', 'P12', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php
                    $dataP12_1 = array(
                        'name' => 'P12', 'id' => 'P12', 'value' => 1, 'checked' => ($form1->P12 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP12_2 = array(
                        'name' => 'P12', 'id' => 'P12', 'value' => 2, 'checked' => ($form1->P12 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP12_3 = array(
                        'name' => 'P12', 'id' => 'P12', 'value' => 3, 'checked' => ($form1->P12 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP12_4 = array(
                        'name' => 'P12', 'id' => 'P12', 'value' => 4, 'checked' => ($form1->P12 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP12_5 = array(
                        'name' => 'P12', 'id' => 'P12', 'value' => 5, 'checked' => ($form1->P12 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP12_6 = array(
                        'name' => 'P12', 'id' => 'P12', 'value' => 6, 'checked' => ($form1->P12 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP12_1) . ' No pagan impuestos', 'P12_x1'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP12_2) . ' Sólo pagan parte de los impuestos', 'P12_x2'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP12_3) . ' Compran facturas para su descargo', 'P12_x3'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP12_4) . ' En general pagan correctamente sus impuestos', 'P12_x4'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP12_5) . ' Otros ' . form_input(array('type' => 'text', 'name' => 'P12_O', 'id' => 'P12_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'maxlength' => '60', 'value' => $form1->P12_O, 'size' => '60', 'class' => 'form-control form-inline input-sm')), 'P12_x5'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP12_6) . ' No sabe / No responde', 'P12_x6'); ?>
                    </div>
                    <span for="P12" id="P12-error" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('13. ¿Qué tipo de incumplimiento en el pago de los impuestos COMETEN LAS EMPRESAS y/o LOS NEGOCIOS, en el Perú con más frecuencia?', 'P13', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php
                    $dataP13_1 = array(
                        'name' => 'P13', 'id' => 'P13', 'value' => 1, 'checked' => ($form1->P13 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP13_2 = array(
                        'name' => 'P13', 'id' => 'P13', 'value' => 2, 'checked' => ($form1->P13 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP13_3 = array(
                        'name' => 'P13', 'id' => 'P13', 'value' => 3, 'checked' => ($form1->P13 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP13_4 = array(
                        'name' => 'P13', 'id' => 'P13', 'value' => 4, 'checked' => ($form1->P13 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP13_5 = array(
                        'name' => 'P13', 'id' => 'P13', 'value' => 5, 'checked' => ($form1->P13 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP13_6 = array(
                        'name' => 'P13', 'id' => 'P13', 'value' => 6, 'checked' => ($form1->P13 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP13_7 = array(
                        'name' => 'P13', 'id' => 'P13', 'value' => 7, 'checked' => ($form1->P13 === '7' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP13_8 = array(
                        'name' => 'P13', 'id' => 'P13', 'value' => 8, 'checked' => ($form1->P13 === '8' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP13_9 = array(
                        'name' => 'P13', 'id' => 'P13', 'value' => 9, 'checked' => ($form1->P13 === '9' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP13_1) . ' No pagan impuestos', 'P13_x1'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP13_2) . ' Sólo pagan parte de los impuestos', 'P13_x2'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP13_3) . ' No entregan facturas', 'P13_x3'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP13_4) . ' Hacen doble facturación', 'P13_x4'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP13_5) . ' Trabajan sin inscribirse al RUC', 'P13_x5'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP13_6) . ' Emiten facturas falsas', 'P13_x6'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP13_7) . ' En general pagan correctamente sus impuestos', 'P13_x7'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP13_8) . ' Otros ' . form_input(array('type' => 'text', 'name' => 'P13_O', 'id' => 'P13_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'maxlength' => '60', 'value' => $form1->P13_O, 'size' => '60', 'class' => 'form-control form-inline input-sm')), 'P13_x8'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP13_9) . ' No sabe / No responde', 'P13_x9'); ?>
                    </div>
                    <span for="P13" id="P13-error" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('14. ¿Conoce alguna persona o negocio de su entorno que haya sido descubierta y sancionada por incumplir el pago de impuestos?', 'P14', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php
                    $dataP14_1 = array(
                        'name' => 'P14', 'id' => 'P14', 'value' => 1, 'checked' => ($form1->P14 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP14_2 = array(
                        'name' => 'P14', 'id' => 'P14', 'value' => 2, 'checked' => ($form1->P14 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP14_3 = array(
                        'name' => 'P14', 'id' => 'P14', 'value' => 3, 'checked' => ($form1->P14 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP14_4 = array(
                        'name' => 'P14', 'id' => 'P14', 'value' => 4, 'checked' => ($form1->P14 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP14_1) . ' Sí, una persona', 'P14_x1'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP14_2) . ' Sí, un negocio', 'P14_x2'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP14_3) . ' No', 'P14_x3'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP14_4) . ' No sabe / No responde', 'P14_x4'); ?>
                    </div>
                    <span for="P14" id="P14-error" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('15. Según su percepción ¿Qué consecuencia principal considera Ud. que tiene el incumplimiento en el pago de los impuestos para la sociedad peruana?', 'P15', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php
                    $dataP15_1 = array(
                        'name' => 'P15', 'id' => 'P15', 'value' => 1, 'checked' => ($form1->P15 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP15_2 = array(
                        'name' => 'P15', 'id' => 'P15', 'value' => 2, 'checked' => ($form1->P15 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP15_3 = array(
                        'name' => 'P15', 'id' => 'P15', 'value' => 3, 'checked' => ($form1->P15 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP15_4 = array(
                        'name' => 'P15', 'id' => 'P15', 'value' => 4, 'checked' => ($form1->P15 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP15_5 = array(
                        'name' => 'P15', 'id' => 'P15', 'value' => 5, 'checked' => ($form1->P15 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP15_6 = array(
                        'name' => 'P15', 'id' => 'P15', 'value' => 6, 'checked' => ($form1->P15 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP15_1) . ' En general no tiene efectos importantes', 'P15_x1'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP15_2) . ' Disminuye los recursos para financiar los bienes y servicios públicos', 'P15_x2'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP15_3) . ' Obliga a los que pagan correctamente a que tengan mayor carga, es decir que pagan más impuestos', 'P15_x3'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP15_4) . ' Desmotiva a los que pagan correctamente sus impuestos', 'P15_x4'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP15_5) . ' Otros ' . form_input(array('type' => 'text', 'name' => 'P15_O', 'id' => 'P15_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'maxlength' => '60', 'value' => $form1->P15_O, 'size' => '60', 'class' => 'form-control form-inline input-sm')), 'P15_x5'); ?>
                    </div>
                    <div class="radio">                        
                        <?= form_label(form_radio($dataP15_6) . ' No sabe / No responde', 'P13_x6'); ?>
                    </div>
                    <span for="P15" id="P15-error" class="help-block"></span>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <?= form_label('16. Ha escuchado hablar de la SUNAT?', 'P16', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-4">
                    <?php
                    $dataP16_1 = array(
                        'name' => 'P16', 'id' => 'P16', 'value' => 1, 'checked' => ($form1->P16 == '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP16_2 = array(
                        'name' => 'P16', 'id' => 'P16', 'value' => 2, 'checked' => ($form1->P16 == '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP16_1) . ' S&iacute;', 'P16_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP16_2) . ' No', 'P16_x2', array('class' => 'radio-inline')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <?php
                $dataP17_1_1 = array(
                    'name' => 'P17_1', 'id' => 'P17_1', 'value' => 1, 'checked' => ($form1->P17_1 == '1' ? TRUE : FALSE));
                $dataP17_1_2 = array(
                    'name' => 'P17_1', 'id' => 'P17_1', 'value' => 2, 'checked' => ($form1->P17_1 == '2' ? TRUE : FALSE));
                $dataP17_1_3 = array(
                    'name' => 'P17_1', 'id' => 'P17_1', 'value' => 3, 'checked' => ($form1->P17_1 == '3' ? TRUE : FALSE));
                $dataP17_1_4 = array(
                    'name' => 'P17_1', 'id' => 'P17_1', 'value' => 4, 'checked' => ($form1->P17_1 == '4' ? TRUE : FALSE));
                $dataP17_1_5 = array(
                    'name' => 'P17_1', 'id' => 'P17_1', 'value' => 5, 'checked' => ($form1->P17_1 == '5' ? TRUE : FALSE));
                $dataP17_1_6 = array(
                    'name' => 'P17_1', 'id' => 'P17_1', 'value' => 6, 'checked' => ($form1->P17_1 == '6' ? TRUE : FALSE));
                $dataP17_2_1 = array(
                    'name' => 'P17_2', 'id' => 'P17_2', 'value' => 1, 'checked' => ($form1->P17_2 == '1' ? TRUE : FALSE));
                $dataP17_2_2 = array(
                    'name' => 'P17_2', 'id' => 'P17_2', 'value' => 2, 'checked' => ($form1->P17_2 == '2' ? TRUE : FALSE));
                $dataP17_2_3 = array(
                    'name' => 'P17_2', 'id' => 'P17_2', 'value' => 3, 'checked' => ($form1->P17_2 == '3' ? TRUE : FALSE));
                $dataP17_2_4 = array(
                    'name' => 'P17_2', 'id' => 'P17_2', 'value' => 4, 'checked' => ($form1->P17_2 == '4' ? TRUE : FALSE));
                $dataP17_2_5 = array(
                    'name' => 'P17_2', 'id' => 'P17_2', 'value' => 5, 'checked' => ($form1->P17_2 == '5' ? TRUE : FALSE));
                $dataP17_2_6 = array(
                    'name' => 'P17_2', 'id' => 'P17_2', 'value' => 6, 'checked' => ($form1->P17_2 == '6' ? TRUE : FALSE));
                $dataP17_3_1 = array(
                    'name' => 'P17_3', 'id' => 'P17_3', 'value' => 1, 'checked' => ($form1->P17_3 == '1' ? TRUE : FALSE));
                $dataP17_3_2 = array(
                    'name' => 'P17_3', 'id' => 'P17_3', 'value' => 2, 'checked' => ($form1->P17_3 == '2' ? TRUE : FALSE));
                $dataP17_3_3 = array(
                    'name' => 'P17_3', 'id' => 'P17_3', 'value' => 3, 'checked' => ($form1->P17_3 == '3' ? TRUE : FALSE));
                $dataP17_3_4 = array(
                    'name' => 'P17_3', 'id' => 'P17_3', 'value' => 4, 'checked' => ($form1->P17_3 == '4' ? TRUE : FALSE));
                $dataP17_3_5 = array(
                    'name' => 'P17_3', 'id' => 'P17_3', 'value' => 5, 'checked' => ($form1->P17_3 == '5' ? TRUE : FALSE));
                $dataP17_3_6 = array(
                    'name' => 'P17_3', 'id' => 'P17_3', 'value' => 6, 'checked' => ($form1->P17_3 == '6' ? TRUE : FALSE));
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>17. ¿Qué percepción tiene de la SUNAT acerca de:</th>
                            <th class="text-center">Muy en desacuerdo</th>
                            <th class="text-center">En desacuerdo</th>
                            <th class="text-center">Indiferente</th>
                            <th class="text-center">De acuerdo</th>
                            <th class="text-center">Muy de acuerdo</th>
                            <th class="text-center">Ninguno</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1. Las acciones de recaudación de impuestos</th>
                            <td class="text-center"><?= form_radio($dataP17_1_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_1_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_1_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_1_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_1_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_1_6); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">2. Las acciones de Control y Fiscalización</th>
                            <td class="text-center"><?= form_radio($dataP17_2_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_2_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_2_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_2_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_2_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_2_6); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">3. Las condiciones de accesibilidad de sus locales en Lima Metropolitana</th>
                            <td class="text-center"><?= form_radio($dataP17_3_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_3_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_3_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_3_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_3_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP17_3_6); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12">
                <?= form_label('OBSERVACIONES', 'OBS_2', array('class' => 'control-label')); ?>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-1">
                    <?= form_textarea(array('type' => 'textarea', 'name' => 'OBS_2', 'rows' => '4', 'class' => 'form-control input-sm', 'id' => 'OBS_2', 'value' => $form1->OBS_2, 'placeholder' => 'Observaciones')); ?>
                </div>
            </div>
            <div class="bloque col-sm-12">Considerando una escala del 1 al 5, en la que: <br/>
                1=Muy injustificable, 2=Injustificable, 3=Ni justificable ni injustificable, 4=Justificable 5=Muy Justificable</div>
            <div class="form-group col-sm-12">
                <?php
                $dataP18_1_1 = array(
                    'name' => 'P18_1', 'id' => 'P18_1', 'value' => 1, 'checked' => ($form1->P18_1 == '1' ? TRUE : FALSE));
                $dataP18_1_2 = array(
                    'name' => 'P18_1', 'id' => 'P18_1', 'value' => 2, 'checked' => ($form1->P18_1 == '2' ? TRUE : FALSE));
                $dataP18_1_3 = array(
                    'name' => 'P18_1', 'id' => 'P18_1', 'value' => 3, 'checked' => ($form1->P18_1 == '3' ? TRUE : FALSE));
                $dataP18_1_4 = array(
                    'name' => 'P18_1', 'id' => 'P18_1', 'value' => 4, 'checked' => ($form1->P18_1 == '4' ? TRUE : FALSE));
                $dataP18_1_5 = array(
                    'name' => 'P18_1', 'id' => 'P18_1', 'value' => 5, 'checked' => ($form1->P18_1 == '5' ? TRUE : FALSE));
                $dataP18_1_6 = array(
                    'name' => 'P18_1', 'id' => 'P18_1', 'value' => 6, 'checked' => ($form1->P18_1 == '6' ? TRUE : FALSE));
                $dataP18_2_1 = array(
                    'name' => 'P18_2', 'id' => 'P18_2', 'value' => 1, 'checked' => ($form1->P18_2 == '1' ? TRUE : FALSE));
                $dataP18_2_2 = array(
                    'name' => 'P18_2', 'id' => 'P18_2', 'value' => 2, 'checked' => ($form1->P18_2 == '2' ? TRUE : FALSE));
                $dataP18_2_3 = array(
                    'name' => 'P18_2', 'id' => 'P18_2', 'value' => 3, 'checked' => ($form1->P18_2 == '3' ? TRUE : FALSE));
                $dataP18_2_4 = array(
                    'name' => 'P18_2', 'id' => 'P18_2', 'value' => 4, 'checked' => ($form1->P18_2 == '4' ? TRUE : FALSE));
                $dataP18_2_5 = array(
                    'name' => 'P18_2', 'id' => 'P18_2', 'value' => 5, 'checked' => ($form1->P18_2 == '5' ? TRUE : FALSE));
                $dataP18_2_6 = array(
                    'name' => 'P18_2', 'id' => 'P18_2', 'value' => 6, 'checked' => ($form1->P18_2 == '6' ? TRUE : FALSE));
                $dataP18_3_1 = array(
                    'name' => 'P18_3', 'id' => 'P18_3', 'value' => 1, 'checked' => ($form1->P18_3 == '1' ? TRUE : FALSE));
                $dataP18_3_2 = array(
                    'name' => 'P18_3', 'id' => 'P18_3', 'value' => 2, 'checked' => ($form1->P18_3 == '2' ? TRUE : FALSE));
                $dataP18_3_3 = array(
                    'name' => 'P18_3', 'id' => 'P18_3', 'value' => 3, 'checked' => ($form1->P18_3 == '3' ? TRUE : FALSE));
                $dataP18_3_4 = array(
                    'name' => 'P18_3', 'id' => 'P18_3', 'value' => 4, 'checked' => ($form1->P18_3 == '4' ? TRUE : FALSE));
                $dataP18_3_5 = array(
                    'name' => 'P18_3', 'id' => 'P18_3', 'value' => 5, 'checked' => ($form1->P18_3 == '5' ? TRUE : FALSE));
                $dataP18_3_6 = array(
                    'name' => 'P18_3', 'id' => 'P18_3', 'value' => 6, 'checked' => ($form1->P18_3 == '6' ? TRUE : FALSE));
                $dataP18_4_1 = array(
                    'name' => 'P18_4', 'id' => 'P18_4', 'value' => 1, 'checked' => ($form1->P18_4 == '1' ? TRUE : FALSE));
                $dataP18_4_2 = array(
                    'name' => 'P18_4', 'id' => 'P18_4', 'value' => 2, 'checked' => ($form1->P18_4 == '2' ? TRUE : FALSE));
                $dataP18_4_3 = array(
                    'name' => 'P18_4', 'id' => 'P18_4', 'value' => 3, 'checked' => ($form1->P18_4 == '3' ? TRUE : FALSE));
                $dataP18_4_4 = array(
                    'name' => 'P18_4', 'id' => 'P18_4', 'value' => 4, 'checked' => ($form1->P18_4 == '4' ? TRUE : FALSE));
                $dataP18_4_5 = array(
                    'name' => 'P18_4', 'id' => 'P18_4', 'value' => 5, 'checked' => ($form1->P18_4 == '5' ? TRUE : FALSE));
                $dataP18_4_6 = array(
                    'name' => 'P18_4', 'id' => 'P18_4', 'value' => 6, 'checked' => ($form1->P18_4 == '6' ? TRUE : FALSE));
                $dataP18_5_1 = array(
                    'name' => 'P18_5', 'id' => 'P18_5', 'value' => 1, 'checked' => ($form1->P18_5 == '1' ? TRUE : FALSE));
                $dataP18_5_2 = array(
                    'name' => 'P18_5', 'id' => 'P18_5', 'value' => 2, 'checked' => ($form1->P18_5 == '2' ? TRUE : FALSE));
                $dataP18_5_3 = array(
                    'name' => 'P18_5', 'id' => 'P18_5', 'value' => 3, 'checked' => ($form1->P18_5 == '3' ? TRUE : FALSE));
                $dataP18_5_4 = array(
                    'name' => 'P18_5', 'id' => 'P18_5', 'value' => 4, 'checked' => ($form1->P18_5 == '4' ? TRUE : FALSE));
                $dataP18_5_5 = array(
                    'name' => 'P18_5', 'id' => 'P18_5', 'value' => 5, 'checked' => ($form1->P18_5 == '5' ? TRUE : FALSE));
                $dataP18_5_6 = array(
                    'name' => 'P18_5', 'id' => 'P18_5', 'value' => 6, 'checked' => ($form1->P18_5 == '6' ? TRUE : FALSE));
                $dataP18_6_1 = array(
                    'name' => 'P18_6', 'id' => 'P18_6', 'value' => 1, 'checked' => ($form1->P18_6 == '1' ? TRUE : FALSE));
                $dataP18_6_2 = array(
                    'name' => 'P18_6', 'id' => 'P18_6', 'value' => 2, 'checked' => ($form1->P18_6 == '2' ? TRUE : FALSE));
                $dataP18_6_3 = array(
                    'name' => 'P18_6', 'id' => 'P18_6', 'value' => 3, 'checked' => ($form1->P18_6 == '3' ? TRUE : FALSE));
                $dataP18_6_4 = array(
                    'name' => 'P18_6', 'id' => 'P18_6', 'value' => 4, 'checked' => ($form1->P18_6 == '4' ? TRUE : FALSE));
                $dataP18_6_5 = array(
                    'name' => 'P18_6', 'id' => 'P18_6', 'value' => 5, 'checked' => ($form1->P18_6 == '5' ? TRUE : FALSE));
                $dataP18_6_6 = array(
                    'name' => 'P18_6', 'id' => 'P18_6', 'value' => 6, 'checked' => ($form1->P18_6 == '6' ? TRUE : FALSE));
                $dataP18_7_1 = array(
                    'name' => 'P18_7', 'id' => 'P18_7', 'value' => 1, 'checked' => ($form1->P18_7 == '1' ? TRUE : FALSE));
                $dataP18_7_2 = array(
                    'name' => 'P18_7', 'id' => 'P18_7', 'value' => 2, 'checked' => ($form1->P18_7 == '2' ? TRUE : FALSE));
                $dataP18_7_3 = array(
                    'name' => 'P18_7', 'id' => 'P18_7', 'value' => 3, 'checked' => ($form1->P18_7 == '3' ? TRUE : FALSE));
                $dataP18_7_4 = array(
                    'name' => 'P18_7', 'id' => 'P18_7', 'value' => 4, 'checked' => ($form1->P18_7 == '4' ? TRUE : FALSE));
                $dataP18_7_5 = array(
                    'name' => 'P18_7', 'id' => 'P18_7', 'value' => 5, 'checked' => ($form1->P18_7 == '5' ? TRUE : FALSE));
                $dataP18_7_6 = array(
                    'name' => 'P18_7', 'id' => 'P18_7', 'value' => 6, 'checked' => ($form1->P18_7 == '6' ? TRUE : FALSE));
                $dataP18_8_1 = array(
                    'name' => 'P18_8', 'id' => 'P18_8', 'value' => 1, 'checked' => ($form1->P18_8 == '1' ? TRUE : FALSE));
                $dataP18_8_2 = array(
                    'name' => 'P18_8', 'id' => 'P18_8', 'value' => 2, 'checked' => ($form1->P18_8 == '2' ? TRUE : FALSE));
                $dataP18_8_3 = array(
                    'name' => 'P18_8', 'id' => 'P18_8', 'value' => 3, 'checked' => ($form1->P18_8 == '3' ? TRUE : FALSE));
                $dataP18_8_4 = array(
                    'name' => 'P18_8', 'id' => 'P18_8', 'value' => 4, 'checked' => ($form1->P18_8 == '4' ? TRUE : FALSE));
                $dataP18_8_5 = array(
                    'name' => 'P18_8', 'id' => 'P18_8', 'value' => 5, 'checked' => ($form1->P18_8 == '5' ? TRUE : FALSE));
                $dataP18_8_6 = array(
                    'name' => 'P18_8', 'id' => 'P18_8', 'value' => 6, 'checked' => ($form1->P18_8 == '6' ? TRUE : FALSE));
                $dataP18_9_1 = array(
                    'name' => 'P18_9', 'id' => 'P18_9', 'value' => 1, 'checked' => ($form1->P18_9 == '1' ? TRUE : FALSE));
                $dataP18_9_2 = array(
                    'name' => 'P18_9', 'id' => 'P18_9', 'value' => 2, 'checked' => ($form1->P18_9 == '2' ? TRUE : FALSE));
                $dataP18_9_3 = array(
                    'name' => 'P18_9', 'id' => 'P18_9', 'value' => 3, 'checked' => ($form1->P18_9 == '3' ? TRUE : FALSE));
                $dataP18_9_4 = array(
                    'name' => 'P18_9', 'id' => 'P18_9', 'value' => 4, 'checked' => ($form1->P18_9 == '4' ? TRUE : FALSE));
                $dataP18_9_5 = array(
                    'name' => 'P18_9', 'id' => 'P18_9', 'value' => 5, 'checked' => ($form1->P18_9 == '5' ? TRUE : FALSE));
                $dataP18_9_6 = array(
                    'name' => 'P18_9', 'id' => 'P18_9', 'value' => 6, 'checked' => ($form1->P18_9 == '6' ? TRUE : FALSE));
                $dataP18_10_1 = array(
                    'name' => 'P18_10', 'id' => 'P18_10', 'value' => 1, 'checked' => ($form1->P18_10 == '1' ? TRUE : FALSE));
                $dataP18_10_2 = array(
                    'name' => 'P18_10', 'id' => 'P18_10', 'value' => 2, 'checked' => ($form1->P18_10 == '2' ? TRUE : FALSE));
                $dataP18_10_3 = array(
                    'name' => 'P18_10', 'id' => 'P18_10', 'value' => 3, 'checked' => ($form1->P18_10 == '3' ? TRUE : FALSE));
                $dataP18_10_4 = array(
                    'name' => 'P18_10', 'id' => 'P18_10', 'value' => 4, 'checked' => ($form1->P18_10 == '4' ? TRUE : FALSE));
                $dataP18_10_5 = array(
                    'name' => 'P18_10', 'id' => 'P18_10', 'value' => 5, 'checked' => ($form1->P18_10 == '5' ? TRUE : FALSE));
                $dataP18_10_6 = array(
                    'name' => 'P18_10', 'id' => 'P18_10', 'value' => 6, 'checked' => ($form1->P18_10 == '6' ? TRUE : FALSE));
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-warning">Que tanto justificaría que una persona dejara de pagar sus impuestos por alguna de las siguientes razones:</th>
                            <th class="text-center">Muy injustificable</th>
                            <th class="text-center">injustificable</th>
                            <th class="text-center">Ni justificable ni injustificable</th>
                            <th class="text-center">Justificable</th>
                            <th class="text-center">Muy justificable</th>
                            <th class="text-center">No opina</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Porque el resto de los ciudadanos tampoco pagan</th>
                            <td class="text-center"><?= form_radio($dataP18_1_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_1_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_1_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_1_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_1_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_1_6); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Porque la posibilidad de que le descubran es baja</th>
                            <td class="text-center"><?= form_radio($dataP18_2_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_2_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_2_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_2_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_2_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_2_6); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Porque no los considere útil o necesario</th>
                            <td class="text-center"><?= form_radio($dataP18_3_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_3_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_3_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_3_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_3_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_3_6); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Por desconocimiento o descuido de como pagar sus impuestos</th>
                            <td class="text-center"><?= form_radio($dataP18_4_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_4_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_4_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_4_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_4_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_4_6); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Porque ve corrupción y falta de transparencia en la clase política</th>
                            <td class="text-center"><?= form_radio($dataP18_5_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_5_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_5_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_5_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_5_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_5_6); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Porque no confia en la gestión pública de los impuestos</th>
                            <td class="text-center"><?= form_radio($dataP18_6_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_6_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_6_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_6_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_6_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_6_6); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Porque cree que paga más impuestos que los servicios públicos que recibe por parte del Estado</th>
                            <td class="text-center"><?= form_radio($dataP18_7_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_7_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_7_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_7_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_7_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_7_6); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Porque considere excesivos los impuestos actuales</th>
                            <td class="text-center"><?= form_radio($dataP18_8_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_8_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_8_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_8_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_8_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_8_6); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Por falta de honradez y conciencia tributaria</th>
                            <td class="text-center"><?= form_radio($dataP18_9_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_9_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_9_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_9_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_9_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_9_6); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Por que esta viviendo una situación personal dificil (inicia su negocio, pierde el empleo)</th>
                            <td class="text-center"><?= form_radio($dataP18_10_1); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_10_2); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_10_3); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_10_4); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_10_5); ?></td>
                            <td class="text-center"><?= form_radio($dataP18_10_6); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-actions col-sm-5 col-sm-offset-5">
                <?= form_button(array('type' => 'submit', 'id' => 'grabar', 'content' => 'Grabar cuestionario', 'class' => 'btn btn-primary')); ?>
                <!--< ? = form_input(array('type' => 'button', 'id' => 'reset', 'value' => 'Limpiar pagina', 'class' => 'btn btn-danger')); ?>-->
                <?= anchor('usupotenciales/index', 'Cancelar', array('class' => 'btn btn-danger')); ?>
            </div><!--<button class="btn-block btn-danger btn-default btn-group btn-info btn-link btn-navbar btn-primary btn-success btn-toolbar btn-warning"-->
        </fieldset>
        <?= form_close(); ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#UBIGEO").change(function () {
            //alert($(this).val());
            $.ajax({
                url: "<?= base_url(); ?>usupotenciales/getCboConglomerados",
                data: {UBIGEO: $(this).val()},
                type: "POST",
                success: function (data) {
                    $("#CONGLOMERADO").html(data);
                }
            });
        });
    });
</script>
