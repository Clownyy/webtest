<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

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
		    $request = $client->request('GET', 'http://backend-dev.cakra-tech.co.id/api/city', [
		    	'headers' => [
		    		'Authorization' => 'Bearer '.$tok
		    	]
		    ]);
    	}
        $data['city'] = json_decode($request->getBody(true)->getContents('action'));
        if (empty($data['city']->status)) {
        	$client1 = new \GuzzleHttp\Client();
        	$req = $client1->request('GET', 'http://backend-dev.cakra-tech.co.id/api/province', [
        		'headers' => [
        			'Authorization' => 'Bearer '.$tok
        		]
        	]);
        	$data['province'] = json_decode($req->getBody(true)->getContents('action'));
        	$this->template->load('template','city',$data);
        }elseif(!empty($data['city']->status)){
        	if ($data['city']->status == "Token is Expired") {
        		echo "Token expired, silahkan login ulang <a href='".base_url('auth/logout')."'>Klik untuk logout</a>";
        	}
        }
	}
	public function insertCity()
	{
		$token = $this->session->userdata('token');
    	foreach($token as $tok){
		    $client = new \GuzzleHttp\Client();
		    $request = $client->request('POST', 'http://backend-dev.cakra-tech.co.id/api/city', [
		    	'headers' => [
		    		'Authorization' => 'Bearer '.$tok
		    	],
		    	'form_params' => [
		    		'city_code' => $this->input->post('city_code'),
		    		'city_name' => $this->input->post('city_name'),
		    		'province_id' => $this->input->post('province_id')
		    	]
		    ]);
    	}
    	redirect(base_url('city'));
	}
	public function updateCity()
	{
		$token = $this->session->userdata('token');
    	foreach($token as $tok){
		    $client = new \GuzzleHttp\Client();
		    $request = $client->request('PUT', 'http://backend-dev.cakra-tech.co.id/api/city', [
		    	'headers' => [
		    		'Authorization' => 'Bearer '.$tok
		    	],
		    	'form_params' => [
		    		'id' => $this->input->post('id'),
		    		'city_code' => $this->input->post('city_code'),
		    		'city_name' => $this->input->post('city_name'),
		    		'province_id' => $this->input->post('province_id')
		    	]
		    ]);
    	}
    	redirect(base_url('city'));
    }
	public function deleteCity($id)
	{
		$token = $this->session->userdata('token');
        foreach ($token as $tok) {
        	$client = new \GuzzleHttp\Client();
		    $request = $client->request('delete', 'http://backend-dev.cakra-tech.co.id/api/city/'.$id, [
		    	'headers'=> [
		    		'Authorization' => 'Bearer '.$tok
		    	]
		    ]);
        }
        redirect(base_url('city'));
	}
}

/* End of file City.php */
/* Location: ./application/controllers/City.php */