<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages404 extends CI_Controller {

	public function index()
	{
		$this->output->set_status_header('404');
		$this->load->view('Pages/404');		
	}

}

/* End of file 404Pages.php */
/* Location: ./application/controllers/404Pages.php */