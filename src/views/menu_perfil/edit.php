<div class="panel panel-default">
  <div class="panel-heading">
	  <h2 class="panel-title">
		<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
		<b>Accesos</b> <span>(permisos de men&uacute; seg&uacute;n perfil)</span>
		</h2>
  </div>
	<div class="panel-body">
    <div class="panel-title"><b>Actualización de menú</b><hr/></div>
    <?= form_open('menu_perfil/update', array('class'=>'form-horizontal')); ?>
    <?= my_validation_errors(validation_errors()); ?>
    <?= form_hidden('id',$registro->id); ?>
      <div class="form-group">
      <?= form_label('Men&uacute; :', 'menu_id', array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-4"> 
        <?= form_dropdown('menu_id',$menus,$registro->menu_id,array('class'=>'form-control input-sm')); ?>
        </div>
      </div>
      <div class="form-group">
        <?= form_label('Perfil :', 'cargo_id', array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-4"> 
        <?= form_dropdown('perfil_id',$perfiles,$registro->perfil_id,array('class'=>'form-control input-sm')); ?>
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
        <?= anchor('menu_perfil/index', 'Cancelar', array('class'=>'btn btn-warning')); ?>
        <?= anchor('menu_perfil/delete/'.$registro->id, 'Eliminar', array('class'=>'btn btn-danger','onClick'=>"return confirm('Esta seguro');")); ?>
        </div>
      </div>
    <?= form_close(); ?>
  </div>
</div>