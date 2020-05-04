<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OauthController extends CI_Controller{

	function __construct()
	{
		parent::__construct();
    $this->load->library(array('googleplus', 'curl'));
  }

  public function callback() {
    if(isset($_GET['code'])) {
      $token = $_GET['code'];
      $this->googleplus->getAuthenticate();

      $user_info = $this->googleplus->getUserInfo();
      $provider = $this->config->item('provider', 'googleplus');
      $this->session->set_userdata('user_uid', $user_info['id']);
      $this->session->set_userdata('auth_token', $token);
      $user_params = [
        'provider' => $provider,
        'uid' => $user_info['id'],
        'email' => $user_info['email'],
        'nama_lengkap' => $user_info['name'],
        'nama_depan' => $user_info['given_name'],
        'nama_belakang' => $user_info['family_name'],
        'foto' => $user_info['picture']
      ];
      $auth_params = [
        'provider' => $provider,
        'uid' => $user_info['id'],
        'email' => $user_info['email'],
        'token' => $token
      ];
      $user = $this->curl->simple_post(SERVICE_BASE_URL.'/users', $user_params, [CURLOPT_BUFFERSIZE => 20]);
      $auth = $this->curl->simple_post(SERVICE_BASE_URL.'/auth', $auth_params, [CURLOPT_BUFFERSIZE => 20]);

      redirect('/profile');
    } else {
      redirect( base_url() );
    }
	}
}
?>
