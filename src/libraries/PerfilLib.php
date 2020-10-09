<?php

if (!defined('BASEPATH'))
    exit('No permitir el acceso directo al script');

// Validaciones para el modelo de usuarios (login, cambio clave, CRUD Usuario)
class PerfilLib {

    function __construct() {
        $this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería
    }

    public function no_duplicado($registro) {
        $this->CI->db->where('cargo', $registro['cargo']);
        $query = $this->CI->db->get('perfiles');
        if ($query->num_rows() > 0 AND ( !isset($registro['id']) OR ( $registro['id'] != $query->row('id')))) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
