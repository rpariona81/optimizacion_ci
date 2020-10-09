<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Modulos de ENEDU
 *
 * @author locador1dnce
 */
class FichaCBC extends CI_Controller {

    var $usuario;

    function __construct() {
        parent::__construct();
        $this->load->library('table');
        $this->load->library('parser');
        $this->load->library('pagination');
        $this->load->dbutil();
        $this->load->model('FichaCBC_model');
        date_default_timezone_set('America/Lima');
        $this->load->model('Marco_model');
        $this->usuario = $this->session->userdata('usuario_id');
        $this->perfil = $this->session->userdata('perfil_id');
    }

    public function index() {
        $data = array();
        $data['query'] = $this->FichaCBC_model->listPortada();
        $data['contenido'] = 'fichacbc/index';
        $data['titulo'] = 'Fichas procesadas';
        $i = 0;
		foreach( $data['query'] as &$row) {
			$i++;
			if($row->id > 0)
			{ 
    			$row->row_number = str_pad($i, 3, "0", STR_PAD_LEFT);
			}
		}
        $this->load->view('layout/main', $data);
    }

    public function portadas() {
        $data = array();
        $data['cuestionarios'] = $this->FichaCBC_model->listPortada();
        $data['contenido'] = 'fichacbc/portada';
        $data['titulo'] = 'PORTADAS';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function validos() {
        $data = array();
        if ($this->perfil < 6) {
            $data['cuestionarios'] = $this->Usupotenciales_model->listcuestactivos();
            $data['contenido'] = 'fichacbc/index_control';
        } else {
            redirect('usupotenciales/index');
        }
        $data['titulo'] = 'ENC. A USUARIOS POTENCIALES';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function pendientes() {
        $data = array();
        if ($this->perfil < 6) {
            $data['cuestionarios'] = $this->Usupotenciales_model->listcuestpendientes();
            $data['contenido'] = 'fichacbc/index_control';
        } else {
            redirect('usupotenciales/index');
        }
        $data['titulo'] = 'ENC. A USUARIOS POTENCIALES';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function eliminados() {
        $data = array();
        if ($this->perfil < 6) {
            $data['cuestionarios'] = $this->Usupotenciales_model->listcuesteliminados();
            $data['contenido'] = 'fichacbc/index_control';
        } else {
            redirect('usupotenciales/index');
        }
        $data['titulo'] = 'ENC. A USUARIOS POTENCIALES';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function create() {
        $data = array();
        $data['sedes'] = $this->Usupotenciales_model->all();
        $data['contenido'] = 'fichacbc/create';
        $data['titulo'] = 'ENC. A USUARIOS POTENCIALES';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function addcuestionario() {
        $data = array();
        //$usuario = $this->session->userdata('usuario_id');
        $zona = $this->Marco_model->find_digitador($this->usuario)->zona;
        $cuest = $this->Usupotenciales_model->ultcuest($this->usuario)->ncuest;
        if ($cuest == NULL)
            $cuest = 0;
        $this->Usupotenciales_model->addcuest($this->usuario, $zona, $cuest + 1);
        redirect('usupotenciales/index');
    }

    public function ircuestionario($id = NULL) {
        $data = array();
        $data['titulo'] = 'ENC. A USUARIOS POTENCIALES';
        $data['form1'] = $this->Usupotenciales_model->find_cuest($id);
        //$zona = $this->Marco_model->find_digitador($this->usuario)->zona;
        $zona = $data['form1']->ZONA_SUNAT;
        //$data['sedes'] = $this->Marco_model->find_digitador_csc($this->usuario);
        $data['sedes'] = $this->Marco_model->find_sedes_csc($zona);
        $data['distritos'] = $this->Marco_model->find_poblacion_csc($zona);
        $data['conglomerados'] = $this->Marco_model->sin_conglomerado($zona);
        $data['contenido'] = 'fichacbc/cuest';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }
    
    public function getCboConglomerados() {
        $ubigeo = $this->input->post('UBIGEO', TRUE);
        $data['conglomerados'] = $this->Marco_model->find_conglomerado($ubigeo);
        $output = null;
        foreach ($data['conglomerados'] as $row => $value) {
            //here we build a dropdown item line for each query result  
            $output .= "<option value='" . $row . "'>" . $value . "</option>";
        }
        echo $output;
    }


    public function irpagina1_enc($id = NULL) {
        $data = array();
        $data['titulo'] = 'ENC. A USUARIOS POTENCIALES';
        $data['form1'] = $this->Usupotenciales_model->findpage1($id);
        $data['contenido'] = 'fichacbc/cuest';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function registracuest() {
        $registro = $this->input->post();
        //$registro['P1'] = $this->Usupotenciales_model->getdistrito($registro['P1_UBIGEO'])->dist;
        $registro['usuact'] = $this->usuario;
        $this->form_validation->set_rules('NOMBRES', 'Nombres', 'required|alpha_dash_space');
        $this->form_validation->set_rules('APELLIDOS', 'Apellidos', 'required|alpha_dash_space');
        $this->form_validation->set_rules('P1', 'Total de hogares', 'required');
        $this->form_validation->set_rules('P4', 'Edad', 'min_length[2]|max_length[2]|numeric|greater_than_equal_to[15]');
        if ($this->form_validation->run() == FALSE) {
            $this->irpagina1($registro['ID']);
        } else {
            $this->Usupotenciales_model->insertpag1($registro);
            redirect('usupotenciales/index/');
        }
    }

    public function borrar($id = NULL) {
        $this->Usupotenciales_model->delete($id);
        redirect('usupotenciales/index');
    }
    
    public function activar($id = NULL) {
        $this->Usupotenciales_model->enable($id);
        redirect('usupotenciales/index');
    }
    
    public function ver_carga($id = NULL) {
        $this->Usupotenciales_model->carga_usuario();
        redirect('usupotenciales/index');
    }
    
    public function exporta_csc_usu_ext_norte2() {
        $delimiter = ",";
        $newline = "\r\n";
        $query = $this->db->query("SELECT * FROM CSC_USU_EXT_LIMA_NORTE2");
        header('Content-type: application/csv');
        header('Content-Disposition: attachment;filename=CSC_USU_EXT_LIMA_NORTE2.csv');
        echo $this->dbutil->csv_from_result($query, $delimiter, $newline);
    }

}
