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
<div clas="halaman" >
    <?php
    include "koneksi.php";
    $ID=$_GET['ID'];
    $query="SELECT * FROM tb_siswa WHERE ID='$ID';";
    $hasil=mysqli_query($koneksi_db, $query);
    $data=mysqli_fetch_array($hasil);
    ?>
    <h3>Edit data</h3>
    <form action="update.php" method="POST">
        <table align="center" class="table">
            <tr>
                <input type="hidden" name="ID" value="<?php echo $data['ID']; ?>">
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="Nama" id=" " value= "<?php echo $data['Nama']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><input type="radio" name="Kelamin" <?php if($data['Jenis_Kelamin']=="0") {echo "checked";}?> value="0">Laki-Laki
                    <input type="radio" name="Kelamin" <?php if($data['Jenis_Kelamin']=="1") {echo "checked";}?> value="1">Perempuan</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="Alamat"><?php echo $data['Alamat']; ?></textarea></td>
            </tr>
            <tr>
                <td colspan = "3"><input class="btn btn-sm btn-warning m-1" type="submit" name="submit" value="UPDATE"></td>
            </tr>
        </table>
    </form>
    <a href="kelola.php">Kembali Kelola</a>
</div>
<?php
@$ID = $_POST['ID'];
@$Nama = $_POST['Nama'];
@$Jenis_Kelamin = $_POST['Kelamin'];
@$Alamat = $_POST['Alamat'];
@$submit = $_POST['submit'];
if($submit) {
    $query_update = "UPDATE tb_siswa SET Nama='$Nama', Jenis_Kelamin='$Jenis_Kelamin', Alamat='$Alamat' WHERE ID = '$ID';";
    $hasil = mysqli_query($koneksi_db, $query_update) or die ("ERROR UPDATE DATA");
    if($hasil){
        header('Location: kelola.php');
    }
}
?>
</body>
</html>