
<!DOCTYPE html>
<html>
<head>
    <title> Dashboard</title><!-- dashboard karyawan-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('home/index_login') ?>">Home</a> <!-- tombol home-->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">
                <a href="<?php echo base_url() ?>index.php/karyawan/dashboard/logout" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a> <!-- tombol logout -->
            </div>
            <div class="navbar-form navbar-right">
               <b href="<?php echo base_url() ?>index.php/karyawan/dashboard" type="submit" class="btn btn-success"><?php echo $this->session->userdata("USERNAME") ?> </b> <!-- session username -->
            </div>
      </div>
    </nav>
