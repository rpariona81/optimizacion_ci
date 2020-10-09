<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Modulos de ENEDU
 *
 * @author locador1dnce
 */
class Encuestaccf extends CI_Controller {

    var $usuario;

    function __construct() {
        parent::__construct();
        $this->load->library('table');
        $this->load->library('parser');
        $this->load->library('pagination');
        $this->load->dbutil();
        $this->load->model('Encuestaccf_model');
        date_default_timezone_set('America/Lima');
        $this->load->model('Marco_model');
        $this->usuario = $this->session->userdata('usuario_id');
        $this->perfil = $this->session->userdata('perfil_id');
    }

    public function index() {
        $data = array();
        if ($this->perfil < 6) {
            $data['cuestionarios'] = $this->Encuestaccf_model->listcuest2();
            $data['contenido'] = 'encuestaccf/index_control';
        } else {
            $data['cuestionarios'] = $this->Encuestaccf_model->listcuestusuario($this->usuario);
            $data['contenido'] = 'encuestaccf/index';
        }
        $data['titulo'] = 'ENCUESTA CCF';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function todos() {
        $data = array();
        if ($this->perfil < 6) {
            $data['cuestionarios'] = $this->Encuestaccf_model->listcuest();
            $data['contenido'] = 'encuestaccf/index_control';
        } else {
            redirect('encuestaccf/index');
        }
        $data['titulo'] = 'ENCUESTA CCF';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function validos() {
        $data = array();
        if ($this->perfil < 6) {
            $data['cuestionarios'] = $this->Encuestaccf_model->listcuestactivos();
            $data['contenido'] = 'encuestaccf/index_control';
        } else {
            redirect('encuestaccf/index');
        }
        $data['titulo'] = 'ENCUESTA CCF';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function pendientes() {
        $data = array();
        if ($this->perfil < 6) {
            $data['cuestionarios'] = $this->Encuestaccf_model->listcuestpendientes();
            $data['contenido'] = 'encuestaccf/index_control';
        } else {
            redirect('encuestaccf/index');
        }
        $data['titulo'] = 'ENCUESTA CCF';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function eliminados() {
        $data = array();
        if ($this->perfil < 6) {
            $data['cuestionarios'] = $this->Encuestaccf_model->listcuesteliminados();
            $data['contenido'] = 'encuestaccf/index_control';
        } else {
            redirect('encuestaccf/index');
        }
        $data['titulo'] = 'ENCUESTA CCF';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    /* public function create() {
      $data = array();
      $data['sedes'] = $this->Encuestaccf_model->all();
      $data['contenido'] = 'encuestaccf/create';
      $data['titulo'] = 'ENCUESTA CCF';
      $data['orden'] = 1;
      $this->load->view('layout/main', $data);
      } */

    public function addcuestionario() {
        $data = array();
        $zona = $this->Marco_model->find_digitador($this->usuario)->zona;
        $cuest = $this->Encuestaccf_model->ultcuest($this->usuario)->ncuest;
        if ($cuest == NULL)
            $cuest = 0;
        $this->Encuestaccf_model->addcuest($this->usuario, $zona, $cuest + 1);
        redirect('encuestaccf/index');
    }

    /* public function addcuestionario2() {
      $data = array();
      //$usuario = $this->session->userdata('usuario_id');
      $sede = $this->Marco_model->find_usuario($this->usuario)->sede;
      $codigo_sede = $this->Marco_model->find_usuario($this->usuario)->codigo;
      $zona = $this->Marco_model->find_usuario($this->usuario)->zona;
      $cuest = $this->Encuestaccf_model->ultcuest($this->usuario)->ncuest;
      if ($cuest == NULL)
      $cuest = 0;
      $this->Encuestaccf_model->addcuest($sede, $codigo_sede, $this->usuario, $zona, $cuest + 1);
      redirect('encuestaccf/index');
      } */

    public function irpagina1($id = NULL) {
        $data = array();
        $data['titulo'] = 'ENCUESTA CCF';
        $data['form1'] = $this->Encuestaccf_model->findpage1($id);
        //$zona = $this->Marco_model->find_digitador($this->usuario)->zona;
        $zona = $data['form1']->ZONA_SUNAT;
        //$data['sedes'] = $this->Marco_model->find_digitador_csc($this->usuario);
        $data['sedes'] = $this->Marco_model->find_sedes_ccf($zona);
        $data['distritos'] = $this->Marco_model->find_poblacion_ccf();
        $data['contenido'] = 'encuestaccf/page1';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    /* public function irpagina1_enc($id = NULL) {
      $data = array();
      $data['titulo'] = 'Encuesta CSC';
      $data['form1'] = $this->Encuestaccf_model->findpage1($id);
      $data['contenido'] = 'encuestaccf/page1';
      $data['orden'] = 1;
      $this->load->view('layout/main', $data);
      } */

    public function registrapag1() {
        $registro = $this->input->post();
        $registro['P1'] = $this->Encuestaccf_model->getdistrito($registro['P1_UBIGEO'])->dist;
        $registro['usuact'] = $this->usuario;
        if ($registro['P6'] == 2)
            $registro['P9'] = NULL;
        $this->form_validation->set_rules('USUARIO_NOMBRES', 'Nombres', 'required|alpha_dash_space');
        $this->form_validation->set_rules('USUARIO_APELLIDOS', 'Apellidos', 'required|alpha_dash_space');
        $this->form_validation->set_rules('P1_UBIGEO', 'Distrito', 'required');
        $this->form_validation->set_rules('P3', 'Edad', 'min_length[2]|max_length[2]|numeric|greater_than_equal_to[15]');
        $this->form_validation->set_rules('P4', 'RUC', 'required|min_length[11]|max_length[11]|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->irpagina1($registro['ID']);
        } else {
            $this->Encuestaccf_model->insertpag1($registro);
            redirect('encuestaccf/irpagina2/' . $registro['ID']);
        }
    }

    public function irpagina2($id = NULL) {
        $data = array();
        $data['titulo'] = 'ENCUESTA CCF';
        $data['form2'] = $this->Encuestaccf_model->findpage2($id);
        $data['contenido'] = 'encuestaccf/page2';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function registrapag2() {
        $registro = $this->input->post();
        $registro['usuact'] = $this->usuario;
        if (!isset($registro['P13_1']))
            $registro['P13_1'] = 0;
        if (!isset($registro['P13_2']))
            $registro['P13_2'] = 0;
        if (!isset($registro['P13_3']))
            $registro['P13_3'] = 0;
        if (!isset($registro['P13_4']))
            $registro['P13_4'] = 0;
        if (!isset($registro['P15_1']))
            $registro['P15_1'] = NULL;
        if (!isset($registro['P15_2']))
            $registro['P15_2'] = NULL;
        if (!isset($registro['P15_3']))
            $registro['P15_3'] = NULL;
        if (!isset($registro['P15_4']))
            $registro['P15_4'] = NULL;
        if (!isset($registro['P15_5']))
            $registro['P15_5'] = NULL;
        if (!isset($registro['P22_AUX']))
            $registro['P22_AUX'] = NULL;
        if (!isset($registro['P22_1']))
            $registro['P22_1'] = 0;
        if (!isset($registro['P22_2']))
            $registro['P22_2'] = 0;
        if (!isset($registro['P22_3']))
            $registro['P22_3'] = 0;
        if (!isset($registro['P23_1']))
            $registro['P23_1'] = 0;
        if (!isset($registro['P23_2']))
            $registro['P23_2'] = 0;
        if (!isset($registro['P23_3']))
            $registro['P23_3'] = 0;
        if (!isset($registro['P23_4']))
            $registro['P23_4'] = 0;
        if (!isset($registro['P23_5']))
            $registro['P23_5'] = 0;
        if (!isset($registro['P23_6']))
            $registro['P23_6'] = 0;
        $this->form_validation->set_rules('P10', 'Que razones le indicaron', 'required');
        $this->form_validation->set_rules('P21', 'Otros CCF que conozca', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->irpagina2($registro['ID']);
        } else {
            $this->Encuestaccf_model->insertpag2($registro);
            redirect('encuestaccf/irpagina3/' . $registro['ID']);
        }
    }

    public function irpagina3($id = NULL) {
        $data = array();
        $data['titulo'] = 'ENCUESTA CCF';
        $data['form3'] = $this->Encuestaccf_model->findpage3($id);
        $data['contenido'] = 'encuestaccf/page3';
        $data['orden'] = 1;
        $this->load->view('layout/main', $data);
    }

    public function registrapag3() {
        $registro = $this->input->post();
        $registro['usuact'] = $this->usuario;
        $this->form_validation->set_rules('V_01_1', 'Pregunta inicial de esta página', 'required');
        $this->form_validation->set_rules('V_09', 'Nivel de satifaccion en general', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->irpagina3($registro['ID']);
        } else {
            $this->Encuestaccf_model->insertpag3($registro);
            redirect('encuestaccf/index');
        }
    }

    public function borrar($id = NULL) {
        $this->Encuestaccf_model->delete($id);
        redirect('encuestaccf/index');
    }

    public function activar($id = NULL) {
        $this->Encuestaccf_model->enable($id);
        redirect('encuestaccf/index');
    }

    public function ver_carga($id = NULL) {
        $this->Encuestaccf_model->carga_usuario();
        redirect('encuestaccf/index');
    }

    public function exporta_ccf_usu_ext_norte2() {
        $delimiter = ",";
        $newline = "\r\n";
        $query = $this->db->query("SELECT * FROM CCF_USU_EXT_LIMA_NORTE2");
        header('Content-type: application/csv');
        header('Content-Disposition: attachment;filename=CCF_USU_EXT_LIMA_NORTE2.csv');
        echo $this->dbutil->csv_from_result($query, $delimiter, $newline);
    }

}
