<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/controllers/RequestController.php';

class UsersController extends RequestController{
  public function index() {
    if($this->session->has_userdata('auth_token')) {
      $this->load->library(['googleplus']);
      $this->set_http_basic_auth();
      $users = json_decode($this->curl->simple_get(SERVICE_BASE_URL.'/users'));
      $this->set_http_basic_auth();
      $current_user = json_decode($this->curl->simple_get(SERVICE_BASE_URL.'/users', ['query' => $this->session->userdata('user_uid')]))[0];

      return $this->load->view('users/index', ['users' => $users, 'current_user' => $current_user, 'loginURL' => $this->googleplus->loginURL()]);
    } else {
      redirect( base_url() );
    }
  }

  public function profile() {
    if($this->session->has_userdata('auth_token')) {
      $this->set_http_basic_auth();
      $uid = $this->session->userdata('user_uid');
      $user = json_decode($this->curl->simple_get(SERVICE_BASE_URL.'/users', ['query' => $uid]))[0];

      return $this->load->view('users/show', ['user' => $user, 'current_user' => $user]);
    } else {
      redirect( base_url() );
    }
  }

  public function show($id) {
    if($this->session->has_userdata('auth_token')) {
      $this->set_http_basic_auth();
      $user = json_decode($this->curl->simple_get(SERVICE_BASE_URL.'/users', ['query' => $id]))[0];
      $this->set_http_basic_auth();
      $current_user = json_decode($this->curl->simple_get(SERVICE_BASE_URL.'/users', ['query' => $this->session->userdata('user_uid')]))[0];

      return $this->load->view('users/show', ['user' => $user, 'current_user' => $current_user]);
    } else {
      redirect( base_url() );
    }
  }

  public function edit($id) {
    if($this->session->has_userdata('auth_token')) {
      $this->set_http_basic_auth();
      $user = json_decode($this->curl->simple_get(SERVICE_BASE_URL.'/users', ['query' => $id]))[0];
      $this->set_http_basic_auth();
      $current_user = json_decode($this->curl->simple_get(SERVICE_BASE_URL.'/users', ['query' => $this->session->userdata('user_uid')]))[0];

      return $this->load->view('users/edit', ['user' => $user, 'current_user' => $current_user]);
    } else {
      redirect( base_url() );
    }
  }

  public function update($id) {
    if($this->session->has_userdata('auth_token')) {
      $this->set_http_basic_auth();
      $update_params = [];
      $update_params['id'] = intval($id);
      $update_params['nama_depan'] = $this->input->post('nama_depan');
      $update_params['nama_belakang'] = $this->input->post('nama_belakang');
      $user = json_decode($this->curl->simple_put(SERVICE_BASE_URL.'/users', $update_params));

      redirect( site_url(sprintf('users/%s/edit', $id)) );
    } else {
      redirect( base_url() );
    }
  }

  public function destroy($id) {
    if($this->session->has_userdata('auth_token')) {
      $this->set_http_basic_auth();
      $resp = $this->curl->simple_delete(SERVICE_BASE_URL.'/users', ['id' => $id]);

      redirect( site_url('users') );
    } else {
      redirect( base_url() );
    }
  }
}
