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
        $.validator.addMethod(
                "ranges",
                function (value, element, ranges) {
                    var noUpperBound = false;
                    var valid = false;
                    for (var i = 0; i < ranges.length; i++) {
                        if (ranges[i].length == 1) {
                            noUpperBound = true;
                        }
                        if (value >= ranges[i][0] && (value <= ranges[i][1] || noUpperBound)) {
                            valid = true;
                            break;
                        }
                    }
                    return this.optional(element) || valid;
                },
                "Please check your input."
                );
        $("form[name='page1']").validate({
            focusCleanup: true,
            ignore: [],
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                USUARIO_NOMBRES: {required: true, digits: false, minlength: 2},
                USUARIO_APELLIDOS: {required: true, digits: false, minlength: 2},
                USUARIO_DIRECCION: "required",
                P1_UBIGEO: "required",
                P2: "required",
                P3: {
                    required: true,
                    digits: true,
                    range: [15, 99]
                },
                P4: {
                    required: true,
                    digits: true,
                    minlength: 11,
                    ranges: [[10000000001, 10999999999], [20000000001, 20999999999]]
                },
                P5: "required",
                P6: "required",
                P7: {
                    required: {
                        depends: function () {
                            return $('input[name=P6]:checked').val() == '1';
                        }
                    }
                },
                P8: {
                    required: {
                        depends: function () {
                            return $('input[name=P6]:checked').val() == '1';
                        }
                    }
                },
                P8_DISTRITO: {
                    required: {
                        depends: function () {
                            return $('input[name=P6]:checked').val() == '1';
                        }
                    }
                },
                P9: {
                    required: {
                        depends: function () {
                            return $('input[name=P6]:checked').val() == '1';
                        }
                    }
                }
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
                /*P1: "Debe indicar su nombre y apellido",*/
                USUARIO_NOMBRES: "Debe indicar sus nombres",
                USUARIO_APELLIDOS: "Debe indicar sus apellidos",
                USUARIO_DIRECCION: "Indicar domicilio actual",
                P1_UBIGEO: "Indicar distrito de procedencia",
                P2: "Falta esta informacion",
                P3: "Debe ser mayor o igual a 15",
                P4: "Por favor, ingrese un RUC valido",
                P6: "Este campo es requerido",
                P7: "Este campo es requerido para personas juridicas",
                P8: "Este campo es requerido para personas juridicas",
                P8_DISTRITO: "Este campo es requerido para personas juridicas",
                P9: "Este campo es requerido para personas juridicas"
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
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            startDate: '-3d'
        });
        $("#USUARIO_NOMBRES").keydown(function (e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('USUARIO_APELLIDOS').focus();
        });
        $("#USUARIO_APELLIDOS").keydown(function (e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('USUARIO_DIRECCION').focus();
        });
        $("#USUARIO_DIRECCION").keydown(function (e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('P1_UBIGEO').focus();
        });
        $("#P1_UBIGEO").keydown(function (e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('P2').focus();
        });
        $("#P2").keydown(function (e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('P3').focus();
        });
        $("#P3").keydown(function (e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('P4').focus();
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
        //SOLO NUMEROS
        $("#P4").keydown(function (e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('P5').focus();
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
        $('#page1 input[name=P5]').on('change', function () {
            if ($('input[name=P5]:checked', '#page1').val() >= 1) {
                $('#P6').focus();
            }
        });
        $('#page1 input[name=P6]').on('change', function () {
            if ($('input[name=P6]:checked', '#page1').val() == 1) {
                $("#P7").removeAttr("readonly");
                $("#P8").removeAttr("readonly");
                $("#P8_DISTRITO").removeAttr("readonly");
                $("#page1 input[name=P9]").removeAttr('disabled');
                $("#P7").focus();
            } else if ($('input[name=P6]:checked', '#page1').val() == 2) {
                $("#P7").val("").attr("readonly", true);
                $("#P8").val("").attr("readonly", true);
                $("#P8_DISTRITO").val("").attr("readonly", true);
                $("#page1 input[name=P9]").val("").attr('disabled', true);
                $("#page1 input[name=P9]").attr('checked', false);
                $("#grabar").focus();
            }
        });
        $("#P7").keydown(function (e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('P8').focus();
        });
        $("#P8").keydown(function (e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('P8_DISTRITO').focus();
        });
        $("#P8_DISTRITO").keydown(function (e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('P9').focus();
        });
        $("#P9").keydown(function (e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('grabar').focus();
        });
        /*$('#page1 input[name=P9]').on('change', function () {
         if ($('input[name=P9]:checked', '#page1').val() >= 1) {
         $('#grabar').focus();
         }
         });*/
    });
</script>
<br/>
<ul class="tab">
    <li class="pull-left"><a href="<?= site_url('encuestaccf/index/'); ?>">Regresar a la lista</a></li>
    <li class="pull-right"><a href="<?= site_url('encuestaccf/irpagina2/' . $form1->ID); ?>">Página 2</a></li>
</ul>

<div class="panel panel-primary">
    <div class="panel-heading">
        I. DATOS DEL USUARIO
    </div>
    <div class="panel-body">
        <?= form_open('encuestaccf/registrapag1', array('id' => 'page1', 'name' => 'page1', 'class' => 'form-horizontal')); ?>
        <?= validation_errors(); ?>
        <fieldset>
            <?= form_hidden('ID', $form1->ID); ?>

            <div class="form-group">
                <?= form_label('Fecha de la encuesta', '', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-8">
                    <?= form_input(array('type' => 'text', 'name' => 'ENC_FECHA', 'id' => 'ENC_FECHA', 'value' => $form1->ENC_FECHA, 'data-provide' => 'datepicker', 'data-date-format' => "dd/mm/yyyy")); ?>
                </div> 
            </div>
            <div class="form-group">
                <?= form_label('Sedes de SUNAT', 'sede', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-8">
                    <?= form_dropdown('CCF_CODIGO', $sedes, $form1->CCF_CODIGO, 'class="form-control input-sm" id="CCF_CODIGO"'); ?>
                </div> 
            </div>
            <div class="form-group">  
                <?= form_label('Nombres y apellidos', 'INF_USUARIO', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-3">
                    <?= form_input(array('type' => 'text', 'name' => 'USUARIO_NOMBRES', 'id' => 'USUARIO_NOMBRES', 'placeholder' => 'NOMBRES', 'value' => $form1->USUARIO_NOMBRES, 'onkeyup' => 'this.value=this.value.toUpperCase()', 'class' => "form-control input-sm")); ?>
                </div>
                <div class="col-sm-3">
                    <?= form_input(array('type' => 'text', 'name' => 'USUARIO_APELLIDOS', 'id' => 'USUARIO_APELLIDOS', 'placeholder' => 'APELLIDOS', 'value' => $form1->USUARIO_APELLIDOS, 'onkeyup' => 'this.value=this.value.toUpperCase()', 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('Dirección', 'USUARIO_DIRECCION', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?= form_input(array('type' => 'text', 'name' => 'USUARIO_DIRECCION', 'id' => 'USUARIO_DIRECCION', 'placeholder' => 'DIRECCIÓN ACTUAL', 'value' => $form1->USUARIO_DIRECCION, 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '125', 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('1. Distrito de procedencia', 'P1_UBIGEO', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-4">
                    <?= form_dropdown('P1_UBIGEO', $distritos, $form1->P1_UBIGEO, 'class="form-control input-sm" id="P1_UBIGEO"'); ?>
                </div> 
            </div>
            <div class="form-group">
                <?= form_label('2.Sexo', 'P2', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-6">
                    <?php
                    $dataP2_1 = array(
                        'name' => 'P2', 'id' => 'P2', 'value' => 1, 'checked' => ($form1->P2 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP2_2 = array(
                        'name' => 'P2', 'id' => 'P2', 'value' => 2, 'checked' => ($form1->P2 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP2_1) . ' Hombre', 'P2_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP2_2) . ' Mujer', 'P2_x2', array('class' => 'radio-inline')); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <?= form_label('3. Edad', 'P3', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P3', 'id' => 'P3', 'maxlength' => '2', 'value' => $form1->P3, 'class' => "form-control input-sm")); ?>
                </div>
                <div class="col-sm-4">
                    <h6>* Colocar 99 para omisiones.</h6>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('4. Número de RUC', 'P4', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-3">
                    <?= form_input(array('type' => 'text', 'name' => 'P4', 'id' => 'P4', 'maxlength' => '11', 'value' => $form1->P4, 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('5. NIVEL EDUCATIVO', 'P5', array('class' => 'col-sm-3 control-label')); ?>
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
                    ?>
                    <div class="radio">
                        <?= form_label(form_radio($dataP5_1) . ' Sin nivel', 'P5_x1'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP5_2) . ' Primaria', 'P5_x2'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP5_3) . ' Secundaria', 'P5_x3'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP5_4) . ' Superior Técnica', 'P5_x4'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP5_5) . ' Superior Universitaria', 'P5_x5'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('6.Tipo', 'P6', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-8">
                    <?php
                    $dataP6_1 = array(
                        'name' => 'P6', 'id' => 'P6', 'value' => 1, 'checked' => ($form1->P6 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP6_2 = array(
                        'name' => 'P6', 'id' => 'P6', 'value' => 2, 'checked' => ($form1->P6 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-4">                        
                        <?= form_label(form_radio($dataP6_1) . ' Persona Jurídica', 'P6_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-4">                        
                        <?= form_label(form_radio($dataP6_2) . ' Persona Natural', 'P6_x2', array('class' => 'radio-inline')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('7. Razón social', 'P7', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?= form_input(array('type' => 'text', 'name' => 'P7', 'id' => 'P7', 'placeholder' => 'RAZÓN SOCIAL', 'maxlength' => '240', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'value' => $form1->P7, 'onkeyup' => 'this.value=this.value.toUpperCase()', 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('8. Dirección fiscal', 'P8', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?= form_input(array('type' => 'text', 'name' => 'P8', 'id' => 'P8', 'placeholder' => 'DIRECCIÓN FISCAL', 'maxlength' => '240', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'value' => $form1->P8, 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('Distrito de la dirección fiscal', 'P8_DISTRITO', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-3">
                    <?= form_input(array('type' => 'text', 'name' => 'P8_DISTRITO', 'id' => 'P8_DISTRITO', 'placeholder' => 'DISTRITO', 'maxlength' => '60', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'readonly' => 'true', 'size' => '100', 'value' => $form1->P8_DISTRITO, 'class' => "form-control input-sm")); ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('9. PARA ESTE TRÁMITE REPRESENTA A LA EMPRESA COMO', 'P9', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php
                    $dataP9_1 = array(
                        'name' => 'P9', 'id' => 'P9', 'value' => 1, 'checked' => ($form1->P9 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP9_2 = array(
                        'name' => 'P9', 'id' => 'P9', 'value' => 2, 'checked' => ($form1->P9 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP9_3 = array(
                        'name' => 'P9', 'id' => 'P9', 'value' => 3, 'checked' => ($form1->P9 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP9_1) . ' Titular', 'P9_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP9_2) . ' Tercero con carta poder', 'P9_x2', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP9_3) . ' Representante legal', 'P9_x3', array('class' => 'radio-inline')); ?>
                    </div>
                    <span for="P9" id="P9-error" class="help-block"></span>
                </div>
            </div>
            <div class="form-actions col-sm-5 col-sm-offset-5">
                <?= form_button(array('type' => 'submit', 'id' => 'grabar', 'content' => 'Siguiente pagina', 'class' => 'btn btn-primary')); ?>
                <?= anchor('encuestaccf/index', 'Cancelar', array('class' => 'btn btn-warning')); ?>
            </div>
        </fieldset>
        <?= form_close(); ?>
    </div>
</div>