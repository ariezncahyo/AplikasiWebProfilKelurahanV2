<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

if ($module=='profilku' AND $act=='update'){
$mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];

  if (empty($_POST[password])) {
    // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE admin SET username       = '$_POST[username]',
                                  nama_lengkap   = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]',
                                  no_telp        = '$_POST[no_telp]',
                                 tgl_lahir         = '$mulai',
                                 alamat         = '$_POST[alamat]',
                                 jns_klm         = '$_POST[jns_klm]',
                           WHERE  username       = '$_POST[id]'");
		  }
  else{
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
