<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
			<b>Accesos</b> <span>(permisos de men&uacute; seg&uacute;n perfil)</span>
		</h2>
	</div>
	<div class="panel-body">
        <div class="panel-title"><b>Asignar permiso</b><hr/>
        </div>
        <?= form_open('menu_perfil/insert', array('class'=>'form-horizontal')); ?>
        <?= my_validation_errors(validation_errors()); ?>
        <div class="form-group">
        <?= form_label('Men&uacute; :', 'menu_id', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
            <div class="col-xs-4 col-md-4"> 
            <?= form_dropdown('menu_id',$menus,0,array('class'=>'form-control input-sm')); ?>
            </div>
        </div>
        <div class="form-group">
        <?= form_label('Perfil :', 'perfil_id', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
            <div class="col-xs-4 col-md-4"> 
            <?= form_dropdown('perfil_id',$perfiles,0,array('class'=>'form-control input-sm')); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-4 col-md-4 col-xs-offset-2 col-md-offset-2">
            <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
            <?= anchor('menu_perfil/index', 'Cancelar', array('class'=>'btn')); ?>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>