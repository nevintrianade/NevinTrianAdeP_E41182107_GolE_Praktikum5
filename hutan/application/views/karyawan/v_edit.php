<div class="col-md-9">
<div class="panel-heading">
	<center>
		<h2>Edit data user</h2> <!-- menampilkan tulisan  -->
	
	</center>
	<?php foreach($user as $u){ ?> <!-- mengubah $user menjadi $u  -->
		<?php echo form_open_multipart('karyawan/user/update');?> <!-- meneruskan input form ke direktori file crud/update dengan method post  -->
	<table class="table table-bordered"> <!-- membuat tabel  -->
	<tr>
				<td>
			<td><img src="<?php echo base_url('upload/user/'.$u->FOTO) ?>" width="64" /></td> <!-- menampilkan foto  -->
			</tr>
			<tr>
				<td>FOTO</td> <!-- membuat kolom foto  -->
				<input type="hidden" name="old_FOTO" value="<?php echo $u->FOTO ?>" /> </td> <!-- hidden foto lama -->
				<td><input type="file" name="FOTO" /> </td> <!-- input foto  -->
			</tr>		
			<tr>
				<td>USERNAME</td> <!-- membuat kolom username  -->
				<td><input type="text" name="USERNAME" value="<?php echo $u->USERNAME  ?>" readonly></td> <!-- menampilkan value dari database ke dalam kolom -->
			</tr>
			<tr>
				<td>EMAIL</td> <!-- membuat kolom email -->
				<td><input type="text" name="EMAIL" value="<?php echo $u->EMAIL  ?>"></td> <!-- menampilkan value dari database ke dalam kolom -->
			</tr>
			<tr>
				<td>STATUS</td> <!-- membuat kolom status  -->
				<td><input type="text" name="STATUS" value="<?php echo $u->STATUS  ?>"readonly></td> <!-- menampilkan value dari database ke dalam kolom -->
			</tr>
			<tr>
				<td>NAMA</td> <!-- membuat kolom nama  -->
				<td>
					<input type="text" name="NAMA" value="<?php echo $u->NAMA ?>"> <!-- menampilkan value dari database ke dalam kolom -->
				</td>
			</tr>
			<tr>
				<td>PASSWORD</td> <!-- membuat kolom password  -->
				<td><input type="password" name="PASSWORD" value="<?php echo $u->PASSWORD ?>"></td> <!-- menampilkan value dari database ke dalam kolom -->
			</tr>
			<tr>
				<td>ALAMAT</td> <!-- membuat kolom alamat  -->
				<td><input type="text" name="ALAMAT" value="<?php echo $u->ALAMAT ?>"></td> <!-- menampilkan value dari database ke dalam kolom -->
			</tr>
			<tr>
				<td>TANGGAL LAHIR</td> <!-- membuat kolom tanggal lahir  -->
				<td><input type="text" name="TGLLAHIR_USER" value="<?php echo $u->TGLLAHIR_USER ?>"readonly></td> <!-- menampilkan value dari database ke dalam kolom -->
			</tr>
			<tr>
				<td>JENIS KELAMIN</td> <!-- membuat kolom jenis kelamin  -->
				<td><input type="text" name="JK_USER" value="<?php echo $u->JK_USER ?>"readonly></td> <!-- menampilkan value dari database ke dalam kolom -->
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td> <!-- button simpan  -->
			</tr>
		</table>
	</form>	
	<?php } ?>
</body>
</html>