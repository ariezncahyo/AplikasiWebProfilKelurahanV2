<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus potensi
if ($module=='potensi' AND $act=='hapus'){
  mysql_query("DELETE FROM potensi WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input potensi
elseif ($module=='potensi' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  $isi=mysql_real_escape_string($_POST['isi_potensi']);
  

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadImage($nama_file_unik);
	
    mysql_query("INSERT INTO potensi(username,
									judul,
                                    judul_seo,
                                    isi_potensi,
                                    jam,
                                    tanggal,
                                    hari,
                                    gambar) 
                            VALUES('$_SESSION[namauser]',
								   '$_POST[judul]',
                                   '$judul_seo',
                                   '$isi',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini',
                                   '$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO potensi(username,
									judul,
                                    judul_seo,
                                    isi_potensi,
                                    jam,
                                    tanggal,
                                    hari) 
                            VALUES('$_SESSION[namauser]',
								   '$_POST[judul]',
                                   '$judul_seo',
                                   '$isi',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini')");
  }
  

  header('location:../../media.php?module='.$module);
}

// Update potensi
elseif ($module=='potensi' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  $isi=mysql_real_escape_string($_POST['isi_potensi']);
  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE potensi SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo',
                                   isi_potensi  = '$isi'  
                             WHERE id   = '$_POST[id]'");
  }
  else{
    UploadImage($nama_file_unik);
    mysql_query("UPDATE potensi SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo',
                                   isi_potensi  = '$isi',
                                   gambar      = '$nama_file_unik'   
                             WHERE id   = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
?>
