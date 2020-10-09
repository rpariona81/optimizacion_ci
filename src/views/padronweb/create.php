<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
			<b>Contratos</b> <span>(registro y actualizaci&oacute;n)</span>
		</h2>
	</div>
	<div class="panel-body">
        <div class="panel-title"><b>Asignar contrato</b><hr/>
        </div>
        <?= form_open('contrato/insert', array('class'=>'form-horizontal')); ?>
        <?= my_validation_errors(validation_errors()); ?>
        <div class="form-group">
            <?= form_label('Proyecto:', 'proyecto', array('class'=>'col-md-2 control-label')); ?>
            <div class="col-md-8"> 
            <?= form_dropdown('proyecto_id',$proyectos,0,array('class'=>'form-control input-sm')); ?>
            </div>
        </div>
        <div class="form-group">
            <?= form_label('Personal :', 'personal_id', array('class'=>'col-md-2 control-label')); ?>
            <div class="col-md-8"> 
            <?= form_dropdown('personal_id',$personal,0,array('class'=>'form-control input-sm')); ?>
            </div>
        </div>
        <div class="form-group">
        <?= form_label('Cargo :', 'cargo_id', array('class'=>'col-md-2 control-label')); ?>
            <div class="col-md-8"> 
            <?= form_dropdown('cargo_id',$cargos,0,array('class'=>'form-control input-sm')); ?>
            </div>
        </div>
        <div class="form-group">
            <?= form_label('Fecha de inicio :', 'inicio_contrato', array('class'=>'col-md-2 control-label')); ?>
            <div class="col-md-4">
            <?= form_input(array('type'=>'date', 'name'=>'inicio_contrato', 'id'=>'inicio_contrato','class' => 'form-control input-sm', 'value'=>set_value('inicio_contrato')));?>
            </div>
        </div>
        <div class="form-group">
            <?= form_label('Fecha de fin :', 'fin_contrato', array('class'=>'col-md-2 control-label')); ?>
            <div class="col-md-4">
            <?= form_input(array('type'=>'date', 'name'=>'fin_contrato', 'id'=>'fin_contrato','class' => 'form-control input-sm', 'value'=>set_value('fin_contrato')));?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4 col-xs-offset-2 col-md-offset-2">
            <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
            <?= anchor('contrato/index', 'Cancelar', array('class'=>'btn')); ?>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>