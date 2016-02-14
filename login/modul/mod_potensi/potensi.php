<?php


$aksi="modul/mod_potensi/aksi_potensi.php";
switch($_GET[act]){
  // Tampil potensi
  default:
    echo "<h2>Potensi Daerah</h2>
          <input type=button value='Tambah Potensi Daerah' onclick=\"window.location.href='?module=potensi&act=tambahpotensi';\">
          <table>
          <tr><th>no</th><th>potensi daerah</th><th>tgl. posting</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM potensi ORDER BY id DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM potensi 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$tgl_posting</td>
		            <td><a href=?module=potensi&act=editpotensi&id=$r[id]>Edit</a> | 
		                <a href=$aksi?module=potensi&act=hapus&id=$r[id]>Hapus</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM potensi"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM potensi WHERE username='$_SESSION[namauser]'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div><br>";
	echo "<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>";
    break;
  
  case "tambahpotensi":
    echo "<h2>Tambah potensi</h2>
          <form method=POST action='$aksi?module=potensi&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td width=70>Judul</td>     <td> : <input type=text name='judul' size=60></td></tr>

          <tr><td>Isi potensi</td>  <td> <textarea name='isi_potensi' style='width: 450px; height: 350px;'></textarea></td></tr>
          <tr><td>Gambar</td>      <td> : <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>";

    
    echo "
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "editpotensi":
    $edit = mysql_query("SELECT * FROM potensi WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit potensi</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=potensi&act=update>
          <input type=hidden name=id value=$r[id]>
          <table>
          <tr><td width=70>Judul</td>     <td> : <input type=text name='judul' size=60 value='$r[judul]'></td></tr>
          
 
          <tr><td>Isi potensi</td>   <td> <textarea name='isi_potensi' style='width: 450px; height: 350px;'>$r[isi_potensi]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> :  
          <img src='../foto_berita/small_$r[gambar]'></td></tr>
          <tr><td>Ganti Gbr</td>    <td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>";

    
 
    echo  "<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
?>
