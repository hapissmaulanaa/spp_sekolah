<?php
if ($_POST) {
    $id_kelas=$_POST['id_kelas'];
    $nama_kelas=$_POST['nama_kelas'];
    $jurusan=$_POST['jurusan'];
    $angkatan=$_POST['angkatan'];
    if (empty($nama_kelas)) {
        echo "<script>alert('Nama kelas tidak boleh kosong');location.href='tambah_kelas.php';</script>";
    }elseif (empty($jurusan)) {
        echo "<script>alert('Jurusan tidak boleh kosong');location.href='tambah_kelas.php';</script>";
    }elseif (empty($angkatan)) {
        echo "<script>alert('Angkatan tidak boleh kosong');location.href='tambah_kelas.php';</script>";
    }else {
        include "koneksi.php";
            if (empty($angkatan)) {
                $update=mysqli_query($koneksi, "update kelas set nama_kelas='".$nama_kelas."', jurusan='".$jurusan."', angkatan='".$angkatan."' where id_kelas='".$id_kelas."'") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script>alert('Sukses update kelas');location.href='tambah_kelas.php';</script>";
            }else {
                echo "<script>alert('gagal update kelas');location.href='tambah_kelas.php?id_kelas=".$id_kelas."';</script>";
            }
        }else {
            $update=mysqli_query($koneksi, "update kelas set nama_kelas='".$nama_kelas."', jurusan='".$jurusan."', angkatan='".$angkatan."' where id_kelas='".$id_kelas."'") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script>alert('Sukses update kelas');location.href='tambah_kelas.php';</script>";
            }else {
                echo "<script>alert('gagal update kelas');location.href='tambah_kelas.php?id_kelas=".$id_kelas."';</script>";
            }
        }
    }   
}
?>
    