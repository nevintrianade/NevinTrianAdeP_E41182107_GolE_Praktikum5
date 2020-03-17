<?php 
	 

class Hewan extends CI_Controller{ //class turunan CI_contoller
 
	function __construct(){  //fungsi construct
		parent::__construct();		 //construct pada parent
		$this->load->model('m_data'); //memanggil model bernama "m_data"
        $this->load->helper('url'); //memanggil helper url
	}
  
	public function index(){ //fungsi untuk halaman
		$this->load->view('v_header1'); //untuk menampilkan header
		$this->load->view('v_sidebar1'); //untuk menampilkan header
		$this->load->database(); //untuk mengambil database
		$jumlah_data = $this->m_data->jumlah_data1();
		$this->load->library('pagination'); //memanggil library pagination
		$config['base_url'] = base_url().'index.php/hewan/index/'; //mengatur base url
		$config['total_rows'] = $jumlah_data; 
		$config['per_page'] = 10; //mengatur jumlah data perhalaman
		$from = $this->uri->segment(3); //mengatur uri segment
		$this->pagination->initialize($config);		//inisialisasi halaman
		$data['hewan'] = $this->m_data->data1($config['per_page'],$from); //membuat halamn
		$this->load->view('karyawan/v_hewan',$data); //memanggil view bernama v_tampil
		
	}


    function tambah(){ //fungsi untuk input data
		$this->load->view('v_header1'); //memanggil header login
		$this->load->view('v_sidebar1'); //memanghgil sidebar
		$this->load->view('karyawan/v_tambah1'); //memanggil view bernama "v_input"
		
    }
    
	function tambah_aksi(){ //fungsi untuk input data dalam database
		
		$config = [ //membuat konfigurasi
			'upload_path' => './upload/hewan/', //direktori upload
			'allowed_types' => 'gif|jpg|png', //ekstensi gambar yang diperbolehkan
			'max_size' => 2000, 'max_width' => 2000, //ukuran maksimal dan lebar gambar
			'max_height' => 2000 //maksimal tinggi
		  ];
		  $this->load->library('upload'); //memanggil library upload
		  $this->upload->initialize($config); //memanggil konfigurasi

		  if ( ! $this->upload->do_upload('GAMBAR')){ //fungsi upload gambar
			$error = array('error' => $this->upload->display_errors()); //menampilkan error
			$this->load->view('v_upload', $error); //meneruskan ke view v_upload
		}else{
			$file = $this->upload->data(); //mengambil data dari file yang diupload
			$data = ['GAMBAR' => $file['file_name'], //menginputkan data nama file ke dalam database gambar
           'NAMA_HEWAN' => set_value('NAMA_HEWAN'), //mengambil data nama hewan dari inputan user
           'JENIS' => set_value('JENIS'), //mengambil data jenis dari inputan user
		   'DESKRIPSI' => set_value('DESKRIPSI'), //memanggil data deskripsi dari inputan user
		   'JUMLAH_JANTAN' => set_value('JUMLAH_JANTAN'), //memanggil data jumlah jantan dari inputan user
		   'JUMLAH_BETINA' => set_value('JUMLAH_BETINA')]; //memanggil data jumlah betina dari inputan user

		$this->m_data->input_data($data,'hewan'); //memanggil input_data pada model m_data
		redirect('karyawan/hewan/index'); //meneruskan input data ke link direktori file "crud/index"
	}
}
    
    function hapus($KD_HEWAN){ //fungsi untuk hapus data
		$where = array('KD_HEWAN' => $KD_HEWAN); //deklarasi id
		$this->m_data->hapus_data($where,'hewan');  //memanggil hapus_data pada model m_data
		redirect('karyawan/hewan/index'); //meneruskan ke direktori file "crud/index"
    }
    
    function edit($KD_HEWAN){ //fungsi untuk edit data
		$this->load->view('v_header1'); //menampilkan header
		$this->load->view('v_sidebar1'); //memanggil sidebar
		$where = array('KD_HEWAN' => $KD_HEWAN); //membuat array id
		$data['hewan'] = $this->m_data->edit_data($where,'hewan')->result();  //memanggil edit_data pada model m_data
		$this->load->view('karyawan/v_edit1',$data); //menampilkan form edit data
		
    }
    
    function update(){ //fungsi untuk edit data dalam database
        $KD_HEWAN = $this->input->post('KD_HEWAN'); //update id ke database
        $NAMA_HEWAN = $this->input->post('NAMA_HEWAN'); //update id ke database
        $JENIS = $this->input->post('JENIS'); //update nama ke database
        $DESKRIPSI = $this->input->post('DESKRIPSI'); //update alamat ke database
	


        $data = array( //membuat array
            'KD_HEWAN' => $KD_HEWAN, //deklarasi kode hwan
			'NAMA_HEWAN' => $NAMA_HEWAN, //deklarasi nama hewan
			'JENIS' => $JENIS, //deklarasi nama
			'DESKRIPSI' => $DESKRIPSI, //deklarasi alamat


		)
        ;
     
        $where = array( //membuat array
            'KD_HEWAN' => $KD_HEWAN //deklarasi id
        );
     
        $this->m_data->update_data($where,$data,'hewan');  //memanggil update_data pada model m_data
        redirect('/karyawan/hewan/index'); //meneruskan ke direktori file crud/index
    }
}