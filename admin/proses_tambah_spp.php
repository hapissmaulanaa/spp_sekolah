<?php
if ($_POST) {
    $angkatan=$_POST['angkatan'];
    $tahun=$_POST['tahun'];
    $nominal=$_POST['nominal'];

    if (empty($angkatan)) {
        echo "<script>alert('Angkatan tidak boleh kosong'); location.href='tambah_spp.php';</script>";
    }elseif (empty($tahun)) {
        echo "<script>alert('Tahun ajaran tidak boleh kosong'); location.href='tambah_spp.php';</script>";
    }elseif (empty($nominal)) {
        echo "<script>alert('Nominal tidak boleh kosong'); location.href='tambah_spp.php';</script>";
    }else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi, "insert into spp (angkatan, tahun, nominal) value ('".$angkatan."','".$tahun."','".$nominal."')") or die(mysqli_error($koneksi));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan SPP'); location.href='tambah_spp.php';</script>";
        }else {
            echo "<script>alert('Gagal menambahkan SPP'); location.href='tambah_spp.php';</script>";
        }
    }
}
?>
