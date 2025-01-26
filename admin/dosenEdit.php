<?php
include ('../koneksi/koneksi.php');

$getNip = $_GET['nip'];
$editDosen = "SELECT * FROM dosen WHERE nip = '$getNip'";
$resultDosen = mysqli_query($koneksi, $editDosen);
$dataDosen = mysqli_fetch_array($resultDosen);
?>

<h3>EDIT DATA DOSEN</h3>

<?php
if (!isset($_POST['submit'])) {
?>
    <form method="post">
        <table>
            <tr>
                <td>NIP</td>
                <td><input type="text" name="nip" value="<?php echo $dataDosen['nip']; ?>" readonly></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama" value="<?php echo $dataDosen['nama']; ?>" required></td>
            </tr>
            <tr>
                <td>KODE MATAKULIAH</td>
                <td><input type="text" name="kode_mtkul" value="<?php echo $dataDosen['kode_mtkul']; ?>" required></td>
            </tr>
            <tr>
                <td>JADWAL MENGAJAR</td>
                <td>
                    <table>
                        <tr>
                            <th>Hari</th>
                            <th>Jam</th>
                        </tr>
                        <?php
                        $queryJadwal = "SELECT * FROM dosen WHERE nip='$getNip'";
                        $resultJadwal = mysqli_query($koneksi, $queryJadwal);
                        while($dataJadwal = mysqli_fetch_array($resultJadwal)) {
                        ?>
                        <tr>
                            <td>
                                <select name="hari">
                                    <option value="<?php echo $dataJadwal['hari']; ?>"><?php echo $dataJadwal['hari']; ?></option>
                                    <option value="">-=PILIH=-</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="jam" value="<?php echo $dataJadwal['jam']; ?>" required>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="UPDATE"></td>
            </tr>
        </table>
    </form>
<?php
} else {
    $nama = $_POST["nama"];
    $kode_mtkul = $_POST["kode_mtkul"];
    $hari = $_POST["hari"];
    $jam = $_POST["jam"];

    // Update Data Dosen
    $updateDosen = "UPDATE dosen SET nama='$nama' WHERE nip='$getNip'";
    $queryUpdate = mysqli_query($koneksi, $updateDosen);

    // Update Data Jadwal
    $updateJadwal = "UPDATE dosen SET hari='$hari', jam='$jam' WHERE nip='$getNip'";
    $queryJadwal = mysqli_query($koneksi, $updateJadwal);

    if ($queryUpdate && $queryJadwal) {
        echo "<script>alert('Data Dosen Berhasil Diupdate!');</script>";
        echo "<script>window.location ='./?adm=dosen';</script>";
    } else {
        echo "<script>alert('Data Dosen Gagal Diupdate!');</script>";
    }
}
?>
<a href="./?adm=dosen">KEMBALI</a>