<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/controllers/RequestController.php';

class UsersController extends RequestController{
  public function show() {
    if($this->session->has_userdata('auth_token')) {
      $this->set_http_basic_auth();
      $user = json_decode($this->curl->simple_get(SERVICE_BASE_URL.'/users'));

      return $this->load->view('users/show', ['user' => $user]);
    } else {
      redirect( base_url() );
    }
  }
}
