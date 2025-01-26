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
<link rel="shortcut icon" type="image/x-icon" href="images/logoicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Kreon:light,regular' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="css/style-sheet.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/style-sheet2.css" />-->
<link rel="stylesheet" type="text/css" href="css/nivo-slider.css" />
</head>

<body onLoad="initialize()">
	<header>
    <section class="logo"><a href="#"><img src="images/logo.png" /></a></section>
	<section class="title">Sistem Informasi Nilai Online <br /> <span>UNIVERSITAS KOMPUTER INDONESIA</span></section>
	<section class="clr"><center>Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</center></section>
	</header>

<section id="container">
			<div>
			<center>
			<section id="navigator">
    <ul class="menus">
      <h2 style="padding: 10px;">LOGIN SEBAGAI</h2>
			
    </ul>
</section>
	<br /><br />		
<?php
include ('koneksi/koneksi.php');
if (!isset($_POST['submit']))
?>   
<form action="" method="post" class="form-login">
    <table>
        <tr>
            <td><select name="role" style="width: 190px; height: 35px; padding: 10px; border: 1px solid rgba(0,0,0,.03); color: white;">
                <option value="" style="color: black">Pilih Role</option>
                <option value="admin" style="color: black">Admin</option>
                <option value="dosen" style="color: black">Dosen</option>
                <option value="mahasiswa" style="color: black">Mahasiswa</option>
            </select></td>
        </tr>
        <tr>
            <td><input id="submit" name="submit" type="submit" value="Pilih" style="width: 190px; height: 30px; padding: 10px; border: 1px solid rgba(0,0,0,.03);"></td>
        </tr>
    </table>
</form>
<?php
if (isset($_POST['submit'])) {
    $role = $_POST['role'];
    if ($role == 'dosen') {
      header('Location: dosen/dosenLogin.php');
    } elseif ($role == 'mahasiswa') {
      header('Location: mahasiswa/mahasiswaLogin.php');
    } elseif ($role == 'admin') {
      header('Location: admin.php');
    }
  }
?> 

</center>	</div>
    <section class="clr"></section>
</section>

<footer>
	<font color=#000> Copyright &copy; 2025 - UNIVERSITAS KOMPUTER INDONESIA <br />
    Developed By <a href="#" target="_new">Aqsal Fadli</a> </font>
</footer>

</body>

</html>