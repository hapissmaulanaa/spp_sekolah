<?php
if ($_POST) {
    $nisn = $_POST['nisn'];
    $tahun_spp = $_POST['tahun_spp'];
    $angkatan=$_POST['angkatan'];
    $awaltempo = date("Y-m-d");
    $nisn=$_POST['nisn'];

    if(empty($angkatan)){
        echo "<script>alert('nama angkatan tidak boleh kosong');location.href='tambah_pembayaran.php';</script>";
    }
    elseif(empty($tahun_spp)){
        echo "<script>alert('Tahun SPP tidak boleh kosong');location.href='tambah_pembayaran.php';</script>";
    }
    elseif(empty($angkatan)){
        echo "<script>alert('nama angkatan tidak boleh kosong');location.href='tambah_pembayaran.php';</script>";
    }
    else {
        include "koneksi.php";
        for($i=0; $i<12; $i++){
        $jatuhtempo = date("Y-m-d" , strtotime("+$i month" , strtotime($awaltempo)));
 		$bulan     = date("m" ,strtotime($jatuhtempo));
        $tahun = date("Y", strtotime($jatuhtempo));
        
        $add = mysqli_query($koneksi,"INSERT INTO pembayaran(nisn , jatuh_tempo, bulan_spp, tahun_spp, id_spp, keterangan) 
        VALUES ('$nisn', '$jatuhtempo','$bulan', '$tahun', '$angkatan', 'belum lunas')") or die(mysqli_error($koneksi));
        echo "<script>alert('Sukses Tambah Siswa');location.href='tambah_pembayaran.php';</script>";           
        }
        if($insert){
            echo "<script>alert('Sukses menambahkan Data angkatan');location.href='tambah_pembayaran.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan Data angkatan');location.href='tambah_pembayaran.php';</script>";
        }
    }
}
?>