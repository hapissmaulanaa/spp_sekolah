<?php
if ($_POST) {
    $id_petugas=$_POST['id_petugas'];
    $username=$_POST['username'];
    $nama_petugas=$_POST['nama_petugas'];
    $password=$_POST['password'];
    if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    }elseif (empty($nama_petugas)) {
        echo "<script>alert('Nama petugas tidak boleh kosong tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    }else {
        include "koneksi.php";
        $update=mysqli_query($koneksi, "update petugas set nama_petugas='".$nama_petugas."', username='".$username."' where id_petugas='".$id_petugas."'");   
    }if ($update) {
        echo "<script>alert('Sukses mengubah petugas');location.href='tampil_petugas.php';</script>";
    }else {
        echo "<script>alert('gagal mengubah petugas');location.href='ubah_petugas.php';</script>";
    }
}
?>
