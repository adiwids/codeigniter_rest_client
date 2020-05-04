<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersController extends CI_Controller{

	function __construct()
	{
    parent::__construct();
    $this->load->library(['curl']);
  }

  public function show() {
    if($this->session->has_userdata('user_uid')) {
      $uid = $this->session->userdata('user_uid');
      $user = $this->curl->simple_get(SERVICE_BASE_URL.'/users', ['id' => $uid]);

      return $this->load->view('users/show', ['user' => $user]);
    } else {
      redirect( base_url() );
    }
  }
}
