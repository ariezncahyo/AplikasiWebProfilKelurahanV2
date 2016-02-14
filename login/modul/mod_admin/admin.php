<?php

$aksi="modul/mod_admin/aksi_admin.php";
switch($_GET[act]){
  // Tampil User
  default:
    echo "<h2>Anggota</h2>";
	if ($_SESSION[leveluser]=='admin'){
    echo"      <input type=button value='Tambah Admin' onclick=\"window.location.href='?module=user&act=tambahuser';\">";
	}
	echo"
          <table>
          <tr><th>no</th><th>username</th><th>nama lengkap</th><th>email</th>";
    if ($_SESSION[leveluser]=='admin'){	
	echo"<th>aksi</th>"; 
    }

   $tampil=mysql_query("SELECT * FROM admin ORDER BY username");
   
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "</tr><tr><td>$no</td>
             <td>$r[username]</td>
             <td><a href=?module=user&act=lihatuser&username=$r[username]>$r[nama_lengkap]</a></td>
		         <td><a href=mailto:$r[email]>$r[email]</a></td><td>";
		if ($_SESSION[leveluser]=='admin'){
    echo" <a href=?module=user&act=edituser&id=$r[username]>Edit</a> | ";
    if($r[level]!="admin"){	    
	  echo"	<a href=$aksi?module=user&act=hapus&id=$r[username]>Hapus</a> |";
		 }
	}
     echo"        
	               
             </td></tr>";
      $no++;
    }
    echo "</table>";
	echo "<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>";
    break;
  
  case "tambahuser":
    echo "<h2>Tambah Admin</h2>
          <form method=POST name='jibul' onsubmit='return check(0,5,6,8,10,11);' action=$aksi?module=user&act=input enctype=multipart/form-data>
          <table>
		  <tr><td>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30></td></tr>
		  <tr><td>Tanggal lahir</td> <td> : "; 
		  combotgl(1,31,'tgl_mulai',$tgl_skrg);
          combonamabln(1,12,'bln_mulai',$bln_sekarang);
          combothn(1930,$thn_sekarang,'thn_mulai',$thn_sekarang);
		  
		echo "</td></tr>
		  <tr><td>Alamat</td> <td> : <textarea name='alamat' cols='50' rows='10' ></textarea></td></tr>
		  <tr><td>Jenis Kelamin</td> <td> : <select name=jns_klm>
											<option></option>
											<option>laki-laki</option>
											<option>wanita</option></td></tr>
		  <tr><td>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=20></td></tr>
          <tr><td>Username</td>     <td> : <input type=text name='username'></td></tr>
          <tr><td>Password</td>     <td> : <input type=password name='password'></td></tr>
            
          <tr><td>E-mail</td>       <td> : <input type=text name='email' size=30></td></tr>
          
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM admin WHERE username='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit User</h2>
          <form method=POST name='jibul' onsubmit='return check(0,5,6,8,10,11);' action=$aksi?module=user&act=update enctype=multipart/form-data>
          <input type=hidden name=id value='$r[username]'>
          <table>
		  <tr><td>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>
          <tr><td><img src=../foto_profil/small_$r[gambar1]></td><td>Ganti Foto : <input type=file size=30 name=fupload></td></tr>
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
	
case "lihatuser":
echo "<h2>Profil $_GET[username]</h2>
	
          <table>
          "; 

   $tampil=mysql_query("SELECT * FROM admin where username = '$_GET[username]'");
   $r=mysql_fetch_array($tampil);
      $tampil2=mysql_query("SELECT * FROM satlat where id_satlat = '$r[id_satlat]'");
   $r1=mysql_fetch_array($tampil2);
       echo "<tr><td><img src=../foto_profil/small_$r[gambar1]></td><td></td></tr>
	         <tr><td>Nama</td><td>$r[nama_lengkap]</td></tr>
			 <tr><td>Tanggal Lahir</td><td>$r[tgl_lahir]</td></tr>
			 <tr><td>Alamat</td><td>$r[alamat]</td></tr>
			 <tr><td>Jenis Kelamin</td><td>$r[jns_klm]</td></tr>
			 <tr><td>No.Telp/HP</td><td>$r[no_telp]</td></tr>
			 <tr><td>Email</td><td>$r[email]</td></tr></table>
	<input type=button value=Kembali onclick=self.history.back()></td></tr> ";
	echo "<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>";
break;
}

?>
