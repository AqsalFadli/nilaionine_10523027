<?php
include "../koneksi/koneksi.php";

$queryDosen = "SELECT * FROM dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);
$countDosen = mysqli_num_rows($resultDosen);
?>
<style>
    #boxtable th {
        padding: 5px;
        color: #000066; /* Ubah warna teks menjadi putih */
        text-align: center;
        background: #FFFFFF;
        font-size: 14px;
    }

    #boxtable td {
        padding: 5px;
        color: #fff; /* Ubah warna teks menjadi putih */
    }
</style>

<h3>DATA DOSEN</h3>
<a href="./?adm=dosenAdd">TAMBAH DATA DOSEN</a>
<table border="1" id="boxtable">
    <tr class="odd">
        <th>NIP</th>
        <th>NAMA</th>
        <th>KODE MATAKULIAH</th>
        <th>JADWAL MENGAJAR</th>
        <th>AKSI</th>
    </tr>
<?php
if ($countDosen > 0) {
    while($dataDosen = mysqli_fetch_array($resultDosen)) {
?>
<tr>
    <td><?php echo $dataDosen['nip']; ?></td>
    <td><?php echo $dataDosen['nama']; ?></td>
    <td><?php echo $dataDosen['kode_mtkul']; ?></td>
    <td>
        <?php
        $queryJadwal = "SELECT * FROM dosen WHERE nip='$dataDosen[nip]'";
        $resultJadwal = mysqli_query($koneksi, $queryJadwal);
        while($dataJadwal = mysqli_fetch_array($resultJadwal)) {
            echo $dataJadwal['hari'] . " - ("  . $dataJadwal['jam'] . ") <br>";
        }
        ?>
    </td>
    <td>
        <a href="./?adm=dosenEdit&nip=<?php echo $dataDosen['nip']; ?>">Edit</a>
        <a href="dosenHapus.php?nip=<?php echo $dataDosen['nip']; ?>">Hapus</a>
    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='5'>Belum ada Data Dosen</td></tr>";
}
?>
</table>