<script>
    $(document).ready(function () {
        $(":input").on("keydown", function (event) {
            if ((event.which == 13 || event.keyCode == 13) && !$(this).is("textarea, :button, :submit")) {
                event.stopPropagation();
                event.preventDefault();
                $(this)
                        .nextAll(":input:not(:disabled, [readonly='readonly'])")
                        .first()
                        .focus();
            }
        });
        $("form[name='page2']").validate({
            focusCleanup: true,
            ignore: [],
            rules: {
                P10: {
                    required: true,
                    range: [1, 2]
                },
                /*P10_AUX: {
                    required: {
                        depends: function () {
                            return $('input[name=P10]:checked').val() == '1';
                        }
                    }
                },*/
                P11: {
                    required: true,
                    range: [1, 2]
                },
                P12: {
                    required: true,
                    range: [0, 20]
                },
                P14: {
                    required: true,
                    range: [1, 2]
                },
                P16: {
                    required: true,
                    range: [1, 2]
                },
                P17_HOR: {
                    required: true,
                    digits: true,
                    range: [0, 10]
                },
                P17_MIN: {
                    required: true,
                    digits: true,
                    range: [0, 59]
                },
                P18_HOR: {
                    required: true,
                    digits: true,
                    range: [0, 10]
                },
                P18_MIN: {
                    required: true,
                    digits: true,
                    range: [0, 59]
                },
                P19: {
                    required: true,
                    range: [1, 2]
                },
                P20: {
                    required: true,
                    range: [1, 2]
                },
                P21: {
                    required: true,
                    range: [1, 3]
                },
                P22: {
                    required: true,
                    range: [1, 2]
                },
                P23_AUX: {
                    required: true,
                    range: [1, 6]
                },
                P24_HOR: {
                    required: true,
                    digits: true,
                    range: [0, 10]
                },
                P24_MIN: {
                    required: true,
                    digits: true,
                    range: [0, 59]
                },
                P25_ENT: {
                    required: true,
                    digits: true,
                    range: [0, 99]
                },
                P25_DEC: {
                    required: true,
                    digits: true,
                    range: [0, 99]
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
                P10: "Pregunta obligatoria",
                P10_AUX: "Debe completar la lista",
                P11: "Pregunta obligatoria",
                P12: "Pregunta obligatoria",
                P14: "Pregunta obligatoria",
                P16: "Pregunta obligatoria",
                P17_HOR: "Verifique las horas",
                P17_MIN: "Verifique los minutos",
                P18_HOR: "Verifique las horas",
                P18_MIN: "Verifique los minutos",
                P19: "Complete esta informacion",
                P20: "Complete esta informacion",
                P21: "Complete esta informacion",
                P22: "Complete esta informacion",
                P23_AUX: "Complete esta informacion",
                P24_HOR: "Complete esta informacion",
                P24_MIN: "Complete esta informacion",
                P25_ENT: "Complete esta informacion",
                P25_DEC: "Complete esta informacion"
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
        //page2
        var $P13_AUX = $('#P13 input[type="checkbox"]');
        $P13_AUX.change(function () {
            var countP13 = $P13_AUX.filter(':checked').length;
            if (countP13 == 0) {
                $('#page2 input[name=P13_AUX]').val('');
            } else {
                $('#page2 input[name=P13_AUX]').val(countP13);
            }
        });
        var $P21_AUX = $('#P21_A input[type="checkbox"]');
        $P21_AUX.change(function () {
            var countP21_A = $P21_AUX.filter(':checked').length;
            if (countP21_A == 0) {
                $('#page2 input[name=P21_AUX]').val('');
            } else {
                $('#page2 input[name=P21_AUX]').val(countP21_A);
            }
        });
        var $P22_AUX = $('#P22_A input[type="checkbox"]');
        $P22_AUX.change(function () {
            var countP22_A = $P22_AUX.filter(':checked').length;
            if (countP22_A == 0) {
                $('#page2 input[name=P22_AUX]').val('');
            } else {
                $('#page2 input[name=P22_AUX]').val(countP22_A);
            }
        });
        var $P23_AUX = $('#P23 input[type="checkbox"]');
        $P23_AUX.change(function () {
            var countP23 = $P23_AUX.filter(':checked').length;
            if (countP23 == 0) {
                $('#page2 input[name=P23_AUX]').val('');
            } else {
                $('#page2 input[name=P23_AUX]').val(countP23);
            }
        });

        $('#page2 input[name=P10]').on('change', function () {
            if ($('input[name=P10]:checked', '#page2').val() == 1) {
                $('#P10_1').removeAttr('disabled');
                $("#P10_1").removeAttr("readonly");
                $('#P10_2').removeAttr('disabled');
                $("#P10_2").removeAttr("readonly");
                $('#P10_3').removeAttr('disabled');
                $("#P10_3").removeAttr("readonly");
                $('#P10_4').removeAttr('disabled');
                $("#P10_4").removeAttr("readonly");
                $("#P10_1").focus();
            } else if ($('input[name=P10]:checked', '#page2').val() == 2) {
                $('#P10_1').val("").attr('disabled', true);
                $('#P10_2').val("").attr('disabled', true);
                $('#P10_3').val("").attr('disabled', true);
                $('#P10_4').val("").attr('disabled', true);
                $("#P11").focus();
            }
        });
        $("#P10_1").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P10_2').focus();
        });
        $("#P10_2").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P10_3').focus();
        });
        $("#P10_3").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P10_4').focus();
        });
        $("#P10_4").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P11').focus();
        });
        $("#P11").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P12').focus();
        });
        $("#P12").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P13_1').focus();
        });
        $("#P13_1").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P13_2').focus();
        });
        $("#P13_2").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P13_3').focus();
        });
        $("#P13_3").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P13_4').focus();
        });
        $('#page2 input[name=P13_4]').on('change', function () {
            if ($('input[name=P13_4]:checked', '#page2').val() == 1) {
                $('#P13_O').removeAttr('disabled');
                $('#P13_O').removeAttr('readonly');
                $('#P13_O').focus();
            } else {
                $('#P13_O').val("").attr('disabled', true);
                document.getElementById('P14').focus();
            }
        });
        $("#P13_O").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P14').focus();
        });
        $("#P14").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P15').focus();
        });
        $('#page2 input[name=P15]').on('change', function () {
            if ($('input[name=P15]:checked', '#page2').val() == 5) {
                $('#P15_O').removeAttr('disabled');
                $('#P15_O').removeAttr('readonly');
                $('#P15_O').focus();
            } else {
                $('#P15_O').val("").attr('disabled', true);
                document.getElementById('P16').focus();
            }
        });
        $("#P15_O").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P16').focus();
        });
        $("#P16").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P17_HOR').focus();
        });
        $("#P17_HOR").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P17_MIN').focus();
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode == 65 && (e.ctrlKey == true || e.metaKey == true)) ||
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
        $("#P17_MIN").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P18_HOR').focus();
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode == 65 && (e.ctrlKey == true || e.metaKey == true)) ||
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
        $("#P18_HOR").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P18_MIN').focus();
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode == 65 && (e.ctrlKey == true || e.metaKey == true)) ||
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
        $("#P18_MIN").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P19').focus();
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode == 65 && (e.ctrlKey == true || e.metaKey == true)) ||
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

        $("#P19").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P20').focus();
        });
        $("#P20").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P21').focus();
        });
        $('#page2 input[name=P21]').on('change', function () {
            if ($('input[name=P21]:checked', '#page2').val() == 1) {
                $('#P21_1').removeAttr('disabled');
                $('#P21_1').removeAttr('readonly');
                $('#P21_2').removeAttr('disabled');
                $('#P21_2').removeAttr('readonly');
                $('#P21_3').removeAttr('disabled');
                $('#P21_3').removeAttr('readonly');
                $('#P21_1').focus();
            } else {
                $('#P21_1').val("").attr('disabled', true);
                $('#P21_2').val("").attr('disabled', true);
                $('#P21_3').val("").attr('disabled', true);
                document.getElementById('P22').focus();
            }
        });
        $("#P21_1").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P21_2').focus();
        });
        $("#P21_2").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P21_3').focus();
        });
        $("#P21_3").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P22').focus();
        });
        $('#page2 input[name=P22]').on('change', function () {
            if ($('input[name=P22]:checked', '#page2').val() == 2) {
                $('#P22_1').removeAttr('disabled');
                $('#P22_2').removeAttr('disabled');
                $('#P22_3').removeAttr('disabled');
                $('#P22_4').removeAttr('disabled');
                $('#P22_1').focus();
            } else {
                $('#P22_1').val("").attr('disabled', true);
                $('#P22_1').attr('checked', false);
                $('#P22_2').val("").attr('disabled', true);
                $('#P22_2').attr('checked', false);
                $('#P22_3').val("").attr('disabled', true);
                $('#P22_3').attr('checked', false);
                $('#P22_4').val("").attr('disabled', true);
                $('#P22_4').attr('checked', false);
                $("#P22_O").val("").attr("readonly", true);
                document.getElementById('P23_1').focus();
            }
        });
        $('#page2 input[name=P22_4]').on('change', function () {
            if ($("#P22_4").is(':checked')) {
                $("#P22_O").removeAttr("readonly");
                $("#P22_O").focus();
            } else {
                $("#P22_O").val("").attr("readonly", true);
                document.getElementById('P23_1').focus();
            }
        });
        $("#P22_O").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P23_1').focus();
        });

        $('#page2 input[name=P23_6]').on('change', function () {
            if ($("#P23_6").is(':checked')) {
                $("#P23_O").removeAttr("readonly");
                $("#P23_O").focus();
            } else {
                $("#P23_O").val("").attr("readonly", true);
                document.getElementById('P24_HOR').focus();
            }
        });
        $("#P23_O").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P24_HOR').focus();
        });

        $("#P24_HOR").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P24_MIN').focus();
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode == 65 && (e.ctrlKey == true || e.metaKey == true)) ||
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
        $("#P24_MIN").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P25_ENT').focus();
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode == 65 && (e.ctrlKey == true || e.metaKey == true)) ||
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
        $("#P25_ENT").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('P25_DEC').focus();
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode == 65 && (e.ctrlKey == true || e.metaKey == true)) ||
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
        $("#P25_DEC").keydown(function (e) {
            if (e.keyCode == 13 || e.keyCode == 193)
                document.getElementById('grabar').focus();
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode == 65 && (e.ctrlKey == true || e.metaKey == true)) ||
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

    });
</script>
<br/>
<ul class="tab">
    <li class="pull-left"><a href="<?= site_url('encuestaccf/irpagina1/' . $form2->ID); ?>">Página 1</a></li>
    <li class="pull-right"><a href="<?= site_url('encuestaccf/irpagina3/' . $form2->ID); ?>">Página 3</a></li>
</ul>


<div class="panel panel-warning">
    <div class="panel-heading">
        II. SOBRE LA ATENCI&Oacute;N DE HOY
    </div>
    <?= form_open('encuestaccf/registrapag2', array('id' => 'page2', 'name' => 'page2', 'class' => 'form-horizontal')); ?>
    <?= validation_errors(); ?>

    <div class="panel-body">

        <fieldset>
            <?= form_hidden('ID', $form2->ID); ?>
            <div class="form-group">
                <?= form_label('10. ¿Cuándo lo citaron le indicaron las razones por las que tenía que acudir?', 'P10', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-4">
                    <?php
                    $dataP10_1 = array(
                        'name' => 'P10', 'id' => 'P10', 'value' => 1, 'checked' => ($form2->P10 == '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP10_2 = array(
                        'name' => 'P10', 'id' => 'P10', 'value' => 2, 'checked' => ($form2->P10 == '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP10_1) . ' S&iacute;', 'P10_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP10_2) . ' No', 'P10_x2', array('class' => 'radio-inline')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('¿Cuáles le indicaron?', 'P10_AUX', array('class' => 'col-sm-3 control-label')); ?>
                <div id="P10_AUX" class="col-sm-9">
                    <?php
                    echo form_hidden('P10_AUX', ($form2->P10_AUX) ? $form2->P10_AUX : '');
                    ?>
                    <div class="checkbox">
                        <?= form_input(array('type' => 'text', 'name' => 'P10_1', 'id' => 'P10_1', 'value' => $form2->P10_1, 'readonly' => 'true', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '125', 'class' => "form-control input-sm")); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_input(array('type' => 'text', 'name' => 'P10_2', 'id' => 'P10_2', 'value' => $form2->P10_2, 'readonly' => 'true', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '125', 'class' => "form-control input-sm")); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_input(array('type' => 'text', 'name' => 'P10_3', 'id' => 'P10_3', 'value' => $form2->P10_3, 'readonly' => 'true', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '125', 'class' => "form-control input-sm")); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_input(array('type' => 'text', 'name' => 'P10_4', 'id' => 'P10_4', 'value' => $form2->P10_4, 'readonly' => 'true', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '125', 'class' => "form-control input-sm")); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('11. ¿Le indicaron qué documentos debía traer para su cita?', 'P11', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-4">
                    <?php
                    $dataP11_1 = array(
                        'name' => 'P11', 'id' => 'P11', 'value' => 1, 'checked' => ($form2->P11 == '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP11_2 = array(
                        'name' => 'P11', 'id' => 'P11', 'value' => 2, 'checked' => ($form2->P11 == '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP11_1) . ' S&iacute;', 'P11_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP11_2) . ' No', 'P11_x2', array('class' => 'radio-inline')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('12. ¿Cuántas visitas PREVIAS hizo al CCF antes de su cita?', 'P12', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P12', 'id' => 'P12', 'maxlength' => '2', 'value' => $form2->P12, 'class' => "form-control input-sm")); ?>
                </div>
                <div class="col-sm-4">
                    <h6>* Colocar 99 para omisiones.</h6>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('13. ¿Por qué razón tuvo que asistir más de una vez?', 'P13', array('class' => 'col-sm-3 control-label')); ?>
                <div id="P13" class="col-sm-9">
                    <?php
                    $dataP13_1 = array('name' => 'P13_1', 'id' => 'P13_1', 'style' => 'margin-right:5px');
                    $dataP13_2 = array('name' => 'P13_2', 'id' => 'P13_2', 'style' => 'margin-right:5px');
                    $dataP13_3 = array('name' => 'P13_3', 'id' => 'P13_3', 'style' => 'margin-right:5px');
                    $dataP13_4 = array('name' => 'P13_4', 'id' => 'P13_4', 'style' => 'margin-right:5px');
                    echo form_hidden('P13_AUX', ($form2->P13_AUX) ? $form2->P13_AUX : '');
                    ?>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP13_1, '1', set_checkbox('P13_1', '1', $form2->P13_1 == '1' ? TRUE : FALSE)) . ' Faltaban papeles o documentos', 'P13_1'); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP13_2, '1', set_checkbox('P13_2', '1', $form2->P13_2 == '1' ? TRUE : FALSE)) . ' Por falta de información antes de venir al centro', 'P13_2'); ?>                        
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP13_3, '1', set_checkbox('P13_3', '1', $form2->P13_3 == '1' ? TRUE : FALSE)) . ' Debe solucionar algunos problemas previamente', 'P13_3'); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP13_4, '1', set_checkbox('P13_4', '1', $form2->P13_4 == '1' ? TRUE : FALSE)) . ' Otro: ' . form_input(array('type' => 'text', 'name' => 'P13_O', 'id' => 'P13_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '60', 'value' => $form2->P13_O, 'readonly' => 'true', 'size' => '100', 'class' => 'form-control')), 'P13_4'); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <?= form_label('14. ¿Requiere otra cita adicional para terminar la revision y/o verfificación de sus documentos?', 'P14', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-4">
                    <?php
                    $dataP14_1 = array(
                        'name' => 'P14', 'id' => 'P14', 'value' => 1, 'checked' => ($form2->P14 == '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP14_2 = array(
                        'name' => 'P14', 'id' => 'P14', 'value' => 2, 'checked' => ($form2->P14 == '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP14_1) . ' S&iacute;', 'P14_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP14_2) . ' No', 'P14_x2', array('class' => 'radio-inline')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('15. ¿Por qué?', 'P15', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php
                    $dataP15_1 = array(
                        'name' => 'P15', 'id' => 'P15', 'value' => 1, 'checked' => ($form2->P15 === '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP15_2 = array(
                        'name' => 'P15', 'id' => 'P15', 'value' => 2, 'checked' => ($form2->P15 === '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP15_3 = array(
                        'name' => 'P15', 'id' => 'P15', 'value' => 3, 'checked' => ($form2->P15 === '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP15_4 = array(
                        'name' => 'P15', 'id' => 'P15', 'value' => 4, 'checked' => ($form2->P15 === '4' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP15_5 = array(
                        'name' => 'P15', 'id' => 'P15', 'value' => 5, 'checked' => ($form2->P15 === '5' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="radio">
                        <?= form_label(form_radio($dataP15_1) . ' 1. Rectificará lo acordado', 'P15_x1'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP15_2) . ' 2. Pagará lo acordado', 'P15_x2'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP15_3) . ' 3. No aceptará lo acordado', 'P15_x3'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP15_4) . ' 4. Levantará la inconsistencia', 'P15_x4'); ?>
                    </div>
                    <div class="radio">
                        <?= form_label(form_radio($dataP15_5) . ' 5. Otro ' . form_input(array('type' => 'text', 'name' => 'P15_O', 'id' => 'P15_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '60', 'value' => $form2->P15_O, 'readonly' => 'true', 'size' => '100', 'class' => 'form-control')), 'P15_x5'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('16. ¿El profesional que lo atendió fue el mismo que lo citó?', 'P16', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-8">
                    <?php
                    $dataP16_1 = array(
                        'name' => 'P16', 'id' => 'P16', 'value' => 1, 'checked' => ($form2->P16 == '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP16_2 = array(
                        'name' => 'P16', 'id' => 'P16', 'value' => 2, 'checked' => ($form2->P16 == '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP16_3 = array(
                        'name' => 'P16', 'id' => 'P16', 'value' => 3, 'checked' => ($form2->P16 == '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP16_1) . ' S&iacute;', 'P16_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP16_2) . ' No', 'P16_x2', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP16_3) . ' No sabe / No responde', 'P16_x3', array('class' => 'radio-inline')); ?>
                    </div>
                </div>
            </div>
            <div class="bloque col-sm-12">
                III. Registre la informacion según los servicios que el Contribuyente indique haya recibido el servicio
            </div>
            <div class="form-group col-sm-12">
                <?= form_label('17. ¿Cuánto tiempo tuvo que esperar para la atención?:', 'P17', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P17_HOR', 'id' => 'P17_HOR', 'placeholder' => 'HORAS', 'maxlength' => '2', 'value' => $form2->P17_HOR, 'size' => '10', 'class' => "form-control input-sm  text-center")); ?>
                </div>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P17_MIN', 'id' => 'P17_MIN', 'placeholder' => 'MINUTOS', 'maxlength' => '2', 'value' => $form2->P17_MIN, 'size' => '10', 'class' => "form-control input-sm text-center")); ?>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <?= form_label('18. ¿Cuánto tiempo duró la atención?:', 'P18', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P18_HOR', 'id' => 'P18_HOR', 'placeholder' => 'HORAS', 'maxlength' => '2', 'value' => $form2->P18_HOR, 'size' => '10', 'class' => "form-control input-sm  text-center")); ?>
                </div>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P18_MIN', 'id' => 'P18_MIN', 'placeholder' => 'MINUTOS', 'maxlength' => '2', 'value' => $form2->P18_MIN, 'size' => '10', 'class' => "form-control input-sm text-center")); ?>
                </div>
            </div>

            <div class="bloque col-sm-12">
                IV. ASPECTOS ADICIONALES
            </div>

            <div class="form-group col-sm-12">
                <?= form_label('19. ¿En su opinión, diría que es adecuado el lugar donde se encuentra ubicado este CCF en el que le atendieron hoy?', 'P19', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-4">
                    <?php
                    $dataP19_1 = array(
                        'name' => 'P19', 'id' => 'P19', 'value' => 1, 'checked' => ($form2->P19 == '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP19_2 = array(
                        'name' => 'P19', 'id' => 'P19', 'value' => 2, 'checked' => ($form2->P19 == '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP19_1) . ' S&iacute;', 'P19_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP19_2) . ' No', 'P19_x2', array('class' => 'radio-inline')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <?= form_label('20. ¿En su opinión, diría que es accesible / fácil de llegar a este CCF en el que le atendieron hoy?', 'P20', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-4">
                    <?php
                    $dataP20_1 = array(
                        'name' => 'P20', 'id' => 'P20', 'value' => 1, 'checked' => ($form2->P20 == '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP20_2 = array(
                        'name' => 'P20', 'id' => 'P20', 'value' => 2, 'checked' => ($form2->P20 == '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP20_1) . ' S&iacute;', 'P20_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP20_2) . ' No', 'P20_x2', array('class' => 'radio-inline')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <?= form_label('21. ¿Conoce otros CCF con los que cuenta actualmente la SUNAT?', 'P21', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php
                    $dataP21_1 = array(
                        'name' => 'P21', 'id' => 'P21', 'value' => 1, 'checked' => ($form2->P21 == '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP21_2 = array(
                        'name' => 'P21', 'id' => 'P21', 'value' => 2, 'checked' => ($form2->P21 == '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP21_3 = array(
                        'name' => 'P21', 'id' => 'P21', 'value' => 3, 'checked' => ($form2->P21 == '3' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP21_1) . ' S&iacute;', 'P21_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP21_2) . ' No', 'P21_x2', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP21_3) . ' No sabe / No recuerda', 'P21_x3', array('class' => 'radio-inline')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('¿Cuáles?', '', array('class' => 'col-sm-3 control-label')); ?>
                <div id="P21_A" class="col-sm-9">
                    <?php
                    echo form_hidden('P21_AUX', ($form2->P21_AUX) ? $form2->P21_AUX : '');
                    ?>
                    <div class="checkbox">
                        <?= form_input(array('type' => 'text', 'name' => 'P21_1', 'id' => 'P21_1', 'value' => $form2->P21_1, 'readonly' => 'true', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '125', 'class' => "form-control input-sm")); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_input(array('type' => 'text', 'name' => 'P21_2', 'id' => 'P21_2', 'value' => $form2->P21_2, 'readonly' => 'true', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '125', 'class' => "form-control input-sm")); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_input(array('type' => 'text', 'name' => 'P21_3', 'id' => 'P21_3', 'value' => $form2->P21_3, 'readonly' => 'true', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '125', 'class' => "form-control input-sm")); ?>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <?= form_label('22. ¿Estuvo de acuerdo con la ubicación del CCF al que lo citaron?', 'P22', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-4">
                    <?php
                    $dataP22_1 = array(
                        'name' => 'P22', 'id' => 'P22', 'value' => 1, 'checked' => ($form2->P22 == '1' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    $dataP22_2 = array(
                        'name' => 'P22', 'id' => 'P22', 'value' => 2, 'checked' => ($form2->P22 == '2' ? TRUE : FALSE), 'style' => 'margin-right:5px');
                    ?>
                    <div class="col-sm-3">                        
                        <?= form_label(form_radio($dataP22_1) . ' S&iacute;', 'P22_x1', array('class' => 'radio-inline')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_label(form_radio($dataP22_2) . ' No', 'P22_x2', array('class' => 'radio-inline')); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <?= form_label('¿Por qué?', 'P22_A', array('class' => 'col-sm-3 control-label')); ?>
                <div id="P22_A" class="col-sm-9">
                    <?php
                    $dataP22_1 = array('name' => 'P22_1', 'id' => 'P22_1', 'style' => 'margin-right:5px');
                    $dataP22_2 = array('name' => 'P22_2', 'id' => 'P22_2', 'style' => 'margin-right:5px');
                    $dataP22_3 = array('name' => 'P22_3', 'id' => 'P22_3', 'style' => 'margin-right:5px');
                    $dataP22_4 = array('name' => 'P22_4', 'id' => 'P22_4', 'style' => 'margin-right:5px');
                    echo form_hidden('P22_AUX', ($form2->P22_AUX) ? $form2->P22_AUX : '');
                    ?>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP22_1, '1', set_checkbox('P22_1', '1', $form2->P22_1 == '1' ? TRUE : FALSE)) . ' Hay uno más cerca a mi casa', 'P22_1'); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP22_2, '1', set_checkbox('P22_2', '1', $form2->P22_2 == '1' ? TRUE : FALSE)) . ' Esta muy lejos', 'P22_2'); ?>                        
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP22_3, '1', set_checkbox('P22_3', '1', $form2->P22_3 == '1' ? TRUE : FALSE)) . ' Es difícil de llegar', 'P22_3'); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP22_4, '1', set_checkbox('P22_4', '1', $form2->P22_4 == '1' ? TRUE : FALSE)) . ' Otro: ' . form_input(array('type' => 'text', 'name' => 'P22_O', 'id' => 'P22_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '60', 'value' => $form2->P22_O, 'readonly' => 'true', 'size' => '100', 'class' => 'form-control')), 'P22_4'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <?= form_label('23. ¿Qué medio de transporte utilizó para dirigirse a este CCF?', 'P23', array('class' => 'col-sm-3 control-label')); ?>
                <div id="P23" class="col-sm-9">
                    <?php
                    $dataP23_1 = array('name' => 'P23_1', 'id' => 'P23_1', 'style' => 'margin-right:5px');
                    $dataP23_2 = array('name' => 'P23_2', 'id' => 'P23_2', 'style' => 'margin-right:5px');
                    $dataP23_3 = array('name' => 'P23_3', 'id' => 'P23_3', 'style' => 'margin-right:5px');
                    $dataP23_4 = array('name' => 'P23_4', 'id' => 'P23_4', 'style' => 'margin-right:5px');
                    $dataP23_5 = array('name' => 'P23_5', 'id' => 'P23_5', 'style' => 'margin-right:5px');
                    $dataP23_6 = array('name' => 'P23_6', 'id' => 'P23_6', 'style' => 'margin-right:5px');
                    echo form_hidden('P23_AUX', ($form2->P23_AUX) ? $form2->P23_AUX : '');
                    ?>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP23_1, '1', set_checkbox('P23_1', '1', $form2->P23_1 == '1' ? TRUE : FALSE)) . ' Bus público', 'P23_1'); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP23_2, '1', set_checkbox('P23_2', '1', $form2->P23_2 == '1' ? TRUE : FALSE)) . ' Auto propio', 'P21'); ?>                        
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP23_3, '1', set_checkbox('P23_3', '1', $form2->P23_3 == '1' ? TRUE : FALSE)) . ' Taxi', 'P21_1'); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP23_4, '1', set_checkbox('P23_4', '1', $form2->P23_4 == '1' ? TRUE : FALSE)) . ' Colectivo', 'P23_4'); ?>
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP23_5, '1', set_checkbox('P23_5', '1', $form2->P23_5 == '1' ? TRUE : FALSE)) . ' A pie', 'P23_5'); ?>                        
                    </div>
                    <div class="checkbox">
                        <?= form_label(form_checkbox($dataP23_6, '1', set_checkbox('P23_6', '1', $form2->P23_6 == '1' ? TRUE : FALSE)) . ' Otro: ' . form_input(array('type' => 'text', 'name' => 'P23_O', 'id' => 'P23_O', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'maxlength' => '60', 'value' => $form2->P23_O, 'readonly' => 'true', 'size' => '100', 'class' => 'form-control')), 'P23_6'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <?= form_label('24. ¿Cuánto tiempo le tomó llegar al CCF en el que lo atendieron hoy?', 'P24', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P24_HOR', 'id' => 'P24_HOR', 'placeholder' => 'HORAS', 'maxlength' => '2', 'value' => $form2->P24_HOR, 'size' => '10', 'class' => "form-control input-sm text-center")); ?>
                </div>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P24_MIN', 'id' => 'P24_MIN', 'placeholder' => 'MINUTOS', 'maxlength' => '2', 'value' => $form2->P24_MIN, 'size' => '10', 'class' => "form-control input-sm text-center")); ?>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <?= form_label('25. ¿Cuánto gasta para trasladarse (ida y vuelta) hasta el CCF?', 'P25', array('class' => 'col-sm-3 control-label')); ?>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P25_ENT', 'id' => 'P25_ENT', 'placeholder' => 'SOLES', 'maxlength' => '2', 'value' => $form2->P25_ENT, 'size' => '10', 'class' => "form-control input-sm text-center")); ?>
                </div>
                <div class="col-sm-2">
                    <?= form_input(array('type' => 'text', 'name' => 'P25_DEC', 'id' => 'P25_DEC', 'placeholder' => 'CENTIMOS', 'maxlength' => '2', 'value' => $form2->P25_DEC, 'size' => '10', 'class' => "form-control input-sm text-center")); ?>
                </div>
            </div>

            <div class="form-actions col-sm-5 col-sm-offset-5">
                <?= form_button(array('type' => 'submit', 'id' => 'grabar', 'content' => 'Siguiente pagina', 'class' => 'btn btn-primary')); ?>
                <!--?= form_button(array('type' => 'reset', 'id' => 'limpiar', 'content' => 'Limpiar pagina', 'class' => 'btn btn-danger', 'onClick' => 'return P12_1.focus()')); ?>-->
                <?= anchor('encuestaccf/index', 'Cancelar', array('class' => 'btn btn-warning')); ?>
            </div><!--<button class="btn-block btn-danger btn-default btn-group btn-info btn-link btn-navbar btn-primary btn-success btn-toolbar btn-warning"-->
        </fieldset>

        <?= form_close(); ?>
    </div>
</div>