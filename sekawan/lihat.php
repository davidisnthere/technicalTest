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
<div class="halaman" >
    <?php
    include "koneksi.php";
    $ID=$_GET['ID'];
    $query_lihat="SELECT * FROM tb_siswa WHERE ID='$ID';";
    $hasil = mysqli_query($koneksi_db, $query_lihat);
    $data = mysqli_fetch_array($hasil);
    $no = 1;
    ?>
    <h3>Lihat data</h3>
    <table align="center" class="table">
        <tr>
            <td>Nama : <?php echo $data['Nama']; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin : 
                <?php if($data['Jenis_Kelamin'] == 0){
    echo "Laki-laki";
    } else {
    echo "Perempuan";
} ?></td>
        </tr>
        <tr>
            <td>Alamat : <?php echo $data['Alamat']; ?></td>
        </tr>
    </table>
<a href="kelola.php">Kembali Kelola</a>
</div>
</body>
</html>