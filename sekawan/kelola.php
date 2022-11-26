<?php
error_reporting(1);
?>
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
$query="SELECT * FROM tb_siswa";
$hasil=mysqli_query($koneksi_db,$query);
?>
<center><h2>Halaman Kelola Konten</h2></center>
<a href="tambah.php" class="btn btn-primary my-2">Tambah</a>
<table align="center" class="table table-striped">
	<thead class="thead-dark">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th colspan="3">Action</th>
	</tr>
</thead>
<?php
$no=1;
while ($data=mysqli_fetch_array($hasil)){
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $data['Nama']; ?></td>
<td><?php if($data['Jenis_Kelamin'] == 0){
	echo "Laki-laki";
} else {
	echo "Perempuan";
}
?></td>
<td><?php echo $data['Alamat']; ?></td>
<td><a class="btn btn-sm btn-secondary m-1" href="lihat.php?ID=<?php echo $data['ID'];?>">View</a></td>
<td><a class="btn btn-sm btn-warning m-1" href="update.php?ID=<?php echo $data['ID'];?>">Update</a></td>
<td><a class="btn btn-sm btn-danger m-1" href="delete.php?ID=<?php echo $data['ID'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data?')">Delete</a></td>
</tr>
<?php
}
?>
</table>
</div>
</body>
</html>