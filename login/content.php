<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";

// Bagian Home
if ($_GET[module]=='home'){
  echo "<h2>Selamat Datang</h2>
          <p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang <br> Silahkan klik menu pilihan yang berada 
          di sebelah kiri untuk mengelola content website. </p>
          <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
}

// Bagian User
elseif ($_GET[module]=='profil'){
  include "modul/mod_profil/profil.php";
}

// Bagian User
elseif ($_GET[module]=='user'){
  include "modul/mod_admin/admin.php";
}

// Bagian Modul
elseif ($_GET[module]=='modul'){
  include "modul/mod_modul/modul.php";
}

// Bagian Kategori
elseif ($_GET[module]=='potensi'){
  include "modul/mod_potensi/potensi.php";
}

// Bagian profil
elseif ($_GET[module]=='berita'){
  include "modul/mod_berita/berita.php";
}

// Bagian Komentar profil
elseif ($_GET[module]=='komentar'){
  include "modul/mod_komentar/komentar.php";
}

// Bagian Tag
elseif ($_GET[module]=='tag'){
  include "modul/mod_tag/tag.php";
}

// Bagian Agenda
elseif ($_GET[module]=='agenda'){
  include "modul/mod_agenda/agenda.php";
}

// Bagian Banner
elseif ($_GET[module]=='banner'){
  include "modul/mod_banner/banner.php";
}

// Bagian Poling
elseif ($_GET[module]=='poling'){
  include "modul/mod_poling/poling.php";
}

// Bagian Download
elseif ($_GET[module]=='download'){
  include "modul/mod_download/download.php";
}

// Bagian Hubungi Kami
elseif ($_GET[module]=='hubungi'){
  include "modul/mod_hubungi/hubungi.php";
}
// Bagian Tingkatan
elseif ($_GET[module]=='tingkat'){
  include "modul/mod_tingkat/tingkat.php";
}
// Bagian Profilku
elseif ($_GET[module]=='profilku'){
  include "modul/mod_profilku/profilku.php";
}
// Bagian Laporan
elseif ($_GET[module]=='laporan'){
  include "modul/mod_laporan/laporan.php";
}
// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
