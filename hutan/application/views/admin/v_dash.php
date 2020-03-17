
<head>
    <title> Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<div class="col-md-9">
<div class="panel-heading">


    <div class="row">
        <div class="col-md-5">
            <div class="list-group">   <!-- list grup  -->
              <b href="<?php echo site_url('admin/dashboard/dash') ?>" class="list-group-item"><i class="fa fa-folder"></i> USER</b>
              <c class="list-group-item">jumlah user : <?php echo $total_asset1; ?></c>  <!-- menampilkan jumlah user -->
              </div>
    	</div>

        <div class="col-md-5">
            <div class="list-group"> <!-- list grup  -->
              <b href="<?php echo site_url('admin/dashboard/dash') ?>" class="list-group-item"><i class="fa fa-folder"></i> HEWAN</b>
              <c class="list-group-item">jumlah hewan : <?php echo $total_asset; ?></c>  <!-- menampilkan jumlah hewan -->
              </div>
    	</div>
    </div>


