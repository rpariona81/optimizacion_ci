<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
			<b>Opciones de Menú</b> <span>mantenimiento de menús</span>
		</h2>
	</div>
	<div class="panel-body">
        <div class="panel-title"><b>Nuevo menú</b><hr/>
        </div>
        <?= form_open('menu/insert', array('class'=>'form-horizontal')); ?>
            <?= my_validation_errors(validation_errors()); ?>
            <div class="form-group">
            <?= form_label('Nombre :', 'menu', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
                <div class="col-xs-4 col-md-4"> 
                <?= form_input(array('type'=>'text', 'name'=>'menu', 'id'=>'menu','class' => 'form-control input-sm', 'value'=>set_value('menu')));?>
                </div>
            </div>
            <div class="form-group">
            <?= form_label('Controlador :', 'controlador', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
                <div class="col-xs-4 col-md-4">
                <?= form_input(array('type'=>'text', 'name'=>'controlador', 'id'=>'controlador','class' => 'form-control input-sm', 'value'=>set_value('controlador'),'onkeyup' => 'this.value=this.value.toLowerCase()'));?>
                </div>
            </div>
            <div class="form-group">
            <?= form_label('Acci&oacuten :', 'accion', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
                <div class="col-xs-4 col-md-4">
                <?= form_input(array('type'=>'text', 'name'=>'accion', 'id'=>'accion', 'class' => 'form-control input-sm','value'=>set_value('accion'),'onkeyup' => 'this.value=this.value.toLowerCase()'));?>
                </div>
            </div>
            <div class="form-group">
            <?= form_label('URL :', 'url', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
                <div class="col-xs-4 col-md-4">
                <?= form_input(array('type'=>'text', 'name'=>'url', 'id'=>'url','class' => 'form-control input-sm', 'value'=>set_value('url'),'onkeyup' => 'this.value=this.value.toLowerCase()'));?>
                </div>
            </div>
            <div class="form-group">
            <?= form_label('Orden :', 'orden', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
                <div class="col-xs-4 col-md-4">
                <?= form_input(array('type'=>'number', 'name'=>'orden', 'id'=>'orden','class' => 'form-control input-sm', 'value'=>set_value('orden'))); ?>
                </div>
            </div>
            <div class="form-group">
            <?= form_label('Icono :', 'icono', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
                <div class="col-xs-4 col-md-4">
                    <div class="input-group">
                        <div class="input-sm input-group-addon">
                            <div id="view-fa">Icono</div>
                        </div>
                        <?= form_dropdown('icono',$iconos,0,array('id'=>'icons-li','class'=>'form-control input-sm col-xs-10 col-md-10')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-4 col-md-4 col-xs-offset-2 col-md-offset-2">
                <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
                <?= anchor('menu/index', 'Cancelar', array('class'=>'btn btn-warning')); ?>
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>
<script>
  $(document).ready(function(){
    /* Detect any change of option*/
  	$("#icons-li").change(function(){
  		var icono = $(this).val();
  		//$("#view-fa").html('<i class="' + icono + '"></i>');
        $("#view-fa").html(icono);
  	});
    /* simulate an change on select */
  	$("#icons-li").change();
  });
</script>