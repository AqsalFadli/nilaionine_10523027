<!DOCTYPE html>

<!-- Developed by Websquare Indonesia -->

<!--[if lt IE 7 ]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>

<?php
session_start();
session_destroy();
?>

<title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="shortcut icon" type="image/x-icon" href="../images/logoicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Kreon:light,regular' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="../css/style-sheet.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/style-sheet2.css" />-->
<link rel="stylesheet" type="text/css" href="../css/nivo-slider.css" />

</head>

<body onLoad="initialize()">
	<header>
    <section class="logo"><a href="#"><img src="../images/logo.png" /></a></section>
	<section class="title">Sistem Informasi Nilai Online <br /> <span>UNIVERSITAS KOMPUTER INDONESIA</span></section>
	<section class="clr"><center>Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</center></section>
	</header>

<section id="container">
			<div>
			<center>
			<section id="navigator">
    <ul class="menus">
      <h2>LOGIN SEBAGAI DOSEN</h2>
			
    </ul>
</section>
	<br /><br />		
<?php
include('../koneksi/koneksi.php');
if (!isset($_POST['submit']))
{
?>   
<form enctype="multipart/form-data" method="post" class="form-login">
<table style="margin: 0 auto;">
	<tr>
    	<td><input type="text" name="nip" placeholder="NIP" required /></td>
    </tr>
	<tr>
    	<td><input type="password" name="password" placeholder="Password" required /></td>
    </tr>
	<tr>
    	<td><input id="submit" name="submit" type="submit" value="Login"></td>
    </tr>
</table>
</form>
<?php
}
elseif (empty($_POST['nip']) || empty($_POST['password']) || empty($_POST['type']))
{
	echo"<script>alert('Please fill out, Username OR Password OR Type correctly!') </script>";
	echo"<script type='text/javascript'>window.location ='dosenIndex.php'</script>";
}
else
{
	
	$nip	= addslashes($_POST['nip']);
	$password	= md5($_POST['password']);
	
	include ('koneksi.php');
	//echo"$username, $password, $type";die;
		$query		= "SELECT nip * FROM dosen WHERE nip='$nip' AND password='$password'";
	$eksekusi	= mysql_query($query) or die("Query error.");
	$rowCheck	= mysql_num_rows($eksekusi);

	if($rowCheck > 0)
	{
		while($data = mysql_fetch_array($eksekusi))
		{
			$_SESSION['dosen'] = $dataMhs[0]>$dataMhs[1];
			echo "<script type='text/javascript'>window.location ='dosenIndex.php'</script>";
		}
	}	
	else 
	{
		echo"<script>alert('Invalid Username or Password.')</script>";
		echo"<script type='text/javascript'>window.location ='dosenLogin.php'</script>";
	}
}
?> 

<p><br>Belum memiliki akun? <a href="dosenSignUp.php"> <br> <u>Daftar sekarang!</u><br><br></a></p>

<div style="clear: both;"></div>
<center><a href="../index.php">KEMBALI</a></center>
<br><br>

</center>	</div>
    <section class="clr"></section>
</section>

<footer>
	<font color=#000> Copyright &copy; 2015 - UNIVERSITAS KOMPUTER INDONESIA <br />
    Developed By <a href="#" target="_new">Aqsal Fadli</a> </font>
</footer>

</body>

</html>