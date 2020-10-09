<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Marco_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function listsedes() {
        $query = $this->db->get('sedes_sunat');
        return $query->result();
    }
    
    public function all() {
        $query = $this->db->get('marco_usuarios');
        return $query->result();
    }

    public function all_filter($field, $value) {
        $this->db->like($field, $value);
        $query = $this->db->get('marco_usuarios');
        return $query->result();
    }

    public function find($id) {
        $this->db->where('id', $id);
        return $this->db->get('marco_usuarios')->row();
    }

    public function find_usuario($usuario_id) {
        $this->db->where('usuario_id', $usuario_id);
        return $this->db->get('marco_usuarios')->row();
    }

    public function find_digitador($usuario_id) {
        $this->db->where('usuario_id', $usuario_id);
        return $this->db->get('marco_digitacion')->row();
    }

    public function find_digitador_csc($usuario_id) {
        $this->db->where('usuario_id', $usuario_id);
        $this->db->like('proyecto', 'CSC');
        $query = $this->db->get('marco_digitacion');
        $sedes = array();
        foreach ($query->result() as $item) {
            $sedes[$item->codigo] = utf8_decode($item->sede);
        }
        return $sedes;
    }

    public function find_sedes_csc($zona) {
        $this->db->where('zona', $zona);
        $this->db->like('proyecto', 'CSC');
        $query = $this->db->get('marco_digitacion');
        $sedes = array();
        foreach ($query->result() as $item) {
            $sedes[$item->codigo] = utf8_decode($item->sede);
        }
        return $sedes;
    }

    public function find_sedes_ccf($zona) {
        $this->db->where('zona', $zona);
        $this->db->like('proyecto', 'CCF');
        $query = $this->db->get('marco_digitacion');
        $sedes = array();
        foreach ($query->result() as $item) {
            $sedes[$item->codigo] = utf8_decode($item->sede);
        }
        return $sedes;
    }
    
    public function find_poblacion_csc($zona) {
        $this->db->where('zona', $zona);
        $this->db->order_by('ubigeo', 'desc');
        $query = $this->db->get('t_marco_poblacion');
        $distritos = array();
        foreach ($query->result() as $item) {
            $distritos[$item->ubigeo] = utf8_decode($item->dist);
        }
        return $distritos;
    }
    
    public function find_poblacion_ccf() {
        $this->db->like('ubigeo', '1501','after');
        $this->db->or_like('ubigeo', '0701','after');
        $this->db->order_by('ubigeo', 'asc');
        $query = $this->db->get('t_ubigeo');
        $distritos = array();
        foreach ($query->result() as $item) {
            $distritos[$item->ubigeo] = utf8_decode($item->dist);
        }
        return $distritos;
    }
    
    public function find_conglomerado($ubigeo) {
        $this->db->where('ubigeo', $ubigeo);
        $this->db->order_by('zonas', 'desc');
        $query = $this->db->get('t_marco_viv');
        $conglomerados = array();
        foreach ($query->result() as $item) {
            $conglomerados[$item->nconglome1] = utf8_decode($item->nconglome1);
        }
        return $conglomerados;
    }
    
    public function sin_conglomerado($zona) {
        $this->db->where('ZONA_SUNAT', $zona);
        $this->db->order_by('zonas', 'desc');
        $query = $this->db->get('t_marco_viv');
        $conglomerados = array();
        $conglomerados[99999] = 99999;
        foreach ($query->result() as $item) {
            $conglomerados[$item->nconglome1] = utf8_decode($item->nconglome1);
        }
        return $conglomerados;
    }
}
