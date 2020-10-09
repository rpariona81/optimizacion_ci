<div class="panel panel-default">
  <div class="panel-heading">
	  <h2 class="panel-title">
		<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
		<b>Opciones de Menú</b> <span>mantenimiento de menús</span>
		</h2>
	</div>
	<div class="panel-body">
    <div class="panel-title"><b>Actualización de menú</b><hr/>
    </div>
    <?= form_open('menu/update', array('class'=>'form-horizontal')); ?>
      <?= my_validation_errors(validation_errors()); ?>
      <?= form_hidden('id',$registro->id); ?>
      <div class="form-group">
      <?= form_label('Menu: ','menu', array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-4"> 
        <?= form_input(array('type'=>'text', 'name'=>'menu', 'id'=>'menu', 'class' => 'form-control input-sm', 'value'=>$registro->menu));?>
        </div>
      </div>
      <div class="form-group">
      <?= form_label('Controlador :', 'controlador', array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-4"> 
        <?= form_input(array('type'=>'text', 'name'=>'controlador', 'id'=>'controlador', 'class' => 'form-control input-sm', 'value'=>$registro->controlador,'onkeyup' => 'this.value=this.value.toLowerCase()'));?>
        </div>
      </div>
      <div class="form-group">
      <?= form_label('Acci&oacute;n :', 'accion', array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-4"> 
        <?= form_input(array('type'=>'text', 'name'=>'accion', 'id'=>'accion', 'value'=>$registro->accion, 'class' => 'form-control input-sm', 'onkeyup' => 'this.value=this.value.toLowerCase()'));?>
        </div>
      </div>
      <div class="form-group">
      <?= form_label('URL :', 'url', array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-4"> 
        <?= form_input(array('type'=>'text', 'name'=>'url', 'id'=>'url', 'value'=>$registro->url, 'class' => 'form-control input-sm', 'onkeyup' => 'this.value=this.value.toLowerCase()'));?>
        </div>
      </div>
      <div class="form-group">
      <?= form_label('Orden :', 'orden', array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-4"> 
        <?= form_input(array('type'=>'number', 'name'=>'orden', 'id'=>'orden', 'class' => 'form-control input-sm', 'value'=>$registro->orden));?>
        </div>
      </div>
      <div class="form-group">
            <?= form_label('Icono :', 'icono', array('class'=>'col-md-2 control-label')); ?>
                <div class="col-md-4">
                    <div class="input-group">
                        <div class="input-sm input-group-addon">
                            <div id="view-fa"><?=$registro->icono?></div>
                        </div>
                        <?= form_dropdown('icono',$iconos,$registro->icono,array('id'=>'icons-li','class'=>'form-control input-sm')); ?>
                    </div>
                </div>
            </div>
      <div class="form-group">
        <?= form_label('Creado: ', 'created_at', array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-4"> 
          <p class="form-control-static"><?= date("d-m-Y - H:i:s",strtotime($registro->created_at)) ?></p>
        </div>
      </div>
      <?= form_hidden('updated_at',$registro->updated_at); ?>
      <div class="form-group">
        <div class="col-md-4 col-md-offset-2"> 
        <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
        <?= anchor('menu/index', 'Cancelar', array('class'=>'btn')); ?>
        <?= anchor('menu/delete/'.$registro->id, 'Eliminar', array('class'=>'btn btn-warning','onClick'=>"return confirm('Esta seguro');")); ?>
        </div>
      </div>
    <?= form_close(); ?>
  </div>
</div>
<script>
  $(document).ready(function(){
    /* Detect any change of option*/
    //alert('hola mundo');
  	$("#icons-li").change(function(){
  		var icono = $(this).val();
  		//$("#view-fa").html('<i class="' + icono + '"></i>');
        $("#view-fa").html(icono);
  	});
  });
</script>