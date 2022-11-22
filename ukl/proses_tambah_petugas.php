<?php
if ($_POST) {
    $username=$_POST['username'];
    $nama_petugas=$_POST['nama_petugas'];
    $password=$_POST['password'];
    if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    }elseif (empty($nama_petugas)) {
        echo "<script>alert('Nama petugas tidak boleh kosong tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    }elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    }else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi, "insert into petugas (username, nama_petugas, password) value ('".$username."', '".$nama_petugas."', '".md5($password)."')") or die (mysqli_error($koneksi));   
    }if ($insert) {
        echo "<script>alert('Sukses menambahkan petugas');location.href='home_petugas.php';</script>";
    }else {
        echo "<script>alert('gagal menambahkan petugas');location.href='tambah_petugas.php';</script>";
    }
}
?>
