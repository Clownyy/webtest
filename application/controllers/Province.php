<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Province extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
	}
	public function index()
	{
		$token = $this->session->userdata('token');
    	foreach($token as $tok){
		    $client = new \GuzzleHttp\Client();
		    $request = $client->request('GET', 'http://backend-dev.cakra-tech.co.id/api/province', [
		    	'headers' => [
		    		'Authorization' => 'Bearer '.$tok
		    	]
		    ]);
    	}
        $data['province'] = json_decode($request->getBody(true)->getContents('action'));
        if (empty($data['province']->status)) {
        	$client1 = new \GuzzleHttp\Client();
        	$req = $client1->request('GET', 'http://backend-dev.cakra-tech.co.id/api/country', [
        		'headers' => [
        			'Authorization' => 'Bearer '.$tok
        		]
        	]);
        	$data['country'] = json_decode($req->getBody(true)->getContents('action'));
        	$this->template->load('template','province',$data);
        }elseif(!empty($data['province']->status)){
        	if ($data['province']->status == "Token is Expired") {
        		echo "Token expired, silahkan login ulang <a href='".base_url('auth/logout')."'>Klik untuk logout</a>";
        	}
        }
	}
	public function insertProvince()
	{
		$token = $this->session->userdata('token');
    	foreach($token as $tok){
		    $client = new \GuzzleHttp\Client();
		    $request = $client->request('POST', 'http://backend-dev.cakra-tech.co.id/api/province', [
		    	'headers' => [
		    		'Authorization' => 'Bearer '.$tok
		    	],
		    	'form_params' => [
		    		'province_code' => $this->input->post('province_code'),
		    		'province_name' => $this->input->post('province_name'),
		    		'country_id' => $this->input->post('country_id')
		    	]
		    ]);
    	}
    	redirect(base_url('province'));
	}
	public function updateProvince()
	{
		$token = $this->session->userdata('token');
    	foreach($token as $tok){
		    $client = new \GuzzleHttp\Client();
		    $request = $client->request('PUT', 'http://backend-dev.cakra-tech.co.id/api/province', [
		    	'headers' => [
		    		'Authorization' => 'Bearer '.$tok
		    	],
		    	'form_params' => [
		    		'id' => $this->input->post('id'),
		    		'province_code' => $this->input->post('province_code'),
		    		'province_name' => $this->input->post('province_name'),
		    		'country_id' => $this->input->post('country_id')
		    	]
		    ]);
    	}
    	redirect(base_url('province'));
	}
	public function deleteProvince($id)
	{
        $token = $this->session->userdata('token');
        foreach ($token as $tok) {
        	$client = new \GuzzleHttp\Client();
		    $request = $client->request('delete', 'http://backend-dev.cakra-tech.co.id/api/province/'.$id, [
		    	'headers'=> [
		    		'Authorization' => 'Bearer '.$tok
		    	]
		    ]);
        }
        redirect(base_url('province'));
	}

}

/* End of file Province.php */
/* Location: ./application/controllers/Province.php */