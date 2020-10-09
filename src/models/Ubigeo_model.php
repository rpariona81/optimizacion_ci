<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ubigeo_model extends CI_Model {
    protected $tabla;
    
    /*
     * Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria.
     */
    public function __construct() {
        parent::__construct();
        $this -> tabla = 't_ubigeo';
        $this -> id = 'ubigeo';
    }

    public function info_sedes(){
        $this->db->select('T_SEDE.*, T_UBIGEO.dpto, T_UBIGEO.prov, T_UBIGEO.dist');
        $this->db->from('T_SEDE');
        $this->db->join('T_UBIGEO', 'T_SEDE.UBIGEO = T_UBIGEO.ubigeo','left');
        $v_sedes = $this -> db -> get_where('','T_SEDE.TOTAL_AULAS > 0');
        return $v_sedes -> result_array();
    }

    public function todo_sedes(){
        $this->db->select('T_SEDE.*, T_UBIGEO.dpto, T_UBIGEO.prov, T_UBIGEO.dist');
        $this->db->from('T_SEDE');
        $this->db->join('T_UBIGEO', 'T_SEDE.UBIGEO = T_UBIGEO.ubigeo','left');
        $v_sedes = $this -> db -> get();
        return $v_sedes -> result_array();
    }


    public function muestra_sedes($porpagina,$segmento) {
		$this->db->select('T_SEDE.*, T_UBIGEO.dpto, T_UBIGEO.prov, T_UBIGEO.dist');
        $this->db->from('T_SEDE');
        $this->db->join('T_UBIGEO', 'T_SEDE.UBIGEO = T_UBIGEO.ubigeo','left');
        $this->db->join('T_DEPARTAMENTO', 'T_UBIGEO.dpto = T_DEPARTAMENTO.DEPARTAMENTO','left');
        $this->db->join('T_PROVINCIA', 'T_UBIGEO.dpto = T_PROVINCIA.DEPARTAMENTO and T_UBIGEO.prov = T_PROVINCIA.PROVINCIA','left');
        $this->db->join('T_DISTRITO', 'T_UBIGEO.dpto = T_DISTRITO.DEPARTAMENTO and T_UBIGEO.prov = T_DISTRITO.PROVINCIA and T_UBIGEO.dist = T_DISTRITO.DISTRITO','left');
        $query = $this -> db -> get('',$porpagina,$segmento);
        if ($query -> num_rows() > 0){
            return $query -> result_array();
        }else{
            return false;
        }
    }

    public function buscar_sede($nombre) {
        $this -> db -> like('nombre', $nombre);
        $this -> db -> order_by('nombre ASC');
        $this -> db -> from('sedes');
        $query = $this->db->get();
        $num_result = $this->db->count_all_results();
        if ( $num_result > 0) {
            return $query -> result_array();
        }else{
            return false;
        }
    }

    public function get_total_sedes(){
        return $this -> db -> count_all($this -> tabla);
    }

    public function insertar_sede($sede) {
        //$this->db->set($alumno);
        $this->db->insert($this->tabla,$sede);
    }

    public function filtra_sede($id) {
        $this->db->select('sedes.*, ubigeo.dpto, departamentos.ccdd as coddpto, ubigeo.prov, provincias.ccpp as codprov, ubigeo.dist, distritos.ccdi as coddist');
        $this->db->from('sedes');
        $this->db->join('ubigeo', 'sedes.ubigeo = ubigeo.ubigeo','left');
        $this->db->join('departamentos', 'ubigeo.dpto = departamentos.departamento','left');
        $this->db->join('provincias', 'ubigeo.dpto = provincias.departamento and ubigeo.prov = provincias.provincia','left');
        $this->db->join('distritos', 'ubigeo.dpto = distritos.departamento and ubigeo.prov = distritos.provincia and ubigeo.dist = distritos.distrito','left');
        $this->db->where('sedes.id_sede', $id);
        return $this->db->get()->row();
    }

    public function actualiza_sede($id, $registro) {
        $this -> db -> set($registro);
        $this -> db -> where('id_sede', $registro['id_sede']);
        $this -> db -> update($this -> tabla);
    }

    public function eliminar_sede($id) {
        $this -> db -> where('id_sede', $id);
        $this -> db -> delete($this -> tabla);   
    }

    
    public function get_dpto() {
        $query = $this -> db -> get('t_dpto');
        $lista = array();
        foreach ($query->result() as $dpto) {
            $lista[$dpto -> ccdd] = $dpto -> dpto;
        }
        return $lista;
    }

    public function get_prov($ccdd='') {
        $this->db->where('ccdd',$ccdd);
        $query = $this->db->get('t_prov');
        $lista = array();
        foreach ($query->result() as $prov) {
          $lista[$prov -> ccpp] = $prov -> prov;
        }
        return $lista;
    }

    public function get_dist($ccdd='',$ccpp='') {
		$this->db->where('ccdd',$ccdd);
		$this->db->where('ccpp',$ccpp);
		$query = $this->db->get('t_dist');
		$lista = array();
		foreach ($query->result() as $dist) {
		  $lista[$dist -> ccdi] = $dist -> dist;
		}
		return $lista;
	}

}