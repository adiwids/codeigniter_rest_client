<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
    //buat variabel
    var $api ="";

	function __construct()
    {
        parent::__construct();
        //definisikan isi variabel "api" dari lokasi REST-Server (folder "Server")
        $this->api=SERVICE_BASE_URL;
        //definisikan "library" yang diambil dari "application/libraries/Curl.php"
        $this->load->library(array('session','curl','googleplus'));
        //definisikan "helper"
        $this->load->helper(array('url','form'));
    }

    // menampilkan data pelanggan
    function index()
    {
        //pengambilan data dari "tb_pelanggan" dengan format JSON
        $data['loginUrl'] = $this->googleplus->loginURL();
        $data['pelanggan'] = json_decode($this->curl->simple_get($this->api.'/pelanggan'));
        //tampilkan "view" data pelanggan
        $this->load->view('tampil_pelanggan',$data);
    }

    //menghapus data pelanggan
    function hapus()
    {
        // ambil parameter dari link (lihat baris 53 pada file "view/tampil_pelanggan.php")

        // ilustrasi url : localhost/PWBS-TI17AB/Client/index.php/pelanggan/hapus/1

        // keterangan segment URL:
        // pelanggan = segment(1)
        // hapus     = segment(2)
        // 1         = segment(3)
        $idx = $this->uri->segment(3);

        // jika $id kosong
        if(empty($idx))
        {
            // alihkan ke controller "pelanggan" (CI mode)
            redirect('pelanggan');
        }
        // jika $id tidak kosong
        else
        {
            // proses penghapusan data
            // 'id'=>$idx ('$id' adalah parameter yang dibaca oleh service_delete)
            // cek file service ("Server/application/controllers/Pelanggan.php")
            // lihat di baris 98
            $delete =  $this->curl->simple_delete($this->api.'/pelanggan', array('id'=>$idx), array(CURLOPT_BUFFERSIZE => 10));
            // jika proses penghapusan berhasil
            if($delete)
            {
                // tampilkan pesan
                echo "<script>alert('Data Berhasil Dihapus');</script>";
            }
            // jika proses penghapusan gagal
            else
            {
                // tampilkan pesan
                echo "<script>alert('Data Gagal Dihapus !');</script>";
            }
            // alihkan ke controller "pelanggan" (JS mode)
            echo "<script>location.href='".site_url('pelanggan')."'</script>";
        }
    }

    //tambah data pelanggan
    function tambah(){
        // ambil "name" dari tombol simpan (lihat baris 44 pada file "view/tambah_pelanggan.php")
        //jika tombol "simpan" di klik
        if(isset($_POST['simpan']))
        {
            //'nik1' => $this->input->post('nik'); diartikan sebagai berikut :
            //'nik1' >> sebagai parameter agar dibaca di server
            //          cek file service ("Server/application/controllers/  Pelanggan.php") lihat baris 58
            //$this->input->post('nik') >> diambil dari "name" komponen input (lihat baris 24 pada file "view/tambah_pelanggan.php")
            //demikian seterusnya untuk "nama" dan "telepon"

            $data = array(
                'nik1' => $this->input->post('nik'),
                'nama1' => $this->input->post('nama'),
                'telepon1' => $this->input->post('telepon'));

            //proses penyimpanan ke database (kirim data ke server)
            $insert =  $this->curl->simple_post($this->api.'/pelanggan', $data, array(CURLOPT_BUFFERSIZE => 10));

            //jika proses penyimpanan berhasil
            if($insert)
            {
                // tampilkan pesan
                echo "<script>alert('Data Berhasil Ditambah');</script>";
            }

            //jika proses penyimpanan gagal
            else
            {
                // tampilkan pesan
                echo "<script>alert('Data Gagal Ditambah !');</script>";
            }

            // alihkan ke controller "pelanggan/tambah" (JS mode)
            echo "<script>location.href='".site_url('pelanggan/tambah')."'</script>";
        }
        //jika tombol "simpan" tidak di klik
        else
        {
            //tampilkan "view/tambah_pelanggan.php"
            $this->load->view('tambah_pelanggan');
        }
    }

    // ubah data kontak
    function ubah(){
    	// ambil "name" dari tombol ubah (lihat baris 55 pada file "view/ubah_pelanggan.php")
        //jika tombol "ubah" di klik
        if(isset($_POST['ubah']))
        {
        	//'nik1' => $this->input->post('nik'); diartikan sebagai berikut :
            //'nik1' >> sebagai parameter agar dibaca di server
            //          cek file service ("Server/application/controllers/  Pelanggan.php") lihat baris 79
            //$this->input->post('nik') >> diambil dari "name" komponen input (lihat baris 34 pada file "view/ubah_pelanggan.php")
            //demikian seterusnya untuk "nama" dan "telepon"

            //untuk 'id' => $this->input->post('id'); diartikan sebagai berikut :
            //'id' >> sebagai parameter agar dibaca di server
            //        cek file service ("Server/application/controllers/  Pelanggan.php") lihat baris 76
            //$this->input->post('id') >> diambil dari "name" komponen hidden (lihat baris 29 pada file "view/ubah_pelanggan.php")
            $data = array(
                'nik1' => $this->input->post('nik'),
                'nama1' => $this->input->post('nama'),
                'telepon1' => $this->input->post('telepon'),
            	'id' => $this->input->post('id'));

            //proses updata data ke database (kirim data ke server)
            $update =  $this->curl->simple_put($this->api.'/pelanggan', $data, array(CURLOPT_BUFFERSIZE => 10));

            //jika proses update berhasil
            if($update)
            {
                // tampilkan pesan
                echo "<script>alert('Data Berhasil Diubah');</script>";
                // alihkan ke controller "pelanggan/ubah" (JS mode)
                // dengan membaca komponen inputan "nik"
                echo "<script>location.href='".site_url('pelanggan/ubah')."/".$this->input->post('nik')."'</script>";
            }
            //jika proses update gagal
            else
            {
               // tampilkan pesan
                echo "<script>alert('Data Gagal Diubah !');</script>";
                // alihkan ke controller "pelanggan/ubah" (JS mode)
                // dengan membaca komponen hidden "id"
                echo "<script>location.href='".site_url('pelanggan/ubah')."/".$this->input->post('id')."'</script>";

            }

        }
        //jika tombol "update" tidak di klik
        else
        {
	        // ambil parameter dari link (lihat baris 50 pada file "view/tampil_pelanggan.php")

	        // ilustrasi url : localhost/PWBS-TI17AB/Client/index.php/pelanggan/ubah/001

	        // keterangan segment URL:
	        // pelanggan = segment(1)
	        // hapus     = segment(2)
	        // 001         = segment(3)
        	$data["id"] = $this->uri->segment(3);
        	//setup nilai '$data["id"]' ke dalam variabel "src"
        	//"src" adalah variabel yang digunakan pada saat menampilkan data/service_get (lihat baris 17 pada file "Server/application/controllers/Pelanggan.php")
            $parameter = array('src'=> $data["id"]);

            //panggil fungsi "service_get" untuk menampilkan data pelanggan (lihat baris 14-52 pada file "Server/application/controllers/Pelanggan.php")
            $data['pelanggan'] = json_decode($this->curl->simple_get($this->api.'/pelanggan',$parameter));

            //tampilkan "view/ubah_pelanggan.php"
            $this->load->view('ubah_pelanggan',$data);
        }
    }
}
