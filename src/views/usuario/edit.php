<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
			<b>Usuarios</b> <span>(mantenimiento de registros)</span>
		</h2>
	</div>
	<div class="panel-body">
        <div class="panel-title"><b>Actualización de usuario</b><hr/></div>
            <?= form_open('usuario/update', array('class' => 'form-horizontal')) ?>
            <?= my_validation_errors(validation_errors()) ?>
            <div class="form-group">
                <?= form_hidden('id', $registro->id); ?>
            </div>
            <div class="form-group">
        <?= form_label('Nombres :', 'nombres', array('class'=>'col-md-2 control-label')); ?>
            <div class="col-md-4">
        <?= form_input(array('type'=>'text', 'name'=>'nombres', 'id'=>'nombres','class' => 'form-control input-sm', 'value'=>$registro->nombres,'onkeyup' => 'this.value=this.value.toUpperCase()'));?>
            </div>
        </div>
        <div class="form-group">
        <?= form_label('Apellidos :', 'apellidos', array('class'=>'col-md-2 control-label')); ?>
            <div class="col-md-4">
        <?= form_input(array('type'=>'text', 'name'=>'apellidos', 'id'=>'apellidos','class' => 'form-control input-sm', 'value'=>$registro->apellidos,'onkeyup' => 'this.value=this.value.toUpperCase()'));?>
            </div>
        </div>
        <div class="form-group">
        <?= form_label('Login :', 'login', array('class'=>'col-md-2 control-label')); ?>
            <div class="col-md-4">
        <?= form_input(array('type'=>'text', 'name'=>'usuario', 'id'=>'usuario','class' => 'form-control input-sm', 'value'=>$registro->usuario,'onkeyup' => 'this.value=this.value.toLowerCase()'));?>
            </div>
        </div>
            <div class="form-group">
        <?= form_label('Email :', 'email', array('class'=>'col-md-2 control-label')); ?>
            <div class="col-md-4">
        <?= form_input(array('type'=>'email', 'name'=>'email', 'id'=>'email','class' => 'form-control input-sm', 'value'=>$registro->email));?>
            </div>
        </div>
        <div class="form-group">      
        <?= form_label('Cargo :', 'cargo', array('class'=>'col-md-2 control-label')); ?>
            <div class="col-md-4">
        <?= form_dropdown('cargo',$perfiles,$registro->cargo,array('class'=>'form-control input-sm')); ?>
            </div>
        </div>
            <div class="form-group">
                <?= form_label('Creado: ', 'created_at', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-4">
                <p class="form-control-static"><?= date("d-m-Y - H:i:s",strtotime($registro->created_at)) ?></p>
                </div>
            </div>
            <?= form_hidden('updated_at', $registro->updated_at); ?>
            <div class="form-group">
                <div class="col-md-4 col-xs-offset-2 col-md-offset-2">
                <?= form_button(array('type' => 'submit', 'content' => 'Aceptar', 'class' => 'btn btn-primary')); ?>
                <?= anchor('usuario/index', 'Cancelar', array('class' => 'btn btn-warning')); ?>
                <?= anchor('usuario/delete/' . $registro->id, 'Eliminar', array('class' => 'btn btn-danger', 'onClick' => "return confirm('Esta seguro');")); ?>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>