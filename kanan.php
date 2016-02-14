<?php
// Download
echo "<img src='images/download.jpg' /><br /><ul>";
$download=mysql_query("SELECT * FROM download 
                    ORDER BY id_download DESC LIMIT 5");
while($d=mysql_fetch_array($download)){
  echo "<p><li><a href='downlot.php?file=files/$d[nama_file]'>$d[judul]</a></li></p>";
}
echo "</ul><hr color=#e0cb91 noshade=noshade />";


// Banner
$banner=mysql_query("SELECT * FROM banner 
                    ORDER BY id_banner DESC LIMIT 4");
while($b=mysql_fetch_array($banner)){
  echo "<p align=center><a href=$b[url] target='_blank' title='$b[judul]'><img src='foto_banner/$b[gambar]' border=0></a></p>";
}

?>
