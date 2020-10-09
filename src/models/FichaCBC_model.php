<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of FichaCBC_model
 * Ronald Pariona
 */
class FichaCBC_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listPortada() {
        $query = $this->db->get('v_portadas');
        return $query->result();
    }

    public function listcuest2() {
        $this->db->where('ACTIVO', 1);
        $this->db->where('ESTADO !=', 'ELIMINADO');
        $query = $this->db->get('cuest_viv_todos');
        return $query->result();
    }
    
    public function listcuestusuario($usuario) {
        $this->db->where('usucre', $usuario);
        $query = $this->db->get('cuest_viv_usuario');
        return $query->result();
    }
    
    public function listcuestactivos() {
        $this->db->where('ACTIVO', 1);
        $this->db->where('ESTADO', 'PROCESADO');
        $query = $this->db->get('cuest_viv_todos');
        return $query->result();
    }
    
    public function listcuesteliminados() {
        $this->db->where('ACTIVO', 0);
        $query = $this->db->get('cuest_viv_todos');
        return $query->result();
    }
    
    public function listcuestpendientes() {
        $this->db->where('ACTIVO', 1);
        $this->db->where('ESTADO', 'PENDIENTE');
        $query = $this->db->get('cuest_viv_todos');
        return $query->result();
    }
    
    public function getdistrito($ubigeo) {
        $this->db->select('dist');
        $this->db->where('ubigeo', $ubigeo);
        return $this->db->get('t_ubigeo')->row();
    }

    public function insertpag1($registro) {
        $registro['updated_at'] = date('Y-m-d H:i');
        $this->db->set($registro);
        $this->db->where('ID', $registro['ID']);
        $this->db->update('t_contpotenciales', $registro);
    }

    public function addcuest( $usuario, $zona, $cuest) {
        $registro1 = array(
            'CUEST' => $cuest,
            'usucre' => $usuario,
            'ZONA_SUNAT' => $zona,
            'updated_at' => NULL);
        $this->db->set($registro1);
        $this->db->insert('t_contpotenciales');
    }

    public function ultcuest($usuario) {
        $this->db->select('ncuest');
        $this->db->where('usuario_id', $usuario);
        return $this->db->get('carga_usuario_viv')->row();
    }
    
    public function carga_usuario($usuario) {
        return $this->db->get('carga_usuario_viv');
    }

    public function find_cuest($id) {
        $this->db->where('ID', $id);
        return $this->db->get('t_contpotenciales')->row();
    }

    public function delete($id) {
        $desactivar = 0;
        $activo = array('ACTIVO' => $desactivar);
        $this->db->where('id', $id);
        $this->db->update('t_contpotenciales', $activo);
    }
    
    public function enable($id) {
        $activar = 1;
        $activo = array('ACTIVO' => $activar);
        $this->db->where('id', $id);
        $this->db->update('t_contpotenciales', $activo);
    }

}
