# NevinTrianAdeP_E41182107_GolE_Praktikum5
NevinTrianAdeP E41182107 Golongan E Praktikum 5
Sistem Informasi Suaka magasatwa adalah web yang menampilkan hewan langka yang berada di hutan. Terdapat dua user pada aplikasi ini, yaitu Admin dan Karyawan. Admin dan karyawan dapat mendata hewan tersebut melalui aplikasi berbasis web. Namun, Admin memiliki hak akses untuk mendata data user pada aplikasi ini.

Cara memasang aplikasi :
1. Import database ke mysql phpmyadmin
2. Ganti nama databse, username, dan password
```php
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'hutan',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
2. Ganti base urlnya sesuai dengan nama direktori yang anda buat.
 ```php 
$config['base_url'] = 'http://localhost/hutan'; 
```
3. Buka browser dan jalankan urlnya.

