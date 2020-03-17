<div class="col-md-9">
<div class="panel-heading">
	<center>
		<h2>Edit data hewan</h2> <!-- menampilkan tulisan  -->
	
	</center>
	<?php foreach($hewan as $h){ ?> <!-- mengubah $hewan menjadi $h  -->
	<?php echo form_open_multipart('karyawan/hewan/update');?> <!-- meneruskan input form ke direktori file crud/update dengan method post  -->
	<table class="table table-bordered"> <!-- membuat tabel  -->
			<tr>
				<td>
			<td><img src="<?php echo base_url('upload/hewan/'.$h->GAMBAR) ?>" width="64" /></td> <!-- menampilkan value dari database ke dalam kolom -->
			</tr>
			<tr>
				<td>GAMBAR</td> <!-- membuat kolom gambar  -->
				<input type="hidden" name="old_GAMBAR" value="<?php echo $h->GAMBAR ?>" /> </td>  <!-- hidden gambar  -->
				<td><input type="file" name="GAMBAR" /> </td> <!-- input gambar  -->
			</tr>	
			<tr>
				<td>NAMA HEWAN</td> <!-- membuat kolom nama hewan -->
				<td>
					<input type="hidden" name="KD_HEWAN" value="<?php echo $h->KD_HEWAN ?>"> <!-- menampilkan value dari database ke dalam kolom -->
					<input type="text" name="NAMA_HEWAN" value="<?php echo $h->NAMA_HEWAN ?>"> <!-- menampilkan value dari database ke dalam kolom -->
				</td>
			</tr>
			<tr>
				<td>JENIS</td> <!-- membuat kolom jenis  -->
				<td><input type="text" name="JENIS" value="<?php echo $h->JENIS ?>"></td> <!-- menampilkan value dari database ke dalam kolom -->
			</tr>
			<tr>
				<td>DESKRIPSI</td> <!-- membuat kolom deskripsi  -->
				<td><input type="text" name="DESKRIPSI" value="<?php echo $h->DESKRIPSI ?>"></td> <!-- menampilkan value dari database ke dalam kolom -->
			</tr>
			<tr>
				<td>JUMLAH JANTAN</td> <!-- membuat kolom jumlah jantan  -->
				<td><input type="number" name="JUMLAH_JANTAN" value="<?php echo $h->JUMLAH_JANTAN ?>"></td> <!-- menampilkan value dari database ke dalam kolom -->
			</tr>
			<tr>
				<td>JUMLAH BETINA</td> <!-- membuat kolom jumlah betina  -->
				<td><input type="number" name="JUMLAH_BETINA" value="<?php echo $h->JUMLAH_BETINA ?>"></td> <!-- menampilkan value dari database ke dalam kolom -->
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