<html>
<head>
	<title>malasngoding.com</title>
</head>
<body>
	<center><h1>Membuat Upload File Dengan CodeIgniter | MalasNgoding.com</h1></center>
	<?php echo $error;?>

	<?php echo form_open_multipart('admin/hewan/tambah_aksi');?> 

	<input type="file" name="GAMBAR" /> <!-- membuat inputan gambar  -->

	<br /><br />

	<input type="submit" value="upload" /> <!-- membuat button upload  -->

</form>

</body>
</html>