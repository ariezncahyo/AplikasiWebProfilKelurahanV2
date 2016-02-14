<?php
error_reporting(0);
session_start();
include "config/koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Profil Kelurahan Indihiang</title>
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="">
<meta name="keywords" content="">
<meta http-equiv="Copyright" content="Profil Kelurahan Indihiang">
<meta name="author" content="Ucup">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

<link rel="shortcut icon" href="favicon.gif" />
<link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="wrapper">
  <div id="header">
    <div id="menuutama">
    	<ul>
		<li><a href="index.php"><span>Home</span></a></li>
        
        <?php
		$menu=mysql_query("SELECT * FROM modul WHERE publish='Y' ORDER BY urutan");
		while($m=mysql_fetch_array($menu)){
			echo "<li><a href=$m[link_seo]><span>$m[nama_modul]</span></a></li>";
		}
		if($_SESSION[namauser]==""){
		echo "<li><a href=login/index.php><span>Login</span></a></li>";
		}
		else{
		echo "<li><a href=login/media.php?module=home><span>Menu $_SESSION[leveluser]</span></a></li>";
		
		}
		?>
		
	</ul>
    </div>
  </div>
  <div id="leftcontent">
    <p>
      <?php include "kiri.php"; ?>
    </p>
  </div>
  <div id="middlecontent">
    <p>
      <?php include "tengah.php"; ?>
    </p>
  </div>
  <div id="rightcontent">
    <p>
      <?php include "kanan.php"; ?>
    </p>
  </div>
  <div id="clearer"></div>
  <div id="footer">Copyright &copy; 2014 by Kelurahan Indihiang. All Rights Reserved.</div>
</div>
</body>
</html>
