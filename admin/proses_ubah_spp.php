<?php
if ($_POST) {
    $id_spp=$_POST['id_spp'];
    $angkatan=$_POST['angkatan'];
    $tahun=$_POST['tahun'];
    $nominal=$_POST['nominal'];
    if (empty($angkatan)) {
        echo "<script>alert('angkatan tidak boleh kosong');location.href='tambah_spp.php';</script>";
    }elseif (empty($tahun)) {
        echo "<script>alert('Tahun tidak boleh kosong');location.href='tambah_spp.php';</script>";
    }elseif (empty($nominal)) {
        echo "<script>alert('Nominal tidak boleh kosong');location.href='tambah_spp.php';</script>";
    }else {
        include "koneksi.php";
            if (empty($nominal)) {
                $update=mysqli_query($koneksi, "update spp set angkatan='".$angkatan."', tahun='".$tahun."', nominal='".$nominal."' where id_spp='".$id_spp."'") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script>alert('Sukses update spp');location.href='tambah_spp.php';</script>";
            }else {
                echo "<script>alert('gagal update spp');location.href='tambah_spp.php?id_spp=".$id_spp."';</script>";
            }
        }else {
            $update=mysqli_query($koneksi, "update spp set angkatan='".$angkatan."', tahun='".$tahun."', nominal='".$nominal."' where id_spp='".$id_spp."'") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script>alert('Sukses update spp');location.href='tambah_spp.php';</script>";
            }else {
                echo "<script>alert('gagal update spp');location.href='tambah_spp.php?id_spp=".$id_spp."';</script>";
            }
        }
    }   
}
?>
    