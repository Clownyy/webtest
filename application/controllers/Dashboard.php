<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
	}
	public function country()
	{
		$token = $this->session->userdata('token');
    	foreach($token as $tok){
		    $client = new \GuzzleHttp\Client();
		    $request = $client->request('GET', 'http://backend-dev.cakra-tech.co.id/api/country', [
		    	'headers' => [
		    		'Authorization' => 'Bearer '.$tok
		    	]
		    ]);
    	}
        $data['country'] = json_decode($request->getBody(true)->getContents('action'));
        if (empty($data['country']->status)) {
        	$this->template->load('template','dashboard',$data);
        }elseif(!empty($data['country']->status)){
        	if ($data['country']->status == "Token is Expired") {
        		echo "Token expired, silahkan login ulang <a href='".base_url('auth/logout')."'>Klik untuk logout</a>";
        	}
        }
	}
	public function insertCountry()
	{
		$token = $this->session->userdata('token');
    	foreach($token as $tok){
		    $client = new \GuzzleHttp\Client();
		    $request = $client->request('POST', 'http://backend-dev.cakra-tech.co.id/api/country', [
		    	'headers' => [
		    		'Authorization' => 'Bearer '.$tok
		    	],
		    	'form_params' => [
		    		'country_code' => $this->input->post('country_code'),
		    		'country_name' => $this->input->post('country_name')
		    	]
		    ]);
    	}
    	redirect(base_url('dashboard/country'));
	}
	public function deleteCountry($id)
	{
        $token = $this->session->userdata('token');
        foreach ($token as $tok) {
        	$client = new \GuzzleHttp\Client();
		    $request = $client->request('delete', 'http://backend-dev.cakra-tech.co.id/api/country/'.$id, [
		    	'headers'=> [
		    		'Authorization' => 'Bearer '.$tok
		    	]
		    ]);
        }
        redirect(base_url('dashboard/country'));
	}
	public function editCountry()
	{
		$token = $this->session->userdata('token');
    	foreach($token as $tok){
		    $client = new \GuzzleHttp\Client();
		    $request = $client->request('PUT', 'http://backend-dev.cakra-tech.co.id/api/country', [
		    	'headers' => [
		    		'Authorization' => 'Bearer '.$tok
		    	],
		    	'form_params' => [
		    		'id' => $this->input->post('id'),
		    		'country_code' => $this->input->post('country_code'),
		    		'country_name' => $this->input->post('country_name')
		    	]
		    ]);
    	}
    	redirect(base_url('dashboard/country'));
	}
	public function changePass()
	{
		try {
			$token = $this->session->userdata('token');
    		foreach($token as $tok){
		    	$client = new \GuzzleHttp\Client();
		    	$request = $client->request('POST', 'http://backend-dev.cakra-tech.co.id/api/change-password', [
		    		'headers' => [
		    			'Authorization' => 'Bearer '.$tok
		    		],
		    		'form_params' => [
		    			'oldPassword' => $this->input->post('oldPassword'),
		    			'newPassword' => $this->input->post('newPassword')
		    		]
		    	]);
    		}
		} catch (Exception $e) {
			echo "<script>
			alert('Old password not same');
			window.location='".site_url('dashboard/country')."';
			</script>";
		}
    	echo "<script>
		alert('Successfully change password');
		window.location='".site_url('dashboard/country')."';
		</script>";
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */