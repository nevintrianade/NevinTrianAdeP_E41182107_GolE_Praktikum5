<div class="col-md-9">
<div class="panel-heading">
	<center>
		<h2>Tambah data user</h2> <!-- menampilkan tulisan  -->
		
	</center>
	<?php echo form_open_multipart('admin/user/tambah_aksi');?> <!-- meneruskan input form ke direktori file crud/tambah_aksi dengan method post  -->
	<table class="table table-bordered"> <!-- membuat tabel  -->
			<tr>
				<td>FOTO</td> <!-- membuat kolom foto -->
				<td><input type="file" name="FOTO" required/> </td> <!-- membuat input text foto -->
			</tr>	
			<tr>
				<td>USERNAME</td> <!-- membuat kolom username  -->
				<td><input type="text" name="USERNAME"required> </td> <!-- membuat input text username -->
			</tr>
			<tr>
				<td>EMAIL</td> <!-- membuat kolom email  -->
				<td><input type="text" name="EMAIL"required></td> <!-- membuat input text email -->
			</tr>
			<tr>
				<td>PASSWORD</td> <!-- membuat kolom password  -->
				<td><input type="text" name="PASSWORD"required></td> <!-- membuat input text password -->
			</tr>
			<tr>
			<td>STATUS</td> <!-- membuat kolom status  -->
			<td>
					<select name="STATUS" id="STATUS" required>
                        <option value="">  ---Pilih status user---  </option>
                        <option value="admin">admin</option>
                        <option value="karyawan">karyawan</option>
					</select>
			</td>
			</tr>
			<tr>
				<td>NAMA</td> <!-- membuat kolom nama  -->
				<td><input type="text" name="NAMA"required></td> <!-- membuat input text nama -->
			</tr>
			<tr>
				<td>ALAMAT</td> <!-- membuat kolom alamat  -->
				<td><input type="text" name="ALAMAT"required></td> <!-- membuat input text alamat -->
			</tr>
			<tr>
				<td>TANGGAL LAHIR</td> <!-- membuat kolom tanggal lahir  -->
				<td><input type="date" name="TGLLAHIR_USER"required></td> <!-- membuat input text tanggal lahir -->
			</tr>
			<tr>
			<td>JENIS KELAMIN</td> <!-- membuat kolom jenis kelamin  -->
			<td>
					<select name="JK_USER" id="JK_USER" required>
                        <option value="">--Pilih jenis kelamin--</option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
					</select>
			</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"required></td> <!-- membuat button simpan  -->
			</tr>
		</table>
	</form>	
</body>
</html>