<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SessionsController extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('googleplus'));
	}

	public function create(){
		if($this->session->has_userdata('auth_token')) {
			redirect('/profile');
		} else {
			$data['loginURL'] = $this->googleplus->loginURL();

			$this->load->view('sessions/create', $data);
		}
	}

  public function destroy(){
		$this->session->sess_destroy();
		$this->googleplus->revokeToken();

		redirect( base_url() );
	}
}
?>
