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
<div class="halaman">
<?php
include "koneksi.php";
$ID=$_GET['ID'];
$query_delete="DELETE FROM tb_siswa WHERE ID='$ID';";
$hasil = mysqli_query($koneksi_db, $query_delete);
if($hasil){
    header('Location: kelola.php');
}else {
        echo "Gagal Hapus Data";
    
}
?>

</div>
</body>
</html>