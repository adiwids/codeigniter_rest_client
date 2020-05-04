<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OauthController extends CI_Controller{

	function __construct()
	{
		parent::__construct();
    $this->load->library(array('googleplus'));
    $this->load->database('default');
    $this->load->model('UserModel', 'user');
  }

  public function callback() {
    if(isset($_GET['code'])) {
      $token = $_GET['code'];
      $this->googleplus->getAuthenticate();

      $user_info = $this->googleplus->getUserInfo();
      $provider = $this->config->item('provider', 'googleplus');
      $this->session->set_userdata('user_uid', $user_info['id']);

      if(!$this->user->is_email_taken($user_info['email'])) {
        $attributes = [
          'provider' => $provider,
          'uid' => $user_info['id'],
          'email' => $user_info['email'],
          'nama_lengkap' => $user_info['name'],
          'nama_depan' => $user_info['given_name'],
          'nama_belakang' => $user_info['family_name'],
          'foto' => $user_info['picture']
        ];

        $this->user->create($attributes);
      }

      redirect('/profile');
    } else {
      redirect( base_url() );
    }
	}
}
?>
