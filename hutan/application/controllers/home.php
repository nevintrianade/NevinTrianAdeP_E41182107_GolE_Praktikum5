<?php
defined('BASEPATH') OR exit('No direct script access allowed');  //membuka file secara langsung tidak diizinkan
 
class Home extends CI_Controller { //class turunan CI_contoller
	
	function __construct(){ //fungsi construct
		parent::__construct(); //construct pada parent
		$this->load->helper('url'); //memanggil helper url
		$this->load->helper('html'); //memanggil helper url
        $this->load->helper(array('form', 'url')); //memanggil helper array form dan url
        $this->load->model('m_data'); //memanggil model bernama m_data
	}
 
	public function index(){		 //fungsi index
		$data['hewan'] = $this->m_data->all(); //load model
		$this->load->view('v_head',$data); //memanggil header
		$this->load->view('v_index',$data); //memanggil view bernama v_index	
	}

	public function index_login(){		 //fungsi index
		$data['hewan'] = $this->m_data->all(); //load model
		$this->load->view('v_header',$data); //memanggil header
		$this->load->view('v_index',$data); //memanggil view bernama v_index	
	}
	
    public function about(){		//fungsi about
		$data['judul'] = "Halaman about"; //deklarasi judul bernama halaman about
		$this->load->view('v_head',$data); //memanggil header
		$this->load->view('v_about',$data);  //memanggil view bernama v_about
    }
    public function login(){		//fungsi login
		$data['judul'] = "Halaman login"; //deklarasi judul bernama halaman login
		$this->load->view('v_head',$data); //memanggil header
		$this->load->view('v_login', $data); //memanggil view bernama v_login
		
    }

    
	public function Daftar(){		//fungsi halaman about setelah login
		$data['judul'] = "Halaman about"; //deklarasi judul bernama halaman about setelah login
		$this->load->view('v_head',$data); //memanggil header setelah login
		$this->load->view('v_daftar',$data); //memanggil view bernama v_about
    }
    
}