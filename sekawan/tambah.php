<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Page Title</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style>
    body {
        margin: 50px;
    }
</style>
</head>
<body>
<h2>Tambah data</h2>
<form action="" method="post"> 
    <table align="center" class="table">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="Nama"></td>
        </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><input type="radio" name="Kelamin" value="0">Laki-Laki
                <input type="radio" name="Kelamin" value="1">Perempuan</td>
         </tr>   
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="Alamat"></textarea></td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" name="submit" value="Tambah" class="btn btn-primary my-2"></td>
        </tr>
    </table>
</form>
<?php
$required = array('Nama', 'Kelamin', 'Alamat');
$cek = false;

foreach($required as $field) {
  if (empty($_POST[$field])) {
    $cek = true;
  }
}

if ($cek) {
  echo "Mohon isi semua data!<br>";
  $kelola = "kelola.php";
  echo "<a href='$kelola'>Kembali Kelola</a>";
}

include "koneksi.php";
@$Nama = $_POST['Nama'];
@$Jenis_Kelamin = $_POST['Kelamin'];
@$Alamat = $_POST['Alamat'];
@$submit = $_POST['submit'];
if($submit) {
    $query_insert= "INSERT INTO tb_siswa (Nama,Jenis_Kelamin,Alamat) VALUES ('$Nama','$Jenis_Kelamin','$Alamat')";
    $hasil = mysqli_query($koneksi_db, $query_insert) or die ("ERROR INSERT DATA");
        if($hasil){
            header('Location: kelola.php');
        }
}

?>
</body>
</html>