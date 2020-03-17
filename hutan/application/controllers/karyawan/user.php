<?php 
	 

class User extends CI_Controller{ //class turunan CI_contoller
 
	function __construct(){  //fungsi construct
		parent::__construct();		 //construct pada parent
		$this->load->model('m_data'); //memanggil model bernama "m_data"
        $this->load->helper('url'); //memanggil helper url
	}


    function update(){ //fungsi untuk edit data dalam database
		if (!empty($_FILES["FOTO"]["name"])) { //jika gambar tidak diinputkan oleh user, maka...
		  $USERNAME = $this->input->post('USERNAME'); //memanggil username 
	  $config = [
		  'upload_path' => './upload/user/', //direktori file upload
		  'allowed_types' => 'gif|jpg|png', //ekstensi yang diperbolehkan
		  'max_size' => 2000, 'max_width' => 2000, //maskimal ukuran dan lebar
		  'max_height' => 2000 //maskimal tinggi 
		];
		$this->load->library('upload'); //memanggil library upload
		$this->upload->initialize($config); //memanggil konfigurasi

		if ( ! $this->upload->do_upload('FOTO')){ //fungsi upload foto
		  $error = array('error' => $this->upload->display_errors()); //menampilkan error 
		  $this->load->view('v_upload', $error); //menampilkan v_upload
	  }else{
		$file = $this->upload->data(); //mengamhil data gambar yang diupload
		$data = ['FOTO' => $file['file_name'], //menambil nama file yang diupload dan dimasukkan ke database gambar 
	   'USERNAME' => set_value('USERNAME'), //mengambil data username dari inputan user
	   'EMAIL' => set_value('EMAIL'), //memanggil data email dari inputan user
	   'PASSWORD' => set_value('PASSWORD'), //memanggil data password dari inputan user
	   'NAMA' => set_value('NAMA'), //memanggil data tanggal lahir dari inputan user
	   'TGLLAHIR_USER' => set_value('TGLLAHIR_USER'), //memanggil datatanggal alhir dari inputan user
	   'ALAMAT' => set_value('ALAMAT'), //memanggil data alamat dari inputan user
	   'JK_USER' => set_value('JK_USER'), //memanggil data jenis kelamin dari inputan user
	   'STATUS' => set_value('STATUS')]; //memanggil data status dari inputan user
	  $where = array( //membuat array
		  'USERNAME' => $USERNAME //deklarasi id
	  );
	  $this->m_data->update_data($where,$data,'user');  //memanggil update_data pada model m_data
	  redirect('/karyawan/profil/index'); //meneruskan ke direktori file crud/index
  }

	  } else {
		  $USERNAME = $this->input->post('USERNAME'); //memanggil data username
		  $FOTO= $this->input->post('old_FOTO'); //mengambil data foto lama
		  $data = ['FOTO' => $FOTO, //menginputkan datafoto lama ke database foto
		  'USERNAME' => set_value('USERNAME'), //mengambil data username dari inputan user
		  'EMAIL' => set_value('EMAIL'), //memanggil data email dari inputan user
		  'PASSWORD' => set_value('PASSWORD'), //memanggil data password dari inputan user
		  'NAMA' => set_value('NAMA'), //memanggil data nama dari inputan user
		  'TGLLAHIR_USER' => set_value('TGLLAHIR_USER'), //memanggil data tanggal lahir dari inputan user
		  'ALAMAT' => set_value('ALAMAT'), //memanggil data alamat dari inputan user
		  'JK_USER' => set_value('JK_USER'), //memanggil data jenis kelamin dari inputann user
		  'STATUS' => set_value('STATUS')]; //memanggil data status dari inputan user

		 $where = array( //membuat array
		  'USERNAME' => $USERNAME //deklarasi id
	  );
   
	  $this->m_data->update_data($where,$data,'user');  //memanggil update_data pada model m_data
	  redirect('/karyawan/profil/index'); //meneruskan ke direktori file crud/index


		  
	  }
}
}