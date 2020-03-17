<?php
class Profil extends CI_Controller{ //class turunan CI_contoller
 
	function __construct(){  //fungsi construct
		parent::__construct();		 //construct pada parent
		$this->load->model('m_data'); //memanggil model bernama "m_data"
        $this->load->helper('url'); //memanggil helper url
	}
function index() { //fungsi untuk edit data
		$USERNAME=$this->session->userdata("USERNAME");
		$this->load->view('v_header1'); //menampilkan header
		$this->load->view('v_sidebar1'); //menampilkan sidebar
		$where = array('USERNAME' => $USERNAME); //membuat array username
		$data['user'] = $this->m_data->edit_data($where,'user')->result();  //memanggil edit_data pada model m_data
		$this->load->view('karyawan/v_edit',$data); //menampilkan form edit data
		
	}
}
	?>