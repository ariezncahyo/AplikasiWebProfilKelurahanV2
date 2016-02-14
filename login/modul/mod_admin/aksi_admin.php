<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus user
if ($module=='user' AND $act=='hapus'){
  mysql_query("DELETE FROM admin WHERE username='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input user
elseif ($module=='user' AND $act=='input'){
  $pass=md5($_POST[password]);
  $mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,999);
  $nama_file_unik = $acak.$nama_file; 
// Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadImage($nama_file_unik);
  mysql_query("INSERT INTO admin(username,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
								 tgl_lahir,
								 alamat,
								 jns_klm) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
								'$mulai',
								'$_POST[alamat]',
								'$_POST[jns_klm]'')");
								
	}
  else{
  mysql_query("INSERT INTO admin(username,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
								 tgl_lahir,
								 alamat,
								 jns_klm) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
								'$mulai',
								'$_POST[alamat]',
								'$_POST[jns_klm]')");
  
  }
  header('location:../../media.php?module='.$module);
}

// Update user
elseif ($module=='user' AND $act=='update'){
$mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
 $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,999);
  $nama_file_unik = $acak.$nama_file; 
  if (empty($_POST[password])) {
    // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE admin SET username       = '$_POST[username]',
                                  nama_lengkap   = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]',
                                  no_telp        = '$_POST[no_telp]',
                                 tgl_lahir         = '$mulai',
                                 alamat         = '$_POST[alamat]',
                                 jns_klm         = '$_POST[jns_klm]'
                           WHERE  username       = '$_POST[id]'");
		  }
  else{
    UploadImage($nama_file_unik);
	mysql_query("UPDATE admin SET username       = '$_POST[username]',
                                  nama_lengkap   = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]',
                                  no_telp        = '$_POST[no_telp]',
                                 tgl_lahir         = '$mulai',
                                 alamat         = '$_POST[alamat]',
                                 jns_klm         = '$_POST[jns_klm]'	
                           WHERE  username       = '$_POST[id]'");
	}
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
// Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE admin SET username    = '$_POST[username]',
                                 password        = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
                                 email           = '$_POST[email]',
                                 no_telp         = '$_POST[no_telp]',
                                 tgl_lahir         = '$mulai',
                                 alamat         = '$_POST[alamat]',
                                 jns_klm         = '$_POST[jns_klm]'
                           WHERE username        = '$_POST[id]'");
		 }
  else{
    UploadImage($nama_file_unik);
	 mysql_query("UPDATE admin SET username    = '$_POST[username]',
                                 password        = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
                                 email           = '$_POST[email]',
                                 no_telp         = '$_POST[no_telp]',
                                 tgl_lahir         = '$mulai',
                                 alamat         = '$_POST[alamat]',
                                 jns_klm         = '$_POST[jns_klm]'							
                           WHERE username        = '$_POST[id]'");
	}
  }
  header('location:../../media.php?module='.$module);
}

?>
