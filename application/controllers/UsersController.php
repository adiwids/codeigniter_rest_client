<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersController extends CI_Controller{

	function __construct()
	{
    parent::__construct();
    $this->load->database('default');
    $this->load->model('UserModel', 'user');
  }

  public function show() {
    if($this->session->has_userdata('user_uid')) {
      $uid = $this->session->userdata('user_uid');
      $user = $this->user->find_by_uid($uid);

      return $this->load->view('users/show', ['user' => $user]);
    } else {
      redirect( base_url() );
    }
  }
}
