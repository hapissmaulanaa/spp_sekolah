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
    $random=rand();
    if (empty($nisn)) {
        echo "<script>alert('Nisn tidak boleh kosong');location.href='tambah_siswa.php'</script>";
    }elseif (empty($nis)) {
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
    }elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='tambah_siswa.php'</script>";
    }else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi, "insert into siswa (nisn, nis, nama, id_kelas, alamat, email, no_telp, password, id) value ('".$nisn."', '".$nis."','".$nama."','".$id_kelas."','".$alamat."','".$email."','".$no_telp."','".md5($password)."', '".$random   ."')") or die (mysqli_error($koneksi));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan siswa');location.href='tambah_siswa.php'</script>";
        }else {
            echo "<script>alert('gagal menambahkan siswa');location.href='tambah_siswa.php'</script>";
        }
    }
}
?>
    
