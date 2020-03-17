<html>
<head>
    <title>Daftar - CodeIgniter</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .form-signin
        {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading, .form-signin .checkbox
        {
            margin-bottom: 10px;
        }
        .form-signin .checkbox
        {
            font-weight: normal;
        }
        .form-signin .form-control
        {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .form-signin .form-control:focus
        {
            z-index: 2;
        }
        .form-signin input[type="text"]
        {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="PASSWORD"]
        {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .account-wall
        {
            margin-top: 20px;
            padding: 40px 0px 20px 0px;
            background-color: #f7f7f7;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .login-title
        {
            color: #555;
            font-size: 18px;
            font-weight: 400;
            display: block;
        }
        .profile-img
        {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        .need-help
        {
            margin-top: 10px;
        }
        .new-account
        {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Halaman Daftar</h1>
            <?php if(isset($error)) { echo $error; }; ?>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">    
                <form class="form-signin" method="POST" action="<?php echo base_url() ?>index.php/daftar">  <!-- method -->
                <div class="form-group">
                    <input type="text" class="form-control" required name="USERNAME" placeholder="Masukkan Username Anda" autofocus>
                 
                </div>
                <div class="form-group"> <!-- form email -->
                    <input type="text" class="form-control" required name="EMAIL" placeholder="Masukkan Email Anda" autofocus>
                    
                </div>
                <div class="form-group"> <!-- form password-->
                    <input type="password" required name="PASSWORD" class="form-control" placeholder="Masukkan Password Anda">
                    
                </div>
                <div class="form-group"> <!-- form nama -->
                    <input type="text" class="form-control" required name="NAMA" placeholder="Masukkan Nama Anda" autofocus>
                    
                </div>
                <div class="form-group">   <!-- form status -->                      
			        <select name="STATUS" id="STATUS" required class="form-control" >  
                        <option value="">--Pilih status--</option>
                        <option value="admin">admin</option>
                        <option value="karyawan">karyawan</option>
                    </select>
                                                      
                </div>
                <div class="form-group">  <!-- form jenis kelamin -->                       
			        <select name="JK_USER" id="JK_USER" required class="form-control" > 
                        <option value="">--Pilih jenis kelamin--</option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                    </select>
                                                     
                </div>
                <div class="form-group"> <!-- form alamat -->
                    <input type="text" class="form-control" required name="ALAMAT" placeholder="Masukkan Alamat Anda" autofocus> 
                   
                </div>
                <div class="form-group"> <!-- form tanggal lahir -->
                    <input type="date" class="form-control" required name="TGLLAHIR_USER" placeholder="Masukkan Tanggal Lahir Anda" autofocus>
                   
                </div>
                

                <button class="btn btn-lg btn-primary btn-block" name="btn-login" id="btn-login" type="submit">
                    Daftar</button> <!-- button daftar -->

                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Ingatkan Saya
                </label>
                <a href="#" class="pull-right need-help">Butuh bantuan? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="Login" class="text-center new-account">Sudah Memiliki Akun </a>
            <div id="error" style="margin-top: 10px"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
</body>
</html>