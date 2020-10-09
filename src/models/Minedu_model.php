<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Minedu_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->usuario = strtoupper($this->session->usuario_datos);
    }

    public function all() {
        //return $this->orm->padron_ie_publica_un();
        $this->db->where('VISIBLE', 1);
        $this->db->order_by("REGION", "asc"); 
        $this->db->order_by("D_PROV", "asc"); 
        $this->db->order_by("D_DIST", "asc"); 
        $this->db->order_by("CEN_EDU", "asc"); 
        $query = $this->db->get('padron_iestp');
        return $query->result();
    }
    
    public function find($value) {
        $this->db->where('VISIBLE', 1);
        $this->db->where('COD_MOD', substr($value,1,7));
        $this->db->where('CEN_EDU', substr($value,6,1));
        $this->db->from('padron_iestp');
        $query = $this->db->get();
        return $query->result();
    }
}
