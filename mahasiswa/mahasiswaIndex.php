<!DOCTYPE html>

<!-- Developed by Websquare Indonesia -->

<!--[if lt IE 7 ]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
<?php
include "../koneksi/koneksi.php";

$queryMahasiswa = "select nama from mahasiswa";
$resultMahasiswa = mysqli_query($koneksi, $queryMahasiswa);
$countMahasiswa = mysqli_num_rows($resultMahasiswa);
?>    

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
      <h2>AKUN MAHASISWA</h2>
			
    </ul>
</section>
	<br /><br />	
    	
<?php
include('../koneksi/koneksi.php');

// Pastikan variabel $_SESSION['nama'] terdefinisi
if (!isset($_SESSION['nama'])) {
    $_SESSION['nama'] = '';
}

$nama = $_SESSION['nama'];
$queryMahasiswa = "select nama from mahasiswa";
$resultMahasiswa = mysqli_query($koneksi, $queryMahasiswa);

// Periksa apakah data mahasiswa ditemukan
if (mysqli_num_rows($resultMahasiswa) > 0) {
    $dataMahasiswa = mysqli_fetch_array($resultMahasiswa);
    ?>
    <h2>Selamat Datang, <br> <?php echo $dataMahasiswa['nama']; ?></h2>
    <?php
} else {
    echo "Tidak ada data mahasiswa yang sesuai dengan nama tersebut.";
}

?>

<section>
    <h3 style="text-align: center;"> <br>Riwayat Nilai </h3> <br>
    <table border="1" id="boxtable">
        <tr class="odd">
            <th>NIM</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Nilai Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th> 
        </tr>
        <?php
        $queryNilai = "select nim, nl_tugas, nl_uts, nl_uas from nilai";
        $resultNilai = mysqli_query($koneksi, $queryNilai);
        $queryMatakuliah = "select nama_mtkul from matakuliah";
        $resultMatakuliah = mysqli_query($koneksi, $queryMatakuliah);
        $dataMatakuliah = mysqli_fetch_array($resultMatakuliah);
            if (mysqli_num_rows($resultNilai) > 0) {
                $dataNilai = mysqli_fetch_array($resultNilai);
        ?>
        
        <tr class="odd">
            <td><?php echo $dataNilai['nim']; ?></td>
            <td><?php echo $dataMahasiswa['nama']; ?></td>
            <td><?php echo $dataMatakuliah['nama_mtkul']; ?></td>
            <td><?php echo $dataNilai['nl_tugas']; ?></td>
            <td><?php echo $dataNilai['nl_uts']; ?></td>
            <td><?php echo $dataNilai['nl_uas']; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</section>

<div style="clear: both;"></div>
<br><br>
<center><a href="../index.php">LOGOUT</a></center>
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