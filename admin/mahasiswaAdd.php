<?php
include ('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA MAHASISWA</h3>
<br /><hr /><br />

<?php
if (!isset($_POST['submit']))
{
?>
    <form enctype="multipart/form-data" method="post">
        <table width="100%" border="0" id="boxtable">
            <tr class="odd">
                <td width="27%">NIM</td>
                <td width="4%">:</td>
                <td width="69%"><input type="text" name="nim" size="30" placeholder="NIM"></td>
            </tr>
            <tr class="odd">
                <td>NAMA</td>
                <td>:</td>
                <td><input name="nama" type="text" id="nama" size="30" placeholder="NAMA" /></td>
            </tr>
            <tr class="odd">
                <td>JENIS KELAMIN</td>
                <td>:</td>
                <td>
                    <label>
                        <input type="radio" name="jk" value="Laki-Laki" id="RadioGroup1_0" /> Laki-Laki
                    </label>
                    <label>
                        <input type="radio" name="jk" value="Perempuan" id="RadioGroup1_1" /> Perempuan
                    </label>
                </td>
            </tr>
            <tr class="odd">
                <td height="50">JURUSAN</td>
                <td>:</td>
                <td>
                    <label>
                        <select name="jur">
                            <option value="">-=PILIH=-</option>
                            <option value="Sistem Informasi">SISTEM INFORMASI</option>
                            <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
                            <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr class="odd">
                <td>PASSWORD</td>
                <td>:</td>
                <td><input name="password" type="text" id="password" size="30" placeholder="PASSWORD"></td>
            </tr>
            <tr class="odd">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr class="odd">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <input id="submit" name="submit" type="submit" value="TAMBAH">
                </td>
            </tr>
        </table>
    </form>
<?php
}
else
{
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $jur = $_POST["jur"];
    $password = md5($_POST["password"]);

    // Input Data Mahasiswa
    $insertMhs = "INSERT INTO mahasiswa VALUE ('$nim','$nama','$jk','$jur','$password')";
    $queryMhs = mysqli_query($koneksi, $insertMhs);

    if ($queryMhs)
    {
        echo "<script>alert('Daftar Berhasil Disimpan !');</script>";
        echo "<script type='text/javascript'>window.location ='./?adm=mahasiswa'</script>";
    }
    else
    {
        echo "<script>alert('Daftar Gagal Disimpan !');</script>";
        echo "<script type='text/javascript'>window.location ='./?adm=mahasiswa'</script>";
    }
}
?>
<a href="./?adm=mahasiswa">&raquo : KEMBALI </a>
