<?php
if ($_POST) {
    $nama_kelas=$_POST['nama_kelas'];
    $jurusan=$_POST['jurusan'];
    $angkatan=$_POST['angkatan'];
    if (empty($nama_kelas)) {
        echo "<script>alert('Nama kelas tidak boleh kosong');location.href='tambah_kelas.php'</script>";
    }elseif (empty($jurusan)) {
        echo "<script>alert('Jurusan tidak boleh kosong');location.href='tambah_kelas.php'</script>";
    }elseif (empty($angkatan)) {
        echo "<script>alert('Angkatan tidak boleh kosong');location.href='tambah_kelas.php'</script>";
    }else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi, "insert into kelas (nama_kelas, jurusan, angkatan) value ('".$nama_kelas."','".$jurusan."','".$angkatan."')") or die (mysqli_error($koneksi));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan kelas');location.href='tambah_kelas.php'</script>";
        }else {
            echo "<script>alert('Gagal menambahkan kelas');location.href='tambah_kelas.php'</script>";
        }
    }
}
?>
