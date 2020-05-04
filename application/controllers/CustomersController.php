<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomersController extends CI_Controller{

	function __construct()
	{
    parent::__construct();
    $this->load->database('default');
    $this->load->model('CustomerModel', 'customer');
  }

  public function index()
  {
    $data = [
      'customers' => $this->customer->get_all()
    ];

    return $this->load->view('customers/index', $data);
  }

  public function edit()
  {
    $nik = $this->input->get('nik_pelanggan');
    $customer = $this->customer->find_by_nik($nik);
    $data = [
      'customer' => $customer
    ];

    return $this->load->view('customers/edit', $data);
  }

  public function update()
  {
    $nik = $this->input->get('nik_pelanggan');
    $customer = $this->customer->find_by_nik($nik);
    $customer->nama_pelanggan = $this->input->put('nama_pelanggan');
    $customer->telepon_pelanggan = $this->input->put('telepon_pelanggan');
    $data = [
      'customer' => $customer
    ];

    return $this->load->view('customers/edit', $data);
  }

  public function destroy()
  {
    redirect('/customers');
  }
}
?>
