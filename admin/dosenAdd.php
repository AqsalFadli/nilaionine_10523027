<?php
include ('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA DOSEN</h3>
<br /><hr /><br />

<?php
if (!isset($_POST['submit'])) {
?>
    <form method="post">
        <table>
            <tr>
                <td>NIP</td>
                <td><input type="text" name="nip" required></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>KODE MATAKULIAH</td>
                <td><input type="text" name="kode_mtkul" required></td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>JADWAL MENGAJAR</td>
                <td>
                    <table>
                        <tr>
                            <th>Hari</th>
                            <th>Jam</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="hari">
                                    <option value="">-=PILIH=-</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="jam" required>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="TAMBAH"></td>
            </tr>
        </table>
    </form>
<?php
} else {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $kode_mtkul = $_POST["kode_mtkul"];
    $password = md5($_POST["password"]);
    $hari = $_POST["hari"];
    $jam = $_POST["jam"];

    // Input Data Dosen
    $insertDosen = "INSERT INTO dosen (nip, nama, kode_mtkul, password) VALUES ('$nip', '$nama', '$kode_mtkul', '$password')";
    $queryDosen = mysqli_query($koneksi, $insertDosen);

    // Input Data Jadwal
    $insertJadwal = "INSERT INTO dosen (nip, hari, jam) VALUES ('$nip', '$hari', '$jam')";
    $queryJadwal = mysqli_query($koneksi, $insertJadwal);

    if ($queryDosen && $queryJadwal) {
        echo "<script>alert('Data Dosen Berhasil Disimpan!');</script>";
        echo "<script>window.location ='./?adm=dosen';</script>";
    } else {
        echo "<script>alert('Data Dosen Gagal Disimpan!');</script>";
    }
}
?>
<a href="./?adm=dosen">KEMBALI</a>