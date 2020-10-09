<?php

if (!defined('BASEPATH'))
    exit('No permitir el acceso directo al script');

// Validaciones para el modelo de usuarios (login, cambio clave, CRUD Usuario)
class UsuarioLib {

    private $ci;

    public function __construct() {
        $this->ci = & get_instance(); // Esto para acceder a la instancia que carga la librería
        $this->ci->load->model('Usuario_model');
        $this->ci->load->model('Perfil_model');
        $this->ci->load->library('bcrypt');
    }

    /* public function login($user, $pass) {
      $query = $this->ci->Usuario_model->get_login($user, $pass);
      } */

    public function login($user, $pass) {
        $query = $this->ci->Usuario_model->get_login($user, $pass);
        if ($query) {
            if ($query->num_rows() > 0) {
                $usuario = $query->row();
                $perfil = $this->ci->Perfil_model->find($usuario->cargo);
                $datosSession = array(
                    'usuario' => $usuario->usuario,
                    'usuario_id' => $usuario->id,
                    'perfil_id' => $usuario->cargo,
                    'perfil_name' => $perfil->cargo,
                    'acceso_create' => $perfil->acceso_create,
                    'acceso_read' => $perfil->acceso_read,
                    'acceso_update' => $perfil->acceso_update,
                    'acceso_delete' => $perfil->acceso_delete,
                    );
                $this->ci->session->set_userdata($datosSession);
                return TRUE;
            } else {
                $this->ci->session->sess_destroy();
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function cambiarPWD($actual, $nuevo) {
        if ($this->ci->session->userdata('usuario_id') == null) {
            return FALSE;
        } else {
            $id = $this->ci->session->userdata('usuario_id');
            $usuario = $this->ci->Usuario_model->find($id);
            $password = $usuario->contrasenya;
            if ($this->ci->bcrypt->check_password($actual, $password)) {
                $data = $this->ci->bcrypt->hash_password($nuevo);
                $a99j5rf0op984prdkf2moo9fn2isme2vg = $nuevo;
                $this->ci->Usuario_model->update_clave($id,$data);
                $this->ci->Usuario_model->update_salt($id,$a99j5rf0op984prdkf2moo9fn2isme2vg);
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function no_duplicado($registro) {
        $this->ci->db->where('usuario', $registro['usuario']);
        $query = $this->ci->db->get('usuarios');
        if ($query->num_rows() > 0 AND ( !isset($registro['id']) OR ( $registro['id'] != $query->row('id')))) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
