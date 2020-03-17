<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //membuka file secara langsung tidak diizinkan

class Login extends CI_Controller { //class turunan CI_contoller

    public function __construct() //fungsi construct
    {
        parent::__construct(); //construct pada parent
        $this->load->library('form_validation');  //load library form validasi
        $this->load->model('m_login'); //load model login
    }

    public function index()
    {

            if($this->m_login->is_logged_in())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                 //redirect berdasarkan level user
                 if($this->session->userdata("STATUS") == "admin"){
                    redirect('admin/dashboard/');//meneruskan ke dashboard admin
                }else{
                    redirect('karyawan/dashboard/'); //meneruskan ke dashboard karyawan
                }

            

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required'); //form validasi username
                $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required'); //form validasi password

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                
                if ($this->form_validation->run() == TRUE) { //cek validasi
 
                
                $USERNAME = $this->input->post("USERNAME", TRUE); //mengambil data dari form inputan user
                $PASSWORD = MD5($this->input->post('PASSWORD', TRUE)); //mengambil data dari form inputan user

                //checking data via model
                $checking = $this->m_login->check_login('user', array('USERNAME' => $USERNAME), array('PASSWORD' => $PASSWORD));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array( //membuat array
                            'USERNAME' => $apps->USERNAME, //deklarasi username
                            'PASSWORD' => $apps->PASSWORD, //deklarasi password
                            'NAMA'     => $apps->NAMA,  //deklarasi nama
                            'STATUS'    => $apps->STATUS //deklarasi status
                        );
                        
                        $this->session->set_userdata($session_data);  //set session userdata

                        //redirect berdasarkan level user
                        if($this->session->userdata("STATUS") == "admin"){ //jika status adalah admin, maka...
                            redirect('admin/dashboard/'); //meneruskan ke dashboard admin
                        }else{  //jika tidak, maka...
                            redirect('karyawan/dashboard/'); //meneruskan ke dashboard karyawan
                        }

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('v_login', $data); //memanggil view v_login
                    $this->load->view('v_head'); //memanggil view header
                }

            }else{
                $this->load->view('v_head'); //memanggil view header
                $this->load->view('v_login'); //memanggil view login
            }

        }

    }
}
