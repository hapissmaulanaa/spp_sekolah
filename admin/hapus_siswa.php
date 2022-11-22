<?php
if ($_GET['nisn']) {
    include "koneksi.php";
    $qry_hapus=mysqli_query($koneksi, "delete from siswa where nisn='".$_GET['nisn']."'");
    if ($qry_hapus) {
        echo "<script>alert('Sukses hapus petugas');location.href='tambah_siswa.php';</script>";
    }else {
        echo "<script>alert('Gagal hapus petugas');location.href='tambah_siswa.php';</script>";
    }
}
?>
