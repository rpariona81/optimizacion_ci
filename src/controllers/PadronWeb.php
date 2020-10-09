<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PadronWeb extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('Minedu_model');
		date_default_timezone_set('America/Lima');
        $this->usuario = strtoupper($this->session->usuario_datos);
    }
    
	public function index() {
        $data['contenido'] = 'padronweb/index';
		$data['titulo'] = 'Padron Minedu';
		$data['query'] = $this->Minedu_model->all();
		$i = 0;
		foreach( $data['query'] as &$row) {
			$i++;
			if($row->ID > 0)
			{ 
    			$row->row_number = str_pad($i, 3, "0", STR_PAD_LEFT);
			}
		}
        $this->load->view('layout/main', $data);
	}

	public function filtra($value) {
        $data['contenido'] = 'padronweb/detalle';
		$data['titulo'] = 'Padron Minedu';
		$data['iepublica'] = 'Registro histórico de la IE con código modular '.substr($value,1,7).'- anexo '.substr($value,8,1);
		$data['query'] = $this->Minedu_model->find($value);
		$this->load->view('layout/main', $data);
	}
    
    public function carga() {
        $data['query'] = $this->Minedu_model->all();
		$i = 0;		
		foreach($data['query'] as $row) {
			$i++;
			if($row->anexo >= 0)
			{ 
				$row->cod_mod_anex = "".anchor_popup('minedu/filtra/X'.$row->cod_mod.$row->anexo,"Ver detalle")."";
			}
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data['query']));
    }

}
