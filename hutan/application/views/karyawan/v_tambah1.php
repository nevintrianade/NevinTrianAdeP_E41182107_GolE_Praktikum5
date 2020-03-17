<div class="col-md-9">
<div class="panel-heading">
	<center>
		<h2>Tambah data hewan</h2> <!-- menampilkan tulisan  -->
		
	</center>
	<?php echo form_open_multipart('karyawan/hewan/tambah_aksi');?> <!-- meneruskan input form ke direktori file crud/tambah_aksi dengan method post  -->
	<table class="table table-bordered"> <!-- membuat tabel  -->
			<tr>
				<td>GAMBAR</td>
				<td><input type="file" name="GAMBAR" required/> </td>
			</tr>	
			<tr>
				<td>NAMA HEWAN</td> <!-- membuat kolom nama hewan -->
				<td><input type="text" name="NAMA_HEWAN" required></td> <!-- membuat input text nama hewan-->
			</tr>
			<tr>
				<td>JENIS</td> <!-- membuat kolom jenis  -->
				<td><input type="text" name="JENIS" required></td> <!-- membuat input text jenis-->
			</tr>
			<tr>
				<td>DESKRIPSI</td> <!-- membuat kolom deskripsi  -->
				<td><input type="text" name="DESKRIPSI" required></td> <!-- membuat input text deskripsi -->
			</tr>
			<tr>
				<td>JUMLAH JANTAN</td> <!-- membuat kolom jumlah jantan -->
				<td><input type="number" name="JUMLAH_JANTAN" required></td> <!-- membuat input text jumlah jantan -->
			</tr>
			<tr>
				<td>JUMLAH BETINA</td> <!-- membuat kolom jumlah betina  -->
				<td><input type="number" name="JUMLAH_BETINA" required></td> <!-- membuat input text jumlah betina-->
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td> <!-- membuat button simpan  -->
			</tr>
		</table>
	</form>	
</body>
</html>