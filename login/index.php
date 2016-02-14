<html>
<head>
<title>Login - Kelurahan Indihiang</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
  <div id="content">
		<h2>Login</h2>
    <img src="images/login-welcome.gif" width="97" height="105" hspace="10" align="left">

<form method="POST" action="cek_login.php">
<table>
<tr><td>Username</td><td> : <input type="text" name="username"></td></tr>
<tr><td>Password</td><td> : <input type="password" name="password"></td></tr>
<tr><td></td><td><input  type="submit" value="Login"><input type="button" value="Batal" onclick="window.location.href='../index.php';"></td></tr>
</table>
</form>

<p>&nbsp;</p>
  </div>
	<div id="footer">
			Copyright &copy; 2014 by Kelurahan Indihiang. All rights reserved.
	</div>
</div>
</body>
</html>
