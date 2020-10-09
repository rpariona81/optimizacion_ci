<div class="row-fluid">
    <h1>Sistema de ingreso de datos para encuestas</h1>
    <hr>
    <p>Versión 1.0 - Desarrollado en PHP CodeIgniter</p>
    <p>Formularios web para Proyectos de Encuestas.</p>
    <?php 
    if($this->session->usuario){
        echo 'Bienvenido(a)';
    }else{
        echo anchor('home/ingreso', 'Ingresar', array('class' => "btn btn-primary"));
    };
    ?>
</div>
