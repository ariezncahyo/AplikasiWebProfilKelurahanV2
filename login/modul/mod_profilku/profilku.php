<?php

$aksi="modul/mod_profilku/aksi_profilku.php";
switch($_GET[act]){
  // Tampil User
  default:
    echo "<h2>Profil Admin</h2>
	
          <table>
          "; 

   $tampil=mysql_query("SELECT * FROM admin where username = '$_SESSION[namauser]'");
   $r=mysql_fetch_array($tampil);

       echo "
	         <tr><td>Nama</td><td>$r[nama_lengkap]</td></tr>
			 <tr><td>Tanggal Lahir</td><td>$r[tgl_lahir]</td></tr>
			 <tr><td>Alamat</td><td>$r[alamat]</td></tr>
			 <tr><td>Jenis Kelamin</td><td>$r[jns_klm]</td></tr>
			 <tr><td>No.Telp/HP</td><td>$r[no_telp]</td></tr>
			 <tr><td>Email</td><td>$r[email]</td></tr>
			 </table>
	<input type=button value='Edit Profil Admin' onclick=\"window.location.href='?module=profilku&act=edituser&id=$_SESSION[namauser]';\"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	";
    break;
  
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM admin WHERE username='$_GET[id]'");
    $r=mysql_fetch_array($edit);
    echo "<h2>Ubah Admin</h2>
          <form method=POST onsubmit='return check(0,5,6,8,10,12);' action=$aksi?module=profilku&act=update enctype=multipart/form-data>
          <input type=hidden name=id value='$r[username]'>
          <table>
		  <tr><td>Nama Lengkap</td> <td> : $r[nama_lengkap]<input type='hidden' name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>
		  <tr><td>Tanggal lahir</td> <td> :"; 
		  $get_tgl=substr("$r[tgl_lahir]",8,2);
          combotgl(1,31,'tgl_mulai',$get_tgl);
          $get_bln=substr("$r[tgl_lahir]",5,2);
          combobln(1,12,'bln_mulai',$get_bln);
          $get_thn=substr("$r[tgl_lahir]",0,4);
          $thn_skrg=date("Y");
          combothn($thn_sekarang-100,$thn_sekarang+2,'thn_mulai',$get_thn);
		  
		echo  "</td></tr>
		  <tr><td>Alamat</td> <td> : <textarea name='alamat' cols='50' rows='10' >$r[alamat]</textarea></td></tr>
		  <tr><td>Jenis Kelamin</td> <td> : <select name=jns_klm>
											<option>$r[jns_klm]</option>
											<option>laki-laki</option>
											<option>wanita</option></td></tr>
          <tr><td>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=30 value='$r[no_telp]'></td></tr>";
		  echo"<tr><td>Username</td>     <td> : <input type=text name='username' value='$r[username]'></td></tr>
          <tr><td>Password</td>     <td> : <input type=password name='password'> *) </td></tr>
          <tr><td>E-mail</td>       <td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          ";
    
    echo "<tr><td colspan=2>*) Apabila password tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}


?>
