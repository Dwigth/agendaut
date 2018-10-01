<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller
{

    public function __construct()
    {
        header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header("Access-Control-Allow-Origin: *");
        parent::__construct();
        $this->load->database();
    }

    public function login_post()
    {
        $datos = $this->post();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://saiiut.uttab.edu.mx/jsp/newLogin/ajax_json_acceso.jsp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "xUsuario=".$datos["xUsuario"]."&xContrasena=".$datos["xContrasena"]."&xUniversidad=42&IE=null&rand=1",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            //echo "cURL Error #:" . $err;
            $this->response(
                array(
                'error' => TRUE,
                'mensaje' => $err
                )
            );
        } else {
            //echo $response;
            $this->response(
                array(
                'error' => FALSE,
                'mensaje' => json_decode($response)
                )
            );
        }
    }
}