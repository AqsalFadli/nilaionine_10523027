<!DOCTYPE html>

<!-- Developed by Websquare Indonesia -->

<!--[if lt IE 7 ]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
<?php
include "../koneksi/koneksi.php";

$queryDosen = "select nip, nama from dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);
$countDosen = mysqli_num_rows($resultDosen);
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
      <h2>AKUN DOSEN</h2>
			
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
$queryDosen = "select nip, nama from dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);

// Periksa apakah data dosen ditemukan
if (mysqli_num_rows($resultDosen) > 0) {
    $dataDosen = mysqli_fetch_array($resultDosen);
    ?>
    <h2>Selamat Datang, <?php echo $dataDosen['nama']; ?></h2>
    <?php
} else {
    echo "Tidak ada data dosen yang sesuai dengan nip tersebut.";
}

?>

<section id="box-left" style="margin-right: 150px;">
    <h3>Jadwal Mengajar</h3>
    <table border="1" id="boxtable">
        <tr class="odd">
            <th>Hari</th>
            <th>Jam</th>
        </tr>
        <?php
include('../koneksi/koneksi.php');

// Pastikan variabel $_SESSION['nama'] terdefinisi
if (!isset($_SESSION['hari'])) {
    $_SESSION['hari'] = '';
}
if (!isset($_SESSION['jam'])) {
    $_SESSION['jam'] = '';
}

$hari = $_SESSION['hari'];
$jam = $_SESSION['jam'];
$queryDosen = "select nip, hari, jam from dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);

// Periksa apakah data dosen ditemukan
if (mysqli_num_rows($resultDosen) > 0) {
    $dataDosen = mysqli_fetch_array($resultDosen);
    ?>
    <td style="color: white"><?php echo $dataDosen['hari']; ?> </td>
    <td style="color: white"><?php echo $dataDosen['jam']; ?> </td>
    <?php
}

?>    </table>
</section>

<section id="box-right" style="float: left; width: 50%;">
    <h3 style="text-align: center;">Nilai Mahasiswa</h3>
    <form style="margin: 0 auto;">
        <table>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td>
                    <label>
                        <select name="nim" class='form-control'>
                            <option value="">-=PILIH=-</option>
                            <?php
                            $queryMhs  ="select nim, nama from mahasiswa";
                            $resultMhs = mysqli_query($koneksi, $queryMhs);
                            while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)){
                                echo "<option value='$dataMhs[0]'>$dataMhs[1]</option>";
                            }
                            ?>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td>Nilai Tugas</td>
                <td>:</td>
                <td><input type="text" name="nl_tugas" required></td>
            </tr>
            <tr>
                <td>Nilai UTS</td>
                <td>:</td>
                <td><input type="text" name="nl_uts" required></td>
            </tr>
            <tr>
                <td>Nilai UAS</td>
                <td>:</td>
                <td><input type="text" name="nl_uas" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="SIMPAN NILAI"></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $nim = $_POST["nim"];
        $nl_tugas = $_POST["nl_tugas"];
        $nl_uts = $_POST["nl_uts"];
        $nl_uas = $_POST["nl_uas"];

        $insertNilai = "INSERT INTO nilai (nl_tugas, nl_uts, nl_uas, nim, nip) VALUES ('$nl_tugas', '$nl_uts', '$nl_uas', '$nim', '$nip')";
        $queryNilai = mysqli_query($koneksi, $insertNilai);

        if ($queryNilai) {
            echo "<script>alert('Nilai Berhasil Disimpan!');</script>";
        } else {
            echo "<script>alert('Nilai Gagal Disimpan!');</script>";
        }
    }
    ?>
</section>

<div style="clear: both;"></div>
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