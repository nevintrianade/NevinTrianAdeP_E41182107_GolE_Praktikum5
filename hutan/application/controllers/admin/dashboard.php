<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //akses langsung tidak diperbolehkan

class Dashboard extends CI_Controller { //class turunan CI_contoller

    public function __construct() //fungsi construct
    {
        parent::__construct(); //construct pada parent
        $this->load->model('m_login'); //load model login
        $this->load->model('m_data'); //load model m_data
        if($this->m_login->is_role() != "admin"){  //cek session dan level user
            redirect("login/"); //kembali ke login
        }
    }

    public function index() //fungsi menampilkan dashboard
    {
        
        $this->load->view("v_header"); //memanggil header
        $this->load->view("v_sidebar");  //memanggil sidebar
        $this->load->view("admin/v_dashboard");  //menampilkan dashboard
         

    }
    public function dash() //fungsi menampilkan dashboard
    {
        $data['total_asset'] = $this->m_data->hitungJumlahAsset(); //menghitung jumlah data hewan pada dashboard
        $data['total_asset1'] = $this->m_data->hitungJumlahAsset1(); //menghitung jumlah data user pada dashboard
        $this->load->view("v_header"); //memanggil header
        $this->load->view("v_sidebar");   //memanggil sidebar
        $this->load->view("admin/v_dash", $data);   //memanggil dashboard
         

    }
    public function logout() //fungsi logout
    { 
        $this->session->sess_destroy(); //menghapus session
        redirect('login'); //kembali ke login
    }


}