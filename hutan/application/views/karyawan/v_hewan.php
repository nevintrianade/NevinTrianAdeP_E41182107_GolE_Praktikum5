<div class="col-md-9">
<div class="panel-heading">

	<center><h2>Data Hewan</h2></center> <!-- menampilkan tulisan  -->
	<center><?php echo anchor('karyawan/hewan/tambah','Tambah Data'); ?></center> <!-- meneruskan input form ke direktori file crud/tambah dengan method post  -->
	<table class="table table-bordered">  <!-- membuat tabel  -->
		<tr>
			<th>KD_HEWAN</th> <!-- membuat label kode hewan -->
			<th>NAMA_HEWAN</th> <!-- membuat label nama hewan -->
			<th>JENIS</th> <!-- membuat label jenis -->
			<th>DESKRIPSI</th> <!-- membuat label deskripsi  -->
			<th>JUMLAH_JANTAN</th> <!-- membuat label jumlah jantan  -->
			<th>JUMLAH_BETINA</th> <!-- membuat label jumlah betina -->
            <th>GAMBAR</th> <!-- membuat label gambar -->
            <th>AKSI</th> <!-- membuat label aksi -->
		</tr>
		<?php 
		$no = 1;
		foreach($hewan as $h){ //mengubah $hewan menjadi $h
		?>
		<tr>
			<td><?php echo $h->KD_HEWAN ?></td>   <!-- menampilkan value dari database ke dalam kolom -->
			<td><?php echo $h->NAMA_HEWAN ?></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td><?php echo $h->JENIS ?></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td><?php echo $h->DESKRIPSI ?></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td><?php echo $h->JUMLAH_JANTAN ?></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td><?php echo $h->JUMLAH_BETINA ?></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td><img src="<?php echo base_url('upload/hewan/'.$h->GAMBAR) ?>" width="64" /></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td>
				
			    <?php echo anchor('karyawan/hewan/edit/'.$h->KD_HEWAN,'Edit'); ?> <!-- menampilkan button edit dan fungsinya -->
                <?php echo anchor('karyawan/hewan/hapus/'.$h->KD_HEWAN,'Hapus'); ?> <!-- menampilkan button hapus dan fungsinya -->
			</td>
		</tr>
		<?php } ?>
    </table>
    <br/>
	<center><?php 
	echo $this->pagination->create_links(); //membuat halaman
	?> </center>

</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>