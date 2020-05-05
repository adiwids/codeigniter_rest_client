<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomersController extends CI_Controller{

  public function index()
  {
    return $this->load->view('customers/index', []);
  }

  public function edit()
  {
    return $this->load->view('customers/edit', []);
  }

  public function update()
  {
    return $this->load->view('customers/edit', []);
  }

  public function destroy()
  {
    redirect('/customers');
  }
}
?>
