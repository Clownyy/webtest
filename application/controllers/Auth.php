<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function actionRegis()
	{
		$client = new \GuzzleHttp\Client();
	    try {
	    	$request = $client->request('POST', 'http://backend-dev.cakra-tech.co.id/api/register', [
	    		'form_params' => [
	    			'name' => $this->input->post('name'),
	    			'email' => $this->input->post('email'),
	    			'password' => $this->input->post('password'),
	    			'password_confirmation' => $this->input->post('password_confirmation'),
	    		]
	    	]);
	    } catch (Exception $e) {
	    	echo "<script>
			alert('Something went wrong');
			window.location='".site_url('auth/register')."';
			</script>";
	    }
	    echo "<script>
		alert('Successfully Register, Please login');
		window.location='".site_url('auth/login')."';
		</script>";
	}
	public function process()
	{
    	$client = new \GuzzleHttp\Client();
    	if ($this->input->post('email') == '' || $this->input->post('password') == '') {
    		echo "<script>
    		alert('Lengkapi isian');
    		window.location='".site_url('auth/login')."';
    		</script>";
    	}
    	try {
			$req = $client->request('POST', 'http://backend-dev.cakra-tech.co.id/api/login',[
	    		'form_params' => [
	    			'email' => $this->input->post('email'),
	    			'password' => $this->input->post('password')
	    		]
	    	]);    		
    	} catch (Exception $e) {
    		echo "<script>
			alert('Wrong Email or Password');
			window.location='".site_url('auth/login')."';
			</script>";
    	}
    	$token = json_decode($req->getBody(true)->getContents('action'));
    	$params = array(
    		'token' => $token,
    		'status' => 'logged_in'
    	);
    	$this->session->set_userdata($params);
    	redirect(base_url('dashboard/country'));
	}
	public function logout()
	{
		$params = array('status', 'token');
		$this->session->unset_userdata($params);
		redirect(base_url('auth/login'));
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */