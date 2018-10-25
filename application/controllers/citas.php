<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Citas extends REST_Controller {

	public function __construct() {
        header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header("Access-Control-Allow-Origin: *");
		parent::__construct();
		$this->load->database();
    }

    public function crear_cita_post(){
        $datos = $this->post();

        $citas = $this->db->get_where('citas',
        array(
            'fecha_cita'=> $datos["fecha_cita"],
            'hora_inicio' => $datos["hora_inicio"],
            'id_espacio' => $datos["id_espacio"]
            )
        );

        if($citas->row() != null){
            $respuesta = array(
                'error' => true,
                'mensaje' => 'Ya existe una cita para este espacio en el mismo día y hora.'
         );
            $this->response($respuesta);
            return;
        }

        // $espacio = $this->db->get_where('espacio',array('id_espacio' => $datos["id_espacio"]))->result_array();
        // if($espacio["id_estado"] == 2 ) {
        //     $respuesta = array(
        //         'error' => true,
        //         'mensaje' => 'El espacio está temporalmente fuera de servicio'
        //  );
        //  $this->response($respuesta);
        //  return;
        // }

        $codigo = md5($datos["fecha_cita"].$datos["hora_inicio"].$datos["tiempo_aprox"].$datos["nombre"]);
        $datos["codigo"] = $codigo;

        $this->db->insert('citas',$datos);

        $respuesta = array(
            'error' => false,
            'mensaje' => 'Se procesará una cita para la fecha ' .$datos["fecha_cita"]. ' a las '.$datos["hora_inicio"].' con una duración aproximada de '.$datos["tiempo_aprox"].' hr(s), una secretaria, director o personal a cargo de los espacios debe confirmar su cita.',
            'codigo' => $codigo

     );
        $this->response($respuesta);
    }

    // public function
}