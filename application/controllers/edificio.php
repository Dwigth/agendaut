<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Edificio extends REST_Controller {

	public function __construct() {
        header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header("Access-Control-Allow-Origin: *");
		parent::__construct();
		$this->load->database();
    }
    public function index_get(){
        $edificios = $this->db->get('edificio');
        $respuesta = array(
            'error' => false,
            'edificios' => $edificios->result()
     );
     $this->response($respuesta);
    }

    public function tipo_espacio_get(){
        $tipo_espacio = $this->db->get('tipo_espacio');
        $respuesta = array(
            'error' => false,
            'tipo_espacio' => $tipo_espacio->result()
     );
     $this->response($respuesta);
    }

    public function espacios_get($espacio = '0') {
        $espacios = $this->db->get_where('espacio',array('id_espacio' => $espacio))->result_array();
        foreach ($espacios as $key => $value) {
            $tipo_espacio = $this->db->get_where('tipo_espacio',array('id_tipo_espacio' => $value['id_tipo_espacio']));
            $edificio = $this->db->get_where('edificio',array('id_edificio' => $value['id_edificio']));
            $estado = $this->db->get_where('estado',array('id_estado' => $value['id_estado']));
            $imagenes = $this->db->get_where('imagen',array('id_espacio' => $value['id_espacio']));
            $espacios[$key]['tipo_espacio'] = $tipo_espacio->result_array()[0]["nombre"];
            $espacios[$key]['edificio'] = $edificio->result_array()[0]["nombre"];
            $espacios[$key]['estado'] = $estado->result_array()[0]["estatus"];
            $espacios[$key]['imagenes'] = $imagenes->result_array();
        }
        $respuesta = array(
            'error' => false,
            'espacios' => $espacios
         );
         $this->response($respuesta);
    }
}