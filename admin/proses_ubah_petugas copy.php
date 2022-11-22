<?php
if ($_POST) {
    $id_petugas=$_POST['id_petugas'];
    $nama_petugas=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $level=$_POST['level'];
    $password=$_POST['password'];
    if (empty($nama_petugas)) {
        echo "<script>alert('Nama tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    }elseif (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    }else {
        include "koneksi.php";
            if (empty($password)) {
                $update=mysqli_query($koneksi, "update petugas set nama_petugas='".$nama_petugas."', username='".$username."', level='".$level."', password='".md5($password)."' where id_petugas='".$id_petugas."'") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script>alert('Sukses update petugas');location.href='tambah_petugas.php';</script>";
            }else {
                echo "<script>alert('gagal update petugas');location.href='tambah_petugas.php?id_petugas=".$id_petugas."';</script>";
            }
        }else {
            $update=mysqli_query($koneksi, "update petugas set nama_petugas='".$nama_petugas."', username='".$username."', level='".$level."', password='".md5($password)."' where id_petugas='".$id_petugas."'") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script>alert('Sukses update petugas');location.href='tambah_petugas.php';</script>";
            }else {
                echo "<script>alert('gagal update petugas');location.href='tambah_petugas.php?id_petugas=".$id_petugas."';</script>";
            }
        }
    }   
}
?>