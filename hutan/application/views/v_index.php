<section>
</br>
</br>
</br>
</br>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
	
		
		<!-- Tampilkan semua produk -->
		<div class="row">
		<!-- looping products -->
		  <?php foreach($hewan as $h) : ?>
		  <div class="col-sm-3 col-md-3">
			<div class="thumbnail">
			  <?=img([
				'src'		=> 'upload/hewan/' . $h->GAMBAR, //direktori file
				'style'		=> 'max-width: 100%; max-height:100%; height:100px' //ukuran gambar
				
			  ])?>
			  <div class="caption">
				<h3 style="min-height:60px;"><?=$h->NAMA_HEWAN?></h3> <!-- menampilkan value dari database ke dalam kolom -->
				<p><?=$h->DESKRIPSI?></p> <!-- menampilkan value dari database ke dalam kolom -->
				<p>jenis : <?=$h->JENIS?></p> <!-- menampilkan value dari database ke dalam kolom -->
				<p>jumlah jantan : <?=$h->JUMLAH_JANTAN?></p> <!-- menampilkan value dari database ke dalam kolom -->
				<p>jumlah betina : <?=$h->JUMLAH_BETINA?></p> <!-- menampilkan value dari database ke dalam kolom -->

			  </div>
			</div>
		  </div>
		  <?php endforeach; ?>
		<!-- end looping -->
		</div>
		
	</body>
</html>
</section>