<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
			<b>Perfiles</b> <span>(definición de cargos)</small>
		</h2>
    </div>
	<div class="panel-body">
        <div class="panel-title"><b>Nuevo perfil</b><hr/>
        </div>
        <?= form_open('perfil/insert', array('class'=>'form-horizontal')); ?>
        <?= my_validation_errors(validation_errors()); ?>
        <div class="form-group">
        <?= form_label('Nombre :', 'name', array('class'=>'col-xs-2 col-md-2 control-label')); ?>
            <div class="col-xs-4 col-md-4"> 
            <?= form_input(array('type'=>'text', 'name'=>'cargo', 'id'=>'cargo','class'=>'form-control input-sm', 'value'=>set_value('cargo'),'onkeyup' => 'this.value=this.value.toUpperCase()'));?>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-xs-4 col-md-4 col-xs-offset-2 col-md-offset-2">
            <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
            <?= anchor('perfil/index', 'Cancelar', array('class'=>'btn btn-warning')); ?>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>