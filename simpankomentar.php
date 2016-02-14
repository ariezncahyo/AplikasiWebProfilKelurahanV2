<?php
session_start();
include "config/koneksi.php";
include "config/library.php";

	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){
    $sql = mysql_query("INSERT INTO komentar(nama_komentar,url,isi_komentar,id_berita,tgl,jam_komentar) 
                        VALUES('$_POST[nama_komentar]','$_POST[url]','$_POST[isi_komentar]','$_POST[id_berita]','$tgl_sekarang','$jam_sekarang')");
    echo "<meta http-equiv='refresh' content='0; url=berita-$_POST[id_berita].html'>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";

		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}

?>
