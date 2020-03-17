<div class="col-md-9">
<div class="panel-heading">

	<center><h2>Data User</h2></center> <!-- menampilkan tulisan  -->
	<center><?php echo anchor('admin/user/tambah','Tambah Data'); ?></center> <!-- meneruskan input form ke direktori file admin/user/tambah dengan method post  -->
	<table class="table table-bordered">  <!-- membuat tabel  -->
		<tr>
			<th>USERNAME</th> <!-- membuat label username  -->
			<th>EMAIL</th> <!-- membuat label email  -->
			<th>PASSWORD</th> <!-- membuat label password  -->
			<th>NAMA</th> <!-- membuat label nama -->
			<th>STATUS</th> <!-- membuat label status  -->
			<th>TANGGAL LAHIR</th> <!-- membuat tanggal lahir  -->
			<th>JENIS KELAMIN</th> <!-- membuat label jenis kelamin -->
            <th>ALAMAT</th> <!-- membuat label alamat  -->
			<th>FOTO</th> <!-- membuat label foto -->
		
            <th>AKSI</th>
		</tr>
		<?php 
		$no = 1;
		foreach($user as $u){ //mengubah $user menjadi $u
		?>
		<tr>
			<td><?php echo $u->USERNAME ?></td> 
			<td><?php echo $u->EMAIL ?></td>   <!-- menampilkan value dari database ke dalam kolom -->
			<td><?php echo $u->PASSWORD ?></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td><?php echo $u->NAMA ?></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td><?php echo $u->STATUS ?></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td><?php echo $u->TGLLAHIR_USER ?></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td><?php echo $u->JK_USER ?></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td><?php echo $u->ALAMAT ?></td> <!-- menampilkan value dari database ke dalam kolom -->
			<td><img src="<?php echo base_url('upload/user/'.$u->FOTO) ?>" width="64" /></td>
			<td>
			    <?php echo anchor('admin/user/edit/'.$u->USERNAME,'Edit'); ?> <!-- menampilkan button edit dan fungsinya -->
                <?php echo anchor('admin/user/hapus/'.$u->USERNAME,'Hapus'); ?> <!-- menampilkan button hapus dan fungsinya -->
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