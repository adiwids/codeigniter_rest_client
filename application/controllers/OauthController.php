<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/controllers/RequestController.php';

class OauthController extends RequestController{

	function __construct()
	{
		parent::__construct();
    $this->load->library(array('googleplus'));
  }

  public function callback() {
    if(isset($_GET['code'])) {
      $token = $_GET['code'];
      $this->googleplus->getAuthenticate();

      $user_info = $this->googleplus->getUserInfo();
      $provider = $this->config->item('provider', 'googleplus');
      $basic_auth_token = base64_encode(sprintf("%s:%s", $user_info["id"], $token));
      $this->session->set_userdata('auth_token', $basic_auth_token);
      if(ENVIRONMENT !== 'production') {
        $this->session->set_userdata('user_uid', $user_info['id']);
        $this->session->set_userdata('code', $token);
      }
      $user_params = [
        'provider' => $provider,
        'uid' => $user_info['id'],
        'email' => $user_info['email'],
        'nama_lengkap' => $user_info['name'],
        'nama_depan' => $user_info['given_name'],
        'nama_belakang' => $user_info['family_name'],
        'foto' => $user_info['picture']
      ];
      $cust_params = [
        'nik1' => $user_info['id'],
        'nama1' => $user_info['name'],
        'telepon1' => '-'
      ];
      $this->set_http_basic_auth();
      $this->curl->simple_post(SERVICE_BASE_URL.'/users', $user_params, [CURLOPT_BUFFERSIZE => 20]);
      $this->curl->simple_post(SERVICE_BASE_URL.'/pelanggan', $cust_params, [CURLOPT_BUFFERSIZE => 20]);

      redirect( site_url('Pelanggan/index') );
    } else {
      redirect( base_url() );
    }
  }
}
?>
