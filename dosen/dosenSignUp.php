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
      <h2>DAFTAR SEBAGAI DOSEN</h2>
			
    </ul>
</section>
	<br /><br />		
<?php

if (!isset($_POST['daftar']))
{
?>
    <form action="" method="post" class="form-login">
        <table>
            <tr>
                <td><input type="text" name="nip" placeholder="NIP" required /></td>
            </tr>
            <tr>
                <td><input type="text" name="nama" placeholder="Nama" required /></td>
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="Password" required /> <br><br></td>
            </tr>
            <tr>
                <td style="text-align: center";><input id="daftar" name="daftar" type="submit" value="Daftar"></td>
            </tr>
        </table>
    </form>

<?php
}
else
{
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $password = md5($_POST["password"]);
    include('../koneksi/koneksi.php');
    $query = "INSERT INTO dosen (nip, nama, password) VALUES ('$nip', '$nama', '$password')";
    $eksekusi = mysqli_query($koneksi, $query) or die("Query error.");

    if ($eksekusi)
    {
        // daftar berhasil
        echo "<script>alert('Daftar Berhasil!');</script>";
        echo "<script>window.location ='dosenLogin.php';</script>";
    }
    else
    {
        // daftar gagal
        echo "<script>alert('Daftar Gagal!');</script>";
    }
}
?>

<p><br>Sudah memiliki akun? <a href="dosenLogin.php">Login sekarang!</a><br><br></p>

</center>	</div>
    <section class="clr"></section>
</section>

<footer>
	<font color=#000> Copyright &copy; 2015 - UNIVERSITAS KOMPUTER INDONESIA <br />
    Developed By <a href="#" target="_new">Aqsal Fadli</a> </font>
</footer>

</body>

</html>