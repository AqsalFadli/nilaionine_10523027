<?php
$host      ="localhost";
$username  ="root";
$password  ="";//
$nama_db   ="nilaionline_10523027";

//koneksi ke mysql
$koneksi = new mysqli($host, $username, $password, $nama_db);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>