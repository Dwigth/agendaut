<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
        $citas = $this->db->get('citas')->result_array();
        $data["citas"] = $citas;
        $this->load->view('admin_page', $data);

    }
}