<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_model extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->perfil_id=$this->session->perfil_id;
  }

  public function all() {
    //$this->db->where('id >=', $this->perfil_id);
    $query = $this->db->get('perfiles');
    return $query->result();
  }

  public function all_by_name($value) {
    //$this->db->where('id >', $this->perfil_id);
    $this->db->like('cargo', $value); 
    $query = $this->db->get('perfiles');
    return $query->result();
  }

  public function all_filter($field,$value) {
    //$this->db->where('id >', $this->perfil_id);
    $this->db->like($field, $value); 
    $query = $this->db->get('perfiles');
    return $query->result();
  }

  public function find($id) {
    //$this->db->where('id >', $this->perfil_id);
    $this->db->where('id', $id);
    return $this->db->get('perfiles')->row();
  }

  public function insert($registro) {
    $this->db->set($registro);
    $this->db->insert('perfiles');
  }

  public function update($registro) {
    $this->db->set($registro);
    $this->db->where('id', $registro['id']);
    $this->db->update('perfiles');
  }

  public function delete($id) {
    $this->db->where('id', $id);
    $this->db->set('estado',0);
    $this->db->update('perfiles');
  }

}