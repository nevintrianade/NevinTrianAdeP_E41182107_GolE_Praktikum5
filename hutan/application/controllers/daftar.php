<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //membuka file secara langsung tidak diizinkan

class Daftar extends CI_Controller {  //class turunan CI_contoller

    public function __construct() //fungsi construct
    {
        parent::__construct(); //construct pada parent
        $this->load->library('form_validation');  //load library form validasi
        $this->load->model('m_login');         //load model admin
    } 

    public function index()
    {
 
            if($this->m_login->is_logged_in())   //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            {
              
                redirect("dashboard"); //meneruskan ke dashboard

            }else{

                //jika session belum terdaftar
                $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required'); //form validasi username
                $this->form_validation->set_rules('EMAIL', 'EMAIL', 'required'); //fom validasi email
                $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required'); //form validasi password
                $this->form_validation->set_rules('NAMA', 'NAMA', 'required'); //form validasi nama
                $this->form_validation->set_rules('STATUS', 'STATUS', 'required'); //form validasi status
                $this->form_validation->set_rules('ALAMAT', 'ALAMAT', 'required'); //form validasi alamat
                $this->form_validation->set_rules('JK_USER', 'JK_USER', 'required'); //form validasi janeis kelamin
                $this->form_validation->set_rules('TGLLAHIR_USER', 'TGLLAHIR_USER', 'required'); //form validasi tanggal lahir
                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                if ($this->form_validation->run() == TRUE) { //form validasi

           
                $USERNAME = $this->input->post("USERNAME", TRUE); //memngambil data username dari inputan user
                $EMAIL = $this->input->post("EMAIL", TRUE); //mengambil data email dari inputan user
                $PASSWORD = MD5($this->input->post('PASSWORD', TRUE)); //menagmbil data password dari inputan user
                $NAMA = ($this->input->post('NAMA', TRUE)); //mengambil data nama dari inputan user
                $STATUS = ($this->input->post('STATUS', TRUE)); //mengambil data status dari inputan user
                $ALAMAT = ($this->input->post('ALAMAT', TRUE)); //mengambil data alamat dari inputan user
                $JK_USER = ($this->input->post('JK_USER', TRUE)); //mengambil data tanggal lahir dari inputan user
                $TGLLAHIR_USER = ($this->input->post('TGLLAHIR_USER', TRUE));

                //checking data via model
                $checking = $this->m_login->Daftar('user', array('USERNAME' => $USERNAME), array('PASSWORD' => $PASSWORD), array('NAMA' => $NAMA), array('EMAIL' => $EMAIL),array('STATUS' => $STATUS), array('JK_USER' => $JK_USER), array('TGLLAHIR_USER' => $TGLLAHIR_USER), array('ALAMAT' => $ALAMAT));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {

                            redirect('login'); //meneruskan ke contoller login
                            $this->load->view('v_head'); //memanggil view header
     
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('v_daftar', $data);
                    $this->load->view('v_head');  //memanggil view header
                }

            }else{

                $this->load->view('v_daftar'); //memanggil voew daftar
                $this->load->view('v_head'); //memanggil view header
            }

        }

    }
}