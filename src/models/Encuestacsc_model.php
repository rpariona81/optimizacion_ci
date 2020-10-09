<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modulo_model
 *
 * @author locador1dnce
 */
class Encuestacsc_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    public function listcuest() {
        $query = $this->db->get('cuest_todos');
        return $query->result();
    }

    public function listcuest2() {
        $this->db->where('ACTIVO', 1);
        $this->db->where('ESTADO !=', 'ELIMINADO');
        $query = $this->db->get('cuest_todos');
        return $query->result();
    }
    
    public function listcuestusuario($usuario) {
        $this->db->where('usucre', $usuario);
        $query = $this->db->get('cuest_usuario');
        return $query->result();
    }
    
    public function listcuestactivos() {
        $this->db->where('ACTIVO', 1);
        $this->db->where('ESTADO', 'PROCESADO');
        $query = $this->db->get('cuest_todos');
        return $query->result();
    }
    
    public function listcuesteliminados() {
        $this->db->where('ACTIVO', 0);
        $query = $this->db->get('cuest_todos');
        return $query->result();
    }
    
    public function listcuestpendientes() {
        $this->db->where('ACTIVO', 1);
        $this->db->where('ESTADO', 'PENDIENTE');
        $query = $this->db->get('cuest_todos');
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
        $this->db->update('t_csc_pag1', $registro);
    }

    public function insertpag2($registro) {
        $registro['updated_at'] = date('Y-m-d H:i');
        $this->db->set($registro);
        $this->db->where('ID', $registro['ID']);
        $this->db->update('t_csc_pag2', $registro);
        $registro_aux=array(
            'P13_1'=>$registro['P13_1'],
            'P13_2'=>$registro['P13_2'],
            'P13_3'=>$registro['P13_3'],
            'P13_4'=>$registro['P13_4']);
        $this->db->set($registro_aux);
        $this->db->where('ID', $registro['ID']);
        $this->db->update('t_csc_pag3', $registro_aux);
    }

    public function insertpag3($registro) {
        $registro['updated_at'] = date('Y-m-d H:i');
        $this->db->set($registro);
        $this->db->where('ID', $registro['ID']);
        $this->db->update('t_csc_pag3', $registro);
    }

    public function addcuest( $usuario, $zona, $cuest) {
        $registro1 = array(
            'CUEST' => $cuest,
            'usucre' => $usuario,
            'ZONA_SUNAT' => $zona,
            'updated_at' => NULL);
        $this->db->set($registro1);
        $this->db->insert('t_csc_pag1');
        $insert_id = $this->db->insert_id();
        $registro2 = array(
            'ID' => $insert_id,
            'CUEST' => $cuest,
            'usucre' => $usuario,
            'updated_at' => NULL);
        $this->db->set($registro2);
        $this->db->insert('t_csc_pag2');
        $registro3 = array(
            'ID' => $insert_id,
            'CUEST' => $cuest,
            'usucre' => $usuario,
            'updated_at' => NULL);
        $this->db->set($registro3);
        $this->db->insert('t_csc_pag3');
    }

    public function addcuest2($sede, $codigo_sede, $usuario, $zona, $cuest) {
        $registro1 = array(
            'CSC_NOMBRE' => $sede,
            'CSC_CODIGO' => $codigo_sede,
            'CUEST' => $cuest,
            'usucre' => $usuario,
            'ZONA_SUNAT' => $zona,
            'updated_at' => NULL);
        $this->db->set($registro1);
        $this->db->insert('t_csc_pag1');
        $insert_id = $this->db->insert_id();
        $registro2 = array(
            'ID' => $insert_id,
            'CUEST' => $cuest,
            'usucre' => $usuario,
            'updated_at' => NULL);
        $this->db->set($registro2);
        $this->db->insert('t_csc_pag2');
        $registro3 = array(
            'ID' => $insert_id,
            'CUEST' => $cuest,
            'usucre' => $usuario,
            'updated_at' => NULL);
        $this->db->set($registro3);
        $this->db->insert('t_csc_pag3');
    }

    public function ultcuest($usuario) {
        $this->db->select('ncuest');
        $this->db->where('usuario_id', $usuario);
        return $this->db->get('carga_usuario')->row();
    }
    
    public function carga_usuario($usuario) {
        return $this->db->get('carga_usuario');
    }

    public function findpage1($id) {
        $this->db->where('ID', $id);
        return $this->db->get('t_csc_pag1')->row();
    }

    public function findpage2($id) {
        $this->db->where('ID', $id);
        return $this->db->get('t_csc_pag2')->row();
    }

    public function findpage3($id) {
        $this->db->where('ID', $id);
        return $this->db->get('t_csc_pag3')->row();
    }

    public function delete($id) {
        $desactivar = 0;
        $activo = array('ACTIVO' => $desactivar);
        $this->db->where('id', $id);
        $this->db->update('t_csc_pag1', $activo);
        $this->db->update('t_csc_pag2', $activo);
        $this->db->update('t_csc_pag3', $activo);
    }
    
    public function enable($id) {
        $activar = 1;
        $activo = array('ACTIVO' => $activar);
        $this->db->where('id', $id);
        $this->db->update('t_csc_pag1', $activo);
        $this->db->update('t_csc_pag2', $activo);
        $this->db->update('t_csc_pag3', $activo);
    }

}
