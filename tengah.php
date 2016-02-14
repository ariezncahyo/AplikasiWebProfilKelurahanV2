<?php
// Form Pencarian
echo "<img src=images/pencarian.jpg><br />
      <form method=POST action='hasil-pencarian.html'>    
        <input name=kata type=text size=17 />
        <input type=submit value=Go />
      </form>
      <hr color=#FCEDC7 noshade=noshade />";



// Berita Teratas
echo "<img src=images/populer.jpg><br /><ul>";
$populer=mysql_query("SELECT * FROM berita ORDER BY dibaca DESC LIMIT 6");
while($p=mysql_fetch_array($populer)){
  echo "<p><li><a href=berita-$p[id]-$p[judul_seo].html>$p[judul]</a> ($p[dibaca])</li></p>";
}
echo "</ul><br /><hr color=#FCEDC7 noshade=noshade /><br />";

// Agenda
echo "<img src=images/agenda.jpg /><br /><br />";
$agenda=mysql_query("SELECT * FROM agenda ORDER BY id DESC LIMIT 3");

while($a=mysql_fetch_array($agenda)){
	$tgl_agenda = tgl_indo($a[tgl_mulai]);
  echo "<span class=date>&bull; $tgl_agenda </a></span><br />";
  echo "<span class=agenda><a href=agenda-$a[id]-$a[tema_seo].html> $a[tema]</a></span><br /><br />";
}
echo "<br />";

?>
