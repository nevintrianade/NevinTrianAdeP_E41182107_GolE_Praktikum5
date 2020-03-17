<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //membuka file secara langsung tidak diizinkan

class Dashboard extends CI_Controller { //class turunan CI_contoller

    public function __construct() //fungsi construct
    {
        parent::__construct(); //construct pada parent
        
        $this->load->model('m_login'); //memanggil model admin
        $this->load->model('m_data'); //memanggil model m_data
        
        if($this->m_login->is_role() != "karyawan"){ //cek session dan level user
            redirect("login/"); //meneruskan ke login
        }
    }

    public function index() //fungsi bernam index
    {
        $this->load->view("v_header1"); //memanggil header
        $this->load->view("v_sidebar1");  //memanggil sidebar
        $this->load->view("karyawan/v_dashboard");  //memanggil dashboard          

    }

    public function logout() //fungsi bernam logout
    {
        $this->session->sess_destroy(); //session dihapus
        redirect('login'); //kembali ke login
    }
  

    public function dash() //fungsi bernam dash
    {
        $data['total_asset'] = $this->m_data->hitungJumlahAsset(); //menghitung jumlah hewan pada dashboard
        $this->load->view("v_header1"); //memanggil header
        $this->load->view("v_sidebar1");   //memanggil sidebar
        $this->load->view("karyawan/v_dash", $data);   //menampilkan view
         

    }
}