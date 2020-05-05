<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RequestController extends CI_Controller{
	function __construct()
	{
		parent::__construct();
    $this->load->library(array('curl', 'session'));
  }

  protected function set_http_basic_auth()
  {
    if($this->session->has_userdata('auth_token')) {
      $this->curl->http_header('Authorization', sprintf("Basic %s", $this->session->userdata('auth_token')));
    }
  }
}
?>
