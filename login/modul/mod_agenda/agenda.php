<?php
$aksi="modul/mod_agenda/aksi_agenda.php";
switch($_GET[act]){
  // Tampil Agenda
  default:
    echo "<h2>Agenda</h2>
          <input type=button value='Tambah Agenda' onclick=location.href='?module=agenda&act=tambahagenda'>
          <table>
          <tr><th>no</th><th>tema</th><th>tgl. mulai</th><th>tgl. selesai</th><th>aksi</th></tr>";
    if ($_SESSION[leveluser]=='admin'){
      $tampil=mysql_query("SELECT * FROM agenda ORDER BY id DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM agenda 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id DESC");
    }
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl_mulai   = tgl_indo($r[tgl_mulai]);
      $tgl_selesai = tgl_indo($r[tgl_selesai]);
      echo "<tr><td>$no</td>
                <td width=220>$r[tema]</td>
                <td>$tgl_mulai</td>
                <td>$tgl_selesai</td>
                <td><a href=?module=agenda&act=editagenda&id=$r[id]>Edit</a> | 
	                  <a href=$aksi?module=agenda&act=hapus&id=$r[id]>Hapus</a>
		        </tr>";
      $no++;
    }
    echo "</table>";
	echo "<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>";
    break;

  
  case "tambahagenda":
    echo "<h2>Tambah Agenda</h2>
          <form method=POST action='$aksi?module=agenda&act=input'>
          <table>
          <tr><td>Tema</td>      <td> : <input type=text name='tema' size=60></td></tr>
          <tr><td>Isi Agenda</td>  <td> <textarea name='isi_agenda' style='width: 400px; height: 150px;'></textarea></td></tr>
          <tr><td>Tempat</td>    <td> : <input type=text name='tempat' size=40></td></tr>

          <tr><td>Tgl Mulai</td><td> : ";        
          combotgl(1,31,'tgl_mulai',$tgl_skrg);
          combonamabln(1,12,'bln_mulai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang);

    echo "<tr><td>Tgl Selesai</td><td> : ";
          combotgl(1,31,'tgl_selesai',$tgl_skrg);
          combonamabln(1,12,'bln_selesai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang);

    echo "</td></tr>

          <tr><td>Pengirim <br />(Contact Person)</td>    <td> : <input type=text name='pengirim' size=40></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
          <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table>
          </form>";
    break;
  

  case "editagenda":
    $edit = mysql_query("SELECT * FROM agenda WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Agenda</h2>
          <form method=POST action=$aksi?module=agenda&act=update>
          <input type=hidden name=id value=$r[id]>
          <table>
          <tr><td>Tema</td>      <td> : <input type=text name='tema' size=60 value='$r[tema]'></td></tr>
          <tr><td>Isi Agenda</td>  <td> <textarea name='isi_agenda' style='width: 400px; height: 150px;'>$r[isi_agenda]</textarea></td></tr>
          <tr><td>Tempat</td>    <td> : <input type=text name='tempat' size=40 value='$r[tempat]'></td></tr>

          <tr><td>Tgl Mulai</td><td> : ";    
          $get_tgl=substr("$r[tgl_mulai]",8,2);
          combotgl(1,31,'tgl_mulai',$get_tgl);
          $get_bln=substr("$r[tgl_mulai]",5,2);
          combobln(1,12,'bln_mulai',$get_bln);
          $get_thn=substr("$r[tgl_mulai]",0,4);
          $thn_skrg=date("Y");
          combothn($thn_sekarang-2,$thn_sekarang+2,'thn_mulai',$get_thn);

    echo "</td></tr>
          <tr><td>Tgl Selesai</td><td> : ";    
          $get_tgl2=substr("$r[tgl_selesai]",8,2);
          combotgl(1,31,'tgl_selesai',$get_tgl2);
          $get_bln2=substr("$r[tgl_selesai]",5,2);
          combobln(1,12,'bln_selesai',$get_bln2);
          $get_thn2=substr("$r[tgl_selesai]",0,4);
          combothn($thn_sekarang-2,$thn_sekarang+2,'thn_selesai',$get_thn2);

    echo "</td></tr>

          <tr><td>Pengirim <br />(Contact Person)</td>    <td> : <input type=text name='pengirim' size=40 value='$r[pengirim]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
