<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
			<b>Usuarios</b> <span>(mantenimiento de registros)</span>
		</h2>
	</div>
	<div class="panel-body">
        <div class="panel-title"><b>Nuevo usuario</b><hr/></div>
        <?= form_open('usuario/insert', array('class'=>'form-horizontal')); ?>
        <?= my_validation_errors(validation_errors()); ?>
        <div class="form-group">
        <?= form_label('Nombres :', 'nombres', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
            <div class="col-xs-4 col-md-4">
        <?= form_input(array('type'=>'text', 'name'=>'nombres', 'id'=>'nombres','class' => 'form-control input-sm', 'value'=>set_value('nombres'),'onkeyup' => 'this.value=this.value.toUpperCase()'));?>
            </div>
        </div>
        <div class="form-group">
        <?= form_label('Apellidos :', 'apellidos', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
            <div class="col-xs-4 col-md-4">
        <?= form_input(array('type'=>'text', 'name'=>'apellidos', 'id'=>'apellidos','class' => 'form-control input-sm', 'value'=>set_value('apellidos'),'onkeyup' => 'this.value=this.value.toUpperCase()'));?>
            </div>
        </div>
        <div class="form-group">
        <?= form_label('Login :', 'login', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
            <div class="col-xs-4 col-md-4">
        <?= form_input(array('type'=>'text', 'name'=>'usuario', 'id'=>'usuario','class' => 'form-control input-sm', 'value'=>set_value('usuario'),'onkeyup' => 'this.value=this.value.toLowerCase()'));?>
            </div>
        </div>
        <div class="form-group">
        <?= form_label('Clave :', 'salt', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
            <div class="col-xs-4 col-md-4">
        <?= form_input(array('type'=>'password', 'name'=>'salt', 'id'=>'salt','class' => 'form-control input-sm', 'value'=>set_value('salt')));?>
            </div>
        </div>
        <div class="form-group">
        <?= form_label('Email :', 'email', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
            <div class="col-xs-4 col-md-4">
        <?= form_input(array('type'=>'email', 'name'=>'email', 'id'=>'email','class' => 'form-control input-sm', 'value'=>set_value('email'),'onkeyup' => 'this.value=this.value.toLowerCase()'));?>
            </div>
        </div>
        <div class="form-group">      
        <?= form_label('Cargo :', 'cargo', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
            <div class="col-xs-4 col-md-4">
        <?= form_dropdown('cargo',$perfiles,5,array('class'=>'form-control input-sm')); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-4 col-md-4 col-xs-offset-2 col-md-offset-2">
            <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
        <?= anchor('usuario/index', 'Cancelar', array('class'=>'btn btn-warning')); ?>
        </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>