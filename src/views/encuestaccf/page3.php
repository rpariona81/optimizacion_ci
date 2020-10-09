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
        $("form[name='page3']").validate({
            ignore: [],
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                V_01_1: "required",
                V_01_2: "required",
                V_02_1: "required",
                V_02_2: "required",
                V_03_1: "required",
                V_03_2: "required",
                V_03_3: "required",
                V_03_4: "required",
                V_03_5: "required",
                V_04_1: "required",
                V_04_2: "required",
                V_05_1: "required",
                V_05_2: "required",
                V_05_3: "required",
                V_06_1: "required",
                V_06_2: "required",
                V_06_3: "required",
                V_07_1: "required",
                V_07_2: "required",
                V_07_3: "required",
                V_08_1: "required",
                V_08_2: "required",
                V_08_3: "required",
                V_09: "required"
            },
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
            // Specify validation error messages
            messages: {
                V_01_1: "Respuesta requerida",
                V_01_2: "Respuesta requerida",
                V_02_1: "Respuesta requerida",
                V_02_2: "Respuesta requerida",
                V_03_1: "Respuesta requerida",
                V_03_2: "Respuesta requerida",
                V_03_3: "Respuesta requerida",
                V_03_4: "Respuesta requerida",
                V_03_5: "Respuesta requerida",
                V_04_1: "Respuesta requerida",
                V_04_2: "Respuesta requerida",
                V_05_1: "Respuesta requerida",
                V_05_2: "Respuesta requerida",
                V_05_3: "Respuesta requerida",
                V_06_1: "Respuesta requerida",
                V_06_2: "Respuesta requerida",
                V_06_3: "Respuesta requerida",
                V_07_1: "Respuesta requerida",
                V_07_2: "Respuesta requerida",
                V_07_3: "Respuesta requerida",
                V_08_1: "Respuesta requerida",
                V_08_2: "Respuesta requerida",
                V_08_3: "Respuesta requerida",
                V_09: "Respuesta requerida"
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                form.submit();
            }
        });

    });
</script>
<script>
    $(document).ready(function () {
        //page3
        $('#page3 input[name=V_01_1]').on('change', function () {
            if ($('input[name=V_01_1]:checked', '#page3').val() >= 1) {
                $('#V_01_2').focus();
            }
        });
        $('#page3 input[name=V_01_2]').on('change', function () {
            if ($('input[name=V_01_2]:checked', '#page3').val() >= 1) {
                $('#V_02_1').focus();
            }
        });
        $('#page3 input[name=V_02_1]').on('change', function () {
            if ($('input[name=V_02_1]:checked', '#page3').val() >= 1) {
                $('#V_02_2').focus();
            }
        });
        $('#page3 input[name=V_02_2]').on('change', function () {
            if ($('input[name=V_02_2]:checked', '#page3').val() >= 1) {
                $('#V_03_1').focus();
            }
        });
        $('#page3 input[name=V_03_1]').on('change', function () {
            if ($('input[name=V_03_1]:checked', '#page3').val() >= 1) {
                $('#V_03_2').focus();
            }
        });
        $('#page3 input[name=V_03_2]').on('change', function () {
            if ($('input[name=V_03_2]:checked', '#page3').val() >= 1) {
                $('#V_03_3').focus();
            }
        });
        $('#page3 input[name=V_03_3]').on('change', function () {
            if ($('input[name=V_03_3]:checked', '#page3').val() >= 1) {
                $('#V_03_4').focus();
            }
        });
        $('#page3 input[name=V_03_4]').on('change', function () {
            if ($('input[name=V_03_4]:checked', '#page3').val() >= 1) {
                $('#V_03_5').focus();
            }
        });
        $('#page3 input[name=V_03_5]').on('change', function () {
            if ($('input[name=V_03_5]:checked', '#page3').val() >= 1) {
                $('#V_04_1').focus();
            }
        });
        $('#page3 input[name=V_04_1]').on('change', function () {
            if ($('input[name=V_04_1]:checked', '#page3').val() >= 1) {
                $('#V_04_2').focus();
            }
        });
        $('#page3 input[name=V_04_2]').on('change', function () {
            if ($('input[name=V_04_2]:checked', '#page3').val() >= 1) {
                $('#V_05_1').focus();
            }
        });
        $('#page3 input[name=V_05_1]').on('change', function () {
            if ($('input[name=V_05_1]:checked', '#page3').val() >= 1) {
                $('#V_05_2').focus();
            }
        });
        $('#page3 input[name=V_05_2]').on('change', function () {
            if ($('input[name=V_05_2]:checked', '#page3').val() >= 1) {
                $('#V_05_3').focus();
            }
        });
        $('#page3 input[name=V_05_3]').on('change', function () {
            if ($('input[name=V_05_3]:checked', '#page3').val() >= 1) {
                $('#V_06_1').focus();
            }
        });
        $('#page3 input[name=V_06_1]').on('change', function () {
            if ($('input[name=V_06_1]:checked', '#page3').val() >= 1) {
                $('#V_06_2').focus();
            }
        });
        $('#page3 input[name=V_06_2]').on('change', function () {
            if ($('input[name=V_06_2]:checked', '#page3').val() >= 1) {
                $('#V_06_3').focus();
            }
        });
        $('#page3 input[name=V_06_3]').on('change', function () {
            if ($('input[name=V_06_3]:checked', '#page3').val() >= 1) {
                $('#V_06_4').focus();
            }
        });
        $('#page3 input[name=V_06_4]').on('change', function () {
            if ($('input[name=V_06_4]:checked', '#page3').val() >= 1) {
                $('#V_06_5').focus();
            }
        });
        $('#page3 input[name=V_06_5]').on('change', function () {
            if ($('input[name=V_06_5]:checked', '#page3').val() >= 1) {
                $('#V_06_6').focus();
            }
        });
        $('#page3 input[name=V_06_6]').on('change', function () {
            if ($('input[name=V_06_6]:checked', '#page3').val() >= 1) {
                $('#V_07_1').focus();
            }
        });
        $('#page3 input[name=V_07_1]').on('change', function () {
            if ($('input[name=V_07_1]:checked', '#page3').val() >= 1) {
                $('#V_07_2').focus();
            }
        });
        $('#page3 input[name=V_07_2]').on('change', function () {
            if ($('input[name=V_07_2]:checked', '#page3').val() >= 1) {
                $('#V_07_3').focus();
            }
        });
        $('#page3 input[name=V_07_3]').on('change', function () {
            if ($('input[name=V_07_3]:checked', '#page3').val() >= 1) {
                $('#V_08_1').focus();
            }
        });
        $('#page3 input[name=V_08_1]').on('change', function () {
            if ($('input[name=V_08_1]:checked', '#page3').val() >= 1) {
                $('#V_08_2').focus();
            }
        });
        $('#page3 input[name=V_08_2]').on('change', function () {
            if ($('input[name=V_08_2]:checked', '#page3').val() >= 1) {
                $('#V_08_3').focus();
            }
        });
        $('#page3 input[name=V_08_3]').on('change', function () {
            if ($('input[name=V_08_3]:checked', '#page3').val() >= 1) {
                $('#V_09').focus();
            }
        });

        $('#page3 input[name=V_09]').on('change', function () {
            if ($('input[name=V_09]:checked', '#page3').val() >= 1) {
                document.getElementById('grabar').focus();
            }
        }
        );
    });
</script>

<ul class="tab">
    <li class="pull-left"><a href="<?= site_url('encuestaccf/irpagina2/' . $form3->ID); ?>">Página 2</a></li>
    <li class="pull-right"><a href="<?= site_url('encuestaccf/index'); ?>">Regresar a la lista</a></li>
</ul>
<div class="panel panel-info">
    <div class="panel-heading">
        V. SATISFACCIÓN POR EL SERVICIO RECIBIDO EN EL CSC
    </div>
    <div class="panel-body">

        <?= form_open('encuestaccf/registrapag3', array('id' => 'page3', 'name' => 'page3', 'class' => 'form-horizontal')); ?>
        <?= validation_errors(); ?>
        <fieldset>
            <div class="form-group col-sm-12">
                <h3>5.1. CONOCIMIENTO TÉCNICO</h3>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <?php
                    $dataV_01_1_1 = array(
                        'name' => 'V_01_1', 'id' => 'V_01_1', 'value' => 1, 'checked' => ($form3->V_01_1 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_01_1_2 = array(
                        'name' => 'V_01_1', 'id' => 'V_01_1', 'value' => 2, 'checked' => ($form3->V_01_1 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_01_1_3 = array(
                        'name' => 'V_01_1', 'id' => 'V_01_1', 'value' => 3, 'checked' => ($form3->V_01_1 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_01_1_4 = array(
                        'name' => 'V_01_1', 'id' => 'V_01_1', 'value' => 4, 'checked' => ($form3->V_01_1 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_01_1_5 = array(
                        'name' => 'V_01_1', 'id' => 'V_01_1', 'value' => 5, 'checked' => ($form3->V_01_1 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_01_1_6 = array(
                        'name' => 'V_01_1', 'id' => 'V_01_1', 'value' => 6, 'checked' => ($form3->V_01_1 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');

                    $dataV_01_2_1 = array(
                        'name' => 'V_01_2', 'id' => 'V_01_2', 'value' => 1, 'checke3' => ($form3->V_01_2 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_01_2_2 = array(
                        'name' => 'V_01_2', 'id' => 'V_01_2', 'value' => 2, 'checked' => ($form3->V_01_2 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_01_2_3 = array(
                        'name' => 'V_01_2', 'id' => 'V_01_2', 'value' => 3, 'checked' => ($form3->V_01_2 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_01_2_4 = array(
                        'name' => 'V_01_2', 'id' => 'V_01_2', 'value' => 4, 'checked' => ($form3->V_01_2 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_01_2_5 = array(
                        'name' => 'V_01_2', 'id' => 'V_01_2', 'value' => 5, 'checked' => ($form3->V_01_2 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_01_2_6 = array(
                        'name' => 'V_01_2', 'id' => 'V_01_2', 'value' => 6, 'checked' => ($form3->V_01_2 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Muy insatisfecho?</th>
                                <th class="text-center">Insatisfecho?</th>
                                <th class="text-center">Ni satisfecho ni insatisfecho?</th>
                                <th class="text-center">Satisfecho?</th>
                                <th class="text-center">Muy satisfecho?</th>
                                <th class="text-center">No opina</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Respecto al conocimiento de las normas vigentes que demuestra el personal de la SUNAT en el servicio ¿Usted se siente…</th>
                                <td class="text-center"><?= form_radio($dataV_01_1_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_01_1_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_01_1_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_01_1_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_01_1_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_01_1_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Respecto al nivel de experiencia que demuestra el personal de la SUNAT en el servicio ¿Usted se siente…</th>
                                <td class="text-center"><?= form_radio($dataV_01_2_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_01_2_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_01_2_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_01_2_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_01_2_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_01_2_6); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <h3>5.2. COMUNICACI&Oacute;N</h3>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <?php
                    $dataV_02_1_1 = array(
                        'name' => 'V_02_1', 'id' => 'V_02_1', 'value' => 1, 'checked' => ($form3->V_02_1 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_02_1_2 = array(
                        'name' => 'V_02_1', 'id' => 'V_02_1', 'value' => 2, 'checked' => ($form3->V_02_1 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_02_1_3 = array(
                        'name' => 'V_02_1', 'id' => 'V_02_1', 'value' => 3, 'checked' => ($form3->V_02_1 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_02_1_4 = array(
                        'name' => 'V_02_1', 'id' => 'V_02_1', 'value' => 4, 'checked' => ($form3->V_02_1 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_02_1_5 = array(
                        'name' => 'V_02_1', 'id' => 'V_02_1', 'value' => 5, 'checked' => ($form3->V_02_1 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_02_1_6 = array(
                        'name' => 'V_02_1', 'id' => 'V_02_1', 'value' => 6, 'checked' => ($form3->V_02_1 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_02_2_1 = array(
                        'name' => 'V_02_2', 'id' => 'V_02_2', 'value' => 1, 'checked' => ($form3->V_02_2 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_02_2_2 = array(
                        'name' => 'V_02_2', 'id' => 'V_02_2', 'value' => 2, 'checked' => ($form3->V_02_2 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_02_2_3 = array(
                        'name' => 'V_02_2', 'id' => 'V_02_2', 'value' => 3, 'checked' => ($form3->V_02_2 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_02_2_4 = array(
                        'name' => 'V_02_2', 'id' => 'V_02_2', 'value' => 4, 'checked' => ($form3->V_02_2 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_02_2_5 = array(
                        'name' => 'V_02_2', 'id' => 'V_02_2', 'value' => 5, 'checked' => ($form3->V_02_2 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_02_2_6 = array(
                        'name' => 'V_02_2', 'id' => 'V_02_2', 'value' => 6, 'checked' => ($form3->V_02_2 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Muy insatisfecho?</th>
                                <th class="text-center">Insatisfecho?</th>
                                <th class="text-center">Ni satisfecho ni insatisfecho?</th>
                                <th class="text-center">Satisfecho?</th>
                                <th class="text-center">Muy satisfecho?</th>
                                <th class="text-center">No opina</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Respecto a la habilidad (facilidad) PARA COMUNICARSE que tiene el personal de la SUNAT ¿Usted se siente…</th>
                                <td class="text-center"><?= form_radio($dataV_02_1_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_02_1_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_02_1_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_02_1_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_02_1_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_02_1_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">La comprensión y claridad del lenguaje utilizado en las respuestas brindadas por el personal de SUNAT durante el proceso...</th>
                                <td class="text-center"><?= form_radio($dataV_02_2_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_02_2_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_02_2_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_02_2_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_02_2_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_02_2_6); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group col-sm-12">
                <h3>5.3. ELEMENTOS TANGIBLES</h3>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <?php
//                        $dataV_03_1 = array('name' => 'V_03_1', 'id' => 'V_03_1');
                    $dataV_03_1_1 = array(
                        'name' => 'V_03_1', 'id' => 'V_03_1', 'value' => 1, 'checked' => ($form3->V_03_1 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_1_2 = array(
                        'name' => 'V_03_1', 'id' => 'V_03_1', 'value' => 2, 'checked' => ($form3->V_03_1 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_1_3 = array(
                        'name' => 'V_03_1', 'id' => 'V_03_1', 'value' => 3, 'checked' => ($form3->V_03_1 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_1_4 = array(
                        'name' => 'V_03_1', 'id' => 'V_03_1', 'value' => 4, 'checked' => ($form3->V_03_1 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_1_5 = array(
                        'name' => 'V_03_1', 'id' => 'V_03_1', 'value' => 5, 'checked' => ($form3->V_03_1 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_1_6 = array(
                        'name' => 'V_03_1', 'id' => 'V_03_1', 'value' => 6, 'checked' => ($form3->V_03_1 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
//                        $dataV_03_2 = array('name' => 'V_03_2', 'id' => 'V_03_2');
                    $dataV_03_2_1 = array(
                        'name' => 'V_03_2', 'id' => 'V_03_2', 'value' => 1, 'checked' => ($form3->V_03_2 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_2_2 = array(
                        'name' => 'V_03_2', 'id' => 'V_03_2', 'value' => 2, 'checked' => ($form3->V_03_2 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_2_3 = array(
                        'name' => 'V_03_2', 'id' => 'V_03_2', 'value' => 3, 'checked' => ($form3->V_03_2 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_2_4 = array(
                        'name' => 'V_03_2', 'id' => 'V_03_2', 'value' => 4, 'checked' => ($form3->V_03_2 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_2_5 = array(
                        'name' => 'V_03_2', 'id' => 'V_03_2', 'value' => 5, 'checked' => ($form3->V_03_2 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_2_6 = array(
                        'name' => 'V_03_2', 'id' => 'V_03_2', 'value' => 6, 'checked' => ($form3->V_03_2 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
//                        $dataV_03_3 = array('name' => 'V_03_3', 'id' => 'V_03_3');
                    $dataV_03_3_1 = array(
                        'name' => 'V_03_3', 'id' => 'V_03_3', 'value' => 1, 'checked' => ($form3->V_03_3 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_3_2 = array(
                        'name' => 'V_03_3', 'id' => 'V_03_3', 'value' => 2, 'checked' => ($form3->V_03_3 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_3_3 = array(
                        'name' => 'V_03_3', 'id' => 'V_03_3', 'value' => 3, 'checked' => ($form3->V_03_3 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_3_4 = array(
                        'name' => 'V_03_3', 'id' => 'V_03_3', 'value' => 4, 'checked' => ($form3->V_03_3 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_3_5 = array(
                        'name' => 'V_03_3', 'id' => 'V_03_3', 'value' => 5, 'checked' => ($form3->V_03_3 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_3_6 = array(
                        'name' => 'V_03_3', 'id' => 'V_03_3', 'value' => 6, 'checked' => ($form3->V_03_3 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
//                        $dataV_03_4 = array('name' => 'V_03_4', 'id' => 'V_03_4');
                    $dataV_03_4_1 = array(
                        'name' => 'V_03_4', 'id' => 'V_03_4', 'value' => 1, 'checked' => ($form3->V_03_4 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_4_2 = array(
                        'name' => 'V_03_4', 'id' => 'V_03_4', 'value' => 2, 'checked' => ($form3->V_03_4 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_4_3 = array(
                        'name' => 'V_03_4', 'id' => 'V_03_4', 'value' => 3, 'checked' => ($form3->V_03_4 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_4_4 = array(
                        'name' => 'V_03_4', 'id' => 'V_03_4', 'value' => 4, 'checked' => ($form3->V_03_4 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_4_5 = array(
                        'name' => 'V_03_4', 'id' => 'V_03_4', 'value' => 5, 'checked' => ($form3->V_03_4 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_4_6 = array(
                        'name' => 'V_03_4', 'id' => 'V_03_4', 'value' => 6, 'checked' => ($form3->V_03_4 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    // $dataV_03_5 = array('name' => 'V_03_5', 'id' => 'V_03_5');
                    $dataV_03_5_1 = array(
                        'name' => 'V_03_5', 'id' => 'V_03_5', 'value' => 1, 'checked' => ($form3->V_03_5 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_5_2 = array(
                        'name' => 'V_03_5', 'id' => 'V_03_5', 'value' => 2, 'checked' => ($form3->V_03_5 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_5_3 = array(
                        'name' => 'V_03_5', 'id' => 'V_03_5', 'value' => 3, 'checked' => ($form3->V_03_5 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_5_4 = array(
                        'name' => 'V_03_5', 'id' => 'V_03_5', 'value' => 4, 'checked' => ($form3->V_03_5 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_5_5 = array(
                        'name' => 'V_03_5', 'id' => 'V_03_5', 'value' => 5, 'checked' => ($form3->V_03_5 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_03_5_6 = array(
                        'name' => 'V_03_5', 'id' => 'V_03_5', 'value' => 6, 'checked' => ($form3->V_03_5 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Muy insatisfecho?</th>
                                <th class="text-center">Insatisfecho?</th>
                                <th class="text-center">Ni satisfecho ni insatisfecho?</th>
                                <th class="text-center">Satisfecho?</th>
                                <th class="text-center">Muy satisfecho?</th>
                                <th class="text-center">No opina</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">La limpieza y orden del local de atención (Centro de Control y Fiscalización) de la SUNAT</th>
                                <td class="text-center"><?= form_radio($dataV_03_1_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_1_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_1_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_1_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_1_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_1_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">La comodidad  del local de atención de la SUNAT</th>
                                <td class="text-center"><?= form_radio($dataV_03_2_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_2_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_2_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_2_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_2_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_2_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">La presentación del personal (es decir limpieza, orden, postura, fotocheck)</th>
                                <td class="text-center"><?= form_radio($dataV_03_3_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_3_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_3_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_3_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_3_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_3_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">El nivel de tecnología que brinda la SUNAT</th>
                                <td class="text-center"><?= form_radio($dataV_03_4_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_4_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_4_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_4_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_4_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_4_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">El funcionamiento contínuo del sistema de la SUNAT para atender a los usuarios</th>
                                <td class="text-center"><?= form_radio($dataV_03_5_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_5_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_5_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_5_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_5_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_03_5_6); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group col-sm-12">
                <h3>5.4. CALIDEZ</h3>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <?php
//                        $dataV_04_1 = array('name' => 'V_04_1', 'id' => 'V_04_1');
                    $dataV_04_1_1 = array(
                        'name' => 'V_04_1', 'id' => 'V_04_1', 'value' => 1, 'checked' => ($form3->V_04_1 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_04_1_2 = array(
                        'name' => 'V_04_1', 'id' => 'V_04_1', 'value' => 2, 'checked' => ($form3->V_04_1 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_04_1_3 = array(
                        'name' => 'V_04_1', 'id' => 'V_04_1', 'value' => 3, 'checked' => ($form3->V_04_1 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_04_1_4 = array(
                        'name' => 'V_04_1', 'id' => 'V_04_1', 'value' => 4, 'checked' => ($form3->V_04_1 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_04_1_5 = array(
                        'name' => 'V_04_1', 'id' => 'V_04_1', 'value' => 5, 'checked' => ($form3->V_04_1 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_04_1_6 = array(
                        'name' => 'V_04_1', 'id' => 'V_04_1', 'value' => 6, 'checked' => ($form3->V_04_1 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
//                        $dataV_04_2 = array('name' => 'V_04_2', 'id' => 'V_04_2');
                    $dataV_04_2_1 = array(
                        'name' => 'V_04_2', 'id' => 'V_04_2', 'value' => 1, 'checked' => ($form3->V_04_2 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_04_2_2 = array(
                        'name' => 'V_04_2', 'id' => 'V_04_2', 'value' => 2, 'checked' => ($form3->V_04_2 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_04_2_3 = array(
                        'name' => 'V_04_2', 'id' => 'V_04_2', 'value' => 3, 'checked' => ($form3->V_04_2 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_04_2_4 = array(
                        'name' => 'V_04_2', 'id' => 'V_04_2', 'value' => 4, 'checked' => ($form3->V_04_2 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_04_2_5 = array(
                        'name' => 'V_04_2', 'id' => 'V_04_2', 'value' => 5, 'checked' => ($form3->V_04_2 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_04_2_6 = array(
                        'name' => 'V_04_2', 'id' => 'V_04_2', 'value' => 6, 'checked' => ($form3->V_04_2 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Muy insatisfecho?</th>
                                <th class="text-center">Insatisfecho?</th>
                                <th class="text-center">Ni satisfecho ni insatisfecho?</th>
                                <th class="text-center">Satisfecho?</th>
                                <th class="text-center">Muy satisfecho?</th>
                                <th class="text-center">No opina</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Respecto a la cordialidad/amabilidad del personal que lo atendió</th>
                                <td class="text-center"><?= form_radio($dataV_04_1_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_04_1_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_04_1_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_04_1_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_04_1_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_04_1_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">La disposición del personal para orientarlo a los contribuyentes</th>
                                <td class="text-center"><?= form_radio($dataV_04_2_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_04_2_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_04_2_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_04_2_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_04_2_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_04_2_6); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <h3>5.5. EFECTIVIDAD</h3>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <?php
//                        $dataV_05_1 = array('name' => 'V_05_1', 'id' => 'V_05_1');
                    $dataV_05_1_1 = array(
                        'name' => 'V_05_1', 'id' => 'V_05_1', 'value' => 1, 'checked' => ($form3->V_05_1 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_1_2 = array(
                        'name' => 'V_05_1', 'id' => 'V_05_1', 'value' => 2, 'checked' => ($form3->V_05_1 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_1_3 = array(
                        'name' => 'V_05_1', 'id' => 'V_05_1', 'value' => 3, 'checked' => ($form3->V_05_1 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_1_4 = array(
                        'name' => 'V_05_1', 'id' => 'V_05_1', 'value' => 4, 'checked' => ($form3->V_05_1 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_1_5 = array(
                        'name' => 'V_05_1', 'id' => 'V_05_1', 'value' => 5, 'checked' => ($form3->V_05_1 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_1_6 = array(
                        'name' => 'V_05_1', 'id' => 'V_05_1', 'value' => 6, 'checked' => ($form3->V_05_1 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
//                        $dataV_05_2 = array('name' => 'V_05_2', 'id' => 'V_05_2');
                    $dataV_05_2_1 = array(
                        'name' => 'V_05_2', 'id' => 'V_05_2', 'value' => 1, 'checked' => ($form3->V_05_2 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_2_2 = array(
                        'name' => 'V_05_2', 'id' => 'V_05_2', 'value' => 2, 'checked' => ($form3->V_05_2 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_2_3 = array(
                        'name' => 'V_05_2', 'id' => 'V_05_2', 'value' => 3, 'checked' => ($form3->V_05_2 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_2_4 = array(
                        'name' => 'V_05_2', 'id' => 'V_05_2', 'value' => 4, 'checked' => ($form3->V_05_2 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_2_5 = array(
                        'name' => 'V_05_2', 'id' => 'V_05_2', 'value' => 5, 'checked' => ($form3->V_05_2 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_2_6 = array(
                        'name' => 'V_05_2', 'id' => 'V_05_2', 'value' => 6, 'checked' => ($form3->V_05_2 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
//                        $dataV_05_3 = array('name' => 'V_05_3', 'id' => 'V_05_3');
                    $dataV_05_3_1 = array(
                        'name' => 'V_05_3', 'id' => 'V_05_3', 'value' => 1, 'checked' => ($form3->V_05_3 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_3_2 = array(
                        'name' => 'V_05_3', 'id' => 'V_05_3', 'value' => 2, 'checked' => ($form3->V_05_3 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_3_3 = array(
                        'name' => 'V_05_3', 'id' => 'V_05_3', 'value' => 3, 'checked' => ($form3->V_05_3 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_3_4 = array(
                        'name' => 'V_05_3', 'id' => 'V_05_3', 'value' => 4, 'checked' => ($form3->V_05_3 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_3_5 = array(
                        'name' => 'V_05_3', 'id' => 'V_05_3', 'value' => 5, 'checked' => ($form3->V_05_3 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_05_3_6 = array(
                        'name' => 'V_05_3', 'id' => 'V_05_3', 'value' => 6, 'checked' => ($form3->V_05_3 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Muy insatisfecho?</th>
                                <th class="text-center">Insatisfecho?</th>
                                <th class="text-center">Ni satisfecho ni insatisfecho?</th>
                                <th class="text-center">Satisfecho?</th>
                                <th class="text-center">Muy satisfecho?</th>
                                <th class="text-center">No opina</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">El tiempo que transcurrió para ser atendido (desde que llegó al local)</th>
                                <td class="text-center"><?= form_radio($dataV_05_1_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_1_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_1_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_1_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_1_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_1_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">El tiempo dedicado a la atención durante el proceso</th>
                                <td class="text-center"><?= form_radio($dataV_05_2_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_2_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_2_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_2_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_2_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_2_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">El resultado de la consulta</th>
                                <td class="text-center"><?= form_radio($dataV_05_3_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_3_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_3_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_3_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_3_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_05_3_6); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <h3>5.6. INFRAESTRUCTURA</h3>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <?php
                    $dataV_06_1_1 = array(
                        'name' => 'V_06_1', 'id' => 'V_06_1', 'value' => 1, 'checked' => ($form3->V_06_1 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_1_2 = array(
                        'name' => 'V_06_1', 'id' => 'V_06_1', 'value' => 2, 'checked' => ($form3->V_06_1 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_1_3 = array(
                        'name' => 'V_06_1', 'id' => 'V_06_1', 'value' => 3, 'checked' => ($form3->V_06_1 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_1_4 = array(
                        'name' => 'V_06_1', 'id' => 'V_06_1', 'value' => 4, 'checked' => ($form3->V_06_1 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_1_5 = array(
                        'name' => 'V_06_1', 'id' => 'V_06_1', 'value' => 5, 'checked' => ($form3->V_06_1 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_1_6 = array(
                        'name' => 'V_06_1', 'id' => 'V_06_1', 'value' => 6, 'checked' => ($form3->V_06_1 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');

                    $dataV_06_2_1 = array(
                        'name' => 'V_06_2', 'id' => 'V_06_2', 'value' => 1, 'checked' => ($form3->V_06_2 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_2_2 = array(
                        'name' => 'V_06_2', 'id' => 'V_06_2', 'value' => 2, 'checked' => ($form3->V_06_2 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_2_3 = array(
                        'name' => 'V_06_2', 'id' => 'V_06_2', 'value' => 3, 'checked' => ($form3->V_06_2 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_2_4 = array(
                        'name' => 'V_06_2', 'id' => 'V_06_2', 'value' => 4, 'checked' => ($form3->V_06_2 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_2_5 = array(
                        'name' => 'V_06_2', 'id' => 'V_06_2', 'value' => 5, 'checked' => ($form3->V_06_2 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_2_6 = array(
                        'name' => 'V_06_2', 'id' => 'V_06_2', 'value' => 6, 'checked' => ($form3->V_06_2 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');

                    $dataV_06_3_1 = array(
                        'name' => 'V_06_3', 'id' => 'V_06_3', 'value' => 1, 'checked' => ($form3->V_06_3 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_3_2 = array(
                        'name' => 'V_06_3', 'id' => 'V_06_3', 'value' => 2, 'checked' => ($form3->V_06_3 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_3_3 = array(
                        'name' => 'V_06_3', 'id' => 'V_06_3', 'value' => 3, 'checked' => ($form3->V_06_3 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_3_4 = array(
                        'name' => 'V_06_3', 'id' => 'V_06_3', 'value' => 4, 'checked' => ($form3->V_06_3 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_3_5 = array(
                        'name' => 'V_06_3', 'id' => 'V_06_3', 'value' => 5, 'checked' => ($form3->V_06_3 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_3_6 = array(
                        'name' => 'V_06_3', 'id' => 'V_06_3', 'value' => 6, 'checked' => ($form3->V_06_3 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');

                    $dataV_06_4_1 = array(
                        'name' => 'V_06_4', 'id' => 'V_06_4', 'value' => 1, 'checked' => ($form3->V_06_4 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_4_2 = array(
                        'name' => 'V_06_4', 'id' => 'V_06_4', 'value' => 2, 'checked' => ($form3->V_06_4 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_4_3 = array(
                        'name' => 'V_06_4', 'id' => 'V_06_4', 'value' => 3, 'checked' => ($form3->V_06_4 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_4_4 = array(
                        'name' => 'V_06_4', 'id' => 'V_06_4', 'value' => 4, 'checked' => ($form3->V_06_4 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_4_5 = array(
                        'name' => 'V_06_4', 'id' => 'V_06_4', 'value' => 5, 'checked' => ($form3->V_06_4 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_4_6 = array(
                        'name' => 'V_06_4', 'id' => 'V_06_4', 'value' => 6, 'checked' => ($form3->V_06_4 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');

                    $dataV_06_5_1 = array(
                        'name' => 'V_06_5', 'id' => 'V_06_5', 'value' => 1, 'checked' => ($form3->V_06_5 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_5_2 = array(
                        'name' => 'V_06_5', 'id' => 'V_06_5', 'value' => 2, 'checked' => ($form3->V_06_5 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_5_3 = array(
                        'name' => 'V_06_5', 'id' => 'V_06_5', 'value' => 3, 'checked' => ($form3->V_06_5 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_5_4 = array(
                        'name' => 'V_06_5', 'id' => 'V_06_5', 'value' => 4, 'checked' => ($form3->V_06_5 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_5_5 = array(
                        'name' => 'V_06_5', 'id' => 'V_06_5', 'value' => 5, 'checked' => ($form3->V_06_5 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_5_6 = array(
                        'name' => 'V_06_5', 'id' => 'V_06_5', 'value' => 6, 'checked' => ($form3->V_06_5 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');

                    $dataV_06_6_1 = array(
                        'name' => 'V_06_6', 'id' => 'V_06_6', 'value' => 1, 'checked' => ($form3->V_06_6 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_6_2 = array(
                        'name' => 'V_06_6', 'id' => 'V_06_6', 'value' => 2, 'checked' => ($form3->V_06_6 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_6_3 = array(
                        'name' => 'V_06_6', 'id' => 'V_06_6', 'value' => 3, 'checked' => ($form3->V_06_6 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_6_4 = array(
                        'name' => 'V_06_6', 'id' => 'V_06_6', 'value' => 4, 'checked' => ($form3->V_06_6 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_6_5 = array(
                        'name' => 'V_06_6', 'id' => 'V_06_6', 'value' => 5, 'checked' => ($form3->V_06_6 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_06_6_6 = array(
                        'name' => 'V_06_6', 'id' => 'V_06_6', 'value' => 6, 'checked' => ($form3->V_06_6 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Muy deficiente?</th>
                                <th class="text-center">Deficiente?</th>
                                <th class="text-center">Ni deficiente ni satisfactorio?</th>
                                <th class="text-center">Satisfactorio?</th>
                                <th class="text-center">Muy satisfactorio?</th>
                                <th class="text-center">No opina</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Estado de los ambientes en general (sala de atención, servicios higiénicos, ascensores, otros).</th>
                                <td class="text-center"><?= form_radio($dataV_06_1_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_1_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_1_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_1_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_1_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_1_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tamaño de ambientes</th>
                                <td class="text-center"><?= form_radio($dataV_06_2_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_2_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_2_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_2_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_2_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_2_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Instalaciones de seguridad (señales de seguridad, extintores, separadores de cola, otros)</th>
                                <td class="text-center"><?= form_radio($dataV_06_3_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_3_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_3_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_3_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_3_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_3_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Calefacción / aire acondicionado</th>
                                <td class="text-center"><?= form_radio($dataV_06_4_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_4_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_4_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_4_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_4_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_4_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Al espacio que cuenta el CCF para recibir y organizar su documentación</th>
                                <td class="text-center"><?= form_radio($dataV_06_5_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_5_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_5_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_5_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_5_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_5_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">La infraestructura para atención de personas con discapacidad</th>
                                <td class="text-center"><?= form_radio($dataV_06_6_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_6_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_6_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_6_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_6_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_06_6_6); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <h3>5.7. MOBILIARIO</h3>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <?php
                    $dataV_07_1_1 = array(
                        'name' => 'V_07_1', 'id' => 'V_07_1', 'value' => 1, 'checked' => ($form3->V_07_1 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_1_2 = array(
                        'name' => 'V_07_1', 'id' => 'V_07_1', 'value' => 2, 'checked' => ($form3->V_07_1 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_1_3 = array(
                        'name' => 'V_07_1', 'id' => 'V_07_1', 'value' => 3, 'checked' => ($form3->V_07_1 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_1_4 = array(
                        'name' => 'V_07_1', 'id' => 'V_07_1', 'value' => 4, 'checked' => ($form3->V_07_1 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_1_5 = array(
                        'name' => 'V_07_1', 'id' => 'V_07_1', 'value' => 5, 'checked' => ($form3->V_07_1 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_1_6 = array(
                        'name' => 'V_07_1', 'id' => 'V_07_1', 'value' => 6, 'checked' => ($form3->V_07_1 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');

                    $dataV_07_2_1 = array(
                        'name' => 'V_07_2', 'id' => 'V_07_2', 'value' => 1, 'checked' => ($form3->V_07_2 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_2_2 = array(
                        'name' => 'V_07_2', 'id' => 'V_07_2', 'value' => 2, 'checked' => ($form3->V_07_2 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_2_3 = array(
                        'name' => 'V_07_2', 'id' => 'V_07_2', 'value' => 3, 'checked' => ($form3->V_07_2 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_2_4 = array(
                        'name' => 'V_07_2', 'id' => 'V_07_2', 'value' => 4, 'checked' => ($form3->V_07_2 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_2_5 = array(
                        'name' => 'V_07_2', 'id' => 'V_07_2', 'value' => 5, 'checked' => ($form3->V_07_2 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_2_6 = array(
                        'name' => 'V_07_2', 'id' => 'V_07_2', 'value' => 6, 'checked' => ($form3->V_07_2 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');

                    $dataV_07_3_1 = array(
                        'name' => 'V_07_3', 'id' => 'V_07_3', 'value' => 1, 'checked' => ($form3->V_07_3 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_3_2 = array(
                        'name' => 'V_07_3', 'id' => 'V_07_3', 'value' => 2, 'checked' => ($form3->V_07_3 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_3_3 = array(
                        'name' => 'V_07_3', 'id' => 'V_07_3', 'value' => 3, 'checked' => ($form3->V_07_3 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_3_4 = array(
                        'name' => 'V_07_3', 'id' => 'V_07_3', 'value' => 4, 'checked' => ($form3->V_07_3 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_3_5 = array(
                        'name' => 'V_07_3', 'id' => 'V_07_3', 'value' => 5, 'checked' => ($form3->V_07_3 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_07_3_6 = array(
                        'name' => 'V_07_3', 'id' => 'V_07_3', 'value' => 6, 'checked' => ($form3->V_07_3 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Muy deficiente?</th>
                                <th class="text-center">Deficiente?</th>
                                <th class="text-center">Ni deficiente ni satisfactorio?</th>
                                <th class="text-center">Satisfactorio?</th>
                                <th class="text-center">Muy satisfactorio?</th>
                                <th class="text-center">No opina</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Sillas de espera</th>
                                <td class="text-center"><?= form_radio($dataV_07_1_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_1_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_1_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_1_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_1_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_1_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Módulos de atención</th>
                                <td class="text-center"><?= form_radio($dataV_07_2_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_2_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_2_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_2_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_2_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_2_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Señalización del local (puntos de atención)</th>
                                <td class="text-center"><?= form_radio($dataV_07_3_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_3_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_3_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_3_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_3_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_07_3_6); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <h3>5.8. ACCESIBILIDAD Y SEGURIDAD</h3>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <?php
                    $dataV_08_1_1 = array(
                        'name' => 'V_08_1', 'id' => 'V_08_1', 'value' => 1, 'checked' => ($form3->V_08_1 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_1_2 = array(
                        'name' => 'V_08_1', 'id' => 'V_08_1', 'value' => 2, 'checked' => ($form3->V_08_1 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_1_3 = array(
                        'name' => 'V_08_1', 'id' => 'V_08_1', 'value' => 3, 'checked' => ($form3->V_08_1 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_1_4 = array(
                        'name' => 'V_08_1', 'id' => 'V_08_1', 'value' => 4, 'checked' => ($form3->V_08_1 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_1_5 = array(
                        'name' => 'V_08_1', 'id' => 'V_08_1', 'value' => 5, 'checked' => ($form3->V_08_1 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_1_6 = array(
                        'name' => 'V_08_1', 'id' => 'V_08_1', 'value' => 6, 'checked' => ($form3->V_08_1 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');

                    $dataV_08_2_1 = array(
                        'name' => 'V_08_2', 'id' => 'V_08_2', 'value' => 1, 'checked' => ($form3->V_08_2 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_2_2 = array(
                        'name' => 'V_08_2', 'id' => 'V_08_2', 'value' => 2, 'checked' => ($form3->V_08_2 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_2_3 = array(
                        'name' => 'V_08_2', 'id' => 'V_08_2', 'value' => 3, 'checked' => ($form3->V_08_2 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_2_4 = array(
                        'name' => 'V_08_2', 'id' => 'V_08_2', 'value' => 4, 'checked' => ($form3->V_08_2 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_2_5 = array(
                        'name' => 'V_08_2', 'id' => 'V_08_2', 'value' => 5, 'checked' => ($form3->V_08_2 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_2_6 = array(
                        'name' => 'V_08_2', 'id' => 'V_08_2', 'value' => 6, 'checked' => ($form3->V_08_2 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');

                    $dataV_08_3_1 = array(
                        'name' => 'V_08_3', 'id' => 'V_08_3', 'value' => 1, 'checked' => ($form3->V_08_3 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_3_2 = array(
                        'name' => 'V_08_3', 'id' => 'V_08_3', 'value' => 2, 'checked' => ($form3->V_08_3 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_3_3 = array(
                        'name' => 'V_08_3', 'id' => 'V_08_3', 'value' => 3, 'checked' => ($form3->V_08_3 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_3_4 = array(
                        'name' => 'V_08_3', 'id' => 'V_08_3', 'value' => 4, 'checked' => ($form3->V_08_3 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_3_5 = array(
                        'name' => 'V_08_3', 'id' => 'V_08_3', 'value' => 5, 'checked' => ($form3->V_08_3 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataV_08_3_6 = array(
                        'name' => 'V_08_3', 'id' => 'V_08_3', 'value' => 6, 'checked' => ($form3->V_08_3 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Muy insatisfecho?</th>
                                <th class="text-center">Insatisfecho?</th>
                                <th class="text-center">Ni satisfecho ni insatisfecho?</th>
                                <th class="text-center">Satisfecho?</th>
                                <th class="text-center">Muy satisfecho?</th>
                                <th class="text-center">No opina</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Disponibilidad de estacionamiento</th>
                                <td class="text-center"><?= form_radio($dataV_08_1_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_1_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_1_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_1_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_1_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_1_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Medios de transporte para el acceso al CCF</th>
                                <td class="text-center"><?= form_radio($dataV_08_2_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_2_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_2_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_2_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_2_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_2_6); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Seguridad en alrededores</th>
                                <td class="text-center"><?= form_radio($dataV_08_3_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_3_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_3_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_3_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_3_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_08_3_6); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <h2>ATENCIÓN EN GENERAL</h2>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
<?php
//                        $dataV_09_1 = array('name' => 'V_09_1', 'id' => 'V_09_1');
$dataV_09_1 = array(
    'name' => 'V_09', 'id' => 'V_09', 'value' => 1, 'checked' => ($form3->V_09 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
$dataV_09_2 = array(
    'name' => 'V_09', 'id' => 'V_09', 'value' => 2, 'checked' => ($form3->V_09 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
$dataV_09_3 = array(
    'name' => 'V_09', 'id' => 'V_09', 'value' => 3, 'checked' => ($form3->V_09 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
$dataV_09_4 = array(
    'name' => 'V_09', 'id' => 'V_09', 'value' => 4, 'checked' => ($form3->V_09 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
$dataV_09_5 = array(
    'name' => 'V_09', 'id' => 'V_09', 'value' => 5, 'checked' => ($form3->V_09 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
$dataV_09_6 = array(
    'name' => 'V_09', 'id' => 'V_09', 'value' => 6, 'checked' => ($form3->V_09 === '6' ? TRUE : FALSE), 'style' => 'margin-right:5px');
?>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Muy insatisfecho?</th>
                                <th class="text-center">Insatisfecho?</th>
                                <th class="text-center">Ni satisfecho ni insatisfecho?</th>
                                <th class="text-center">Satisfecho?</th>
                                <th class="text-center">Muy satisfecho?</th>
                                <th class="text-center">No opina</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">En general que tan satisfecho se siente con la atención que recibió en el CCF</th>
                                <td class="text-center"><?= form_radio($dataV_09_1); ?></td>
                                <td class="text-center"><?= form_radio($dataV_09_2); ?></td>
                                <td class="text-center"><?= form_radio($dataV_09_3); ?></td>
                                <td class="text-center"><?= form_radio($dataV_09_4); ?></td>
                                <td class="text-center"><?= form_radio($dataV_09_5); ?></td>
                                <td class="text-center"><?= form_radio($dataV_09_6); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-actions col-sm-5 col-sm-offset-5">
<?= form_button(array('type' => 'submit', 'id' => 'grabar', 'content' => 'Terminar cuestionario', 'class' => 'btn btn-primary')); ?>
                <!-- ?= form_button(array('type' => 'reset', 'id' => 'limpiar', 'content' => 'Limpiar pagina', 'class' => 'btn btn-danger', 'onClick' => 'return V_01_1.focus()')); ?>-->
                <?= anchor('encuestaccf/index', 'Cancelar', array('class' => 'btn btn-warning')); ?>
            </div><!--<button class="btn-block btn-danger btn-default btn-group btn-info btn-link btn-navbar btn-primary btn-success btn-toolbar btn-warning"-->
        </fieldset>

<?= form_close(); ?>
    </div>
</div>