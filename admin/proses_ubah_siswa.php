<?php
if ($_POST) {
    $nisn=$_POST['nisn'];
    $nis=$_POST['nis'];
    $nama=$_POST['nama'];
    $id_kelas=$_POST['id_kelas'];
    $alamat=$_POST['alamat'];
    $email=$_POST['email'];
    $no_telp=$_POST['no_telp'];
    $password=$_POST['password'];
    if (empty($nis)) {
        echo "<script>alert('Nis tidak boleh kosong');location.href='tambah_siswa.php'</script>";
    }elseif (empty($nama)) {
        echo "<script>alert('Nama tidak boleh kosong');location.href='tambah_siswa.php'</script>";
    }elseif (empty($id_kelas)) {
        echo "<script>alert('Kelas tidak boleh kosong');location.href='tambah_siswa.php'</script>";
    }elseif (empty($alamat)) {
        echo "<script>alert('Alamat tidak boleh kosong');location.href='tambah_siswa.php'</script>";
    }elseif (empty($email)) {
        echo "<script>alert('Email tidak boleh kosong');location.href='tambah_siswa.php'</script>";
    }elseif (empty($no_telp)) {
        echo "<script>alert('No. Telp tidak boleh kosong');location.href='tambah_siswa.php'</script>";
    }else {
        include "koneksi.php";
            if (empty($password)) {
                $update=mysqli_query($koneksi, "update siswa set nisn='".$nisn."', nis='".$nis."', nama='".$nama."', id_kelas='".$id_kelas."', alamat='".$alamat."', email='".$email."', no_telp='".$no_telp."', password='".md5($password)."' where nisn='".$nisn."'") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script>alert('Sukses update siswa');location.href='tambah_siswa.php';</script>";
            }else {
                echo "<script>alert('Gagal update siswa');location.href='tambah_siswa.php?nisn=".$nisn."';</script>";
            }
        }else {
                $update=mysqli_query($koneksi, "update siswa set nisn='".$nisn."', nis='".$nis."', nama='".$nama."', id_kelas='".$id_kelas."', alamat='".$alamat."', email='".$email."', no_telp='".$no_telp."', password='".md5($password)."' where nisn='".$nisn."'") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script>alert('Sukses update siswa');location.href='tambah_siswa.php';</script>";
            }else {
                echo "<script>alert('Gagal update siswa');location.href='tambah_siswa.php?nisn=".$nisn."';</script>";
            }
        }
    }   
}
?>