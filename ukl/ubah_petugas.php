<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Tambah Petugas</h3>
<?php
include "koneksi.php";
$qry_get_petugas=mysqli_query($koneksi, ("select * from petugas where id_petugas='".$_GET['id_petugas']."'"));
$dt_petugas=mysqli_fetch_array($qry_get_petugas);
?>
<form action="proses_ubah_petugas.php" method="post">
    <input type="hidden" name="id_petugas" value="<?=$dt_petugas['id_petugas']?>">
    Nama Petugas:
    <input type="text" name="nama_petugas" id="" value="<?=$dt_petugas['nama_petugas']?>">

    Username:
    <input type="text" name="username" id="" value="<?=$dt_petugas['username']?>">

    Password:
    <input type="password" name="password" id="">

    <input type="submit" value="Tambah Petugas">
</form>
    
</body>
</html>